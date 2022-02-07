<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Department;
use App\Models\Doctor;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    // get all doctors
    public function index()
    {
        SEOMeta::setTitle('Doktorlarımız - Bilge Hastanesi');
        SEOMeta::setDescription('Bilge Hastanesi doktor kadromuz');
        SEOMeta::setKeywords(['doktorlar', 'bilge doktorlar', 'hekimlerimiz', 'doktorlarımız', 'uzman ekibimiz']);
        OpenGraph::setTitle('Doktorlarımız - Bilge Hastanesi');
        OpenGraph::setDescription('Bilge Hastanesi doktor kadromuz');

        $doctors = Doctor::OrderBy('id', 'DESC')->with('departments')->paginate(6);

        if($doctors->currentPage() > $doctors->lastPage()) {
            return redirect()->route('site.doctors');
        }

        $departments = Department::orderBy('name', 'ASC')->get(['id', 'name', 'slug']);

        $banner = Banner::where('page', 'doktorlarimiz')->first();

        if (isset($banner))
            return view('site.pages.doctors')->with('doctors', $doctors)->with('departments', $departments)->with('department_doctor', null)->with('banner', $banner);
        else
            return view('site.pages.doctors')->with('doctors', $doctors)->with('departments', $departments)->with('department_doctor', null);
    }

    // get doctor detail
    public function show($slug)
    {
        $doctor = Doctor::whereSlug($slug)->with('departments')->with('working_times')->firstOrFail();

        SEOMeta::setTitle($doctor->degree . ' ' . $doctor->name . ' ' . $doctor->lastname . ' - Bilge Hastanesi');
        SEOMeta::setDescription($doctor->degree . ' ' . $doctor->name . ' ' . $doctor->lastname . ' doktor bilgileri');
        SEOMeta::setKeywords(['doktorlar', 'bilge doktorlar', 'hekimlerimiz', 'doktorlarımız', 'uzman ekibimiz', $doctor->degree, $doctor->name, $doctor->lastname]);
        OpenGraph::setTitle($doctor->degree . ' ' . $doctor->name . ' ' . $doctor->lastname . ' - Bilge Hastanesi');
        OpenGraph::setDescription($doctor->degree . ' ' . $doctor->name . ' ' . $doctor->lastname . ' doktor bilgileri');


        $otherDoctors = Doctor::whereHas('departments', function ($query) use ($doctor) {
            if (count($doctor->departments) > 0)
                return $query->where('name', $doctor->departments[0]->name);
        })->where('slug', '!=', $slug)->inRandomOrder()->limit(4)->get();

        $banner = Banner::where('page', 'doktorlarimiz')->first();

        if (isset($banner))
            return view('site.pages.doctor_detail')->with('doctor', $doctor)->with('otherDoctors', $otherDoctors)->with('banner', $banner);
        else
            return view('site.pages.doctor_detail')->with('doctor', $doctor)->with('otherDoctors', $otherDoctors);
    }

    // get the department doctors
    public function department_doctors(Request $request)
    {
        SEOMeta::setTitle($request->department . ' Tıbbi Bölüm Doktorlarımız - Bilge Hastanesi');
        SEOMeta::setDescription('Bilge Hastanesi ' . $request->department . ' bölüm doktorlarımız');
        SEOMeta::setKeywords(['doktorlar', 'bilge doktorlar', 'hekimlerimiz', 'doktorlarımız', 'uzman ekibimiz', $request->department]);
        OpenGraph::setTitle($request->department . ' Tıbbi Bölüm Doktorlarımız - Bilge Hastanesi');
        OpenGraph::setDescription('Bilge Hastanesi ' . $request->department . ' bölüm doktorlarımız');

        if ($request->department === null) {
            return redirect()->route('site.doctors');
        }

        $doctors = Doctor::whereHas('departments', function ($query) use ($request) {
            return $query->whereSlug($request->department);
            })->orderBy('name', 'ASC')->paginate(6);

        if($doctors->currentPage() > $doctors->lastPage()) {
            return redirect()->route('site.doctors');
        }

        $departments = Department::orderBy('name', 'ASC')->get(['id', 'name', 'slug']);

        $banner = Banner::where('page', 'doktorlarimiz')->first();

        if (isset($banner))
            return view('site.pages.doctors')->with('doctors', $doctors)->with('departments', $departments)->with('department_doctor', $request->department)->with('banner', $banner);
        else
            return view('site.pages.doctors')->with('doctors', $doctors)->with('departments', $departments)->with('department_doctor', $request->department);
    }
}
