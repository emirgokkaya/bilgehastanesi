<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\HealthCorner;
use App\Models\Service;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DepartmentController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Tıbbi Bölümlerimiz - Bilge Hastanesi');
        SEOMeta::setDescription('Bilge Hastanesi tıbbi bölümlerimiz');
        SEOMeta::setKeywords(['tıbbi bölümler', 'birimler', 'hizmetler', 'branşlar']);
        OpenGraph::setTitle('Tıbbi Bölümlerimiz - Bilge Hastanesi');
        OpenGraph::setDescription('Bilge Hastanesi tıbbi bölümlerimiz');

        $departments = Department::orderBy('created_at', 'DESC')->paginate(6);
        $departments_list = Department::orderBy('name', 'ASC')->get(['name', 'slug']);
        $banner = Banner::where('page', 'bolumlerimiz')->first();


        if (isset($banner)) {
            if($departments->currentPage() > $departments->lastPage()) {
                return redirect()->route('site.departments');
            }

            return view('site.pages.department')->with('departments', $departments)->with('banner', $banner)->with('departments_list', $departments_list);
        } else {
            if($departments->currentPage() > $departments->lastPage()) {
                return redirect()->route('site.departments');
            }

            return view('site.pages.department')->with('departments', $departments)->with('departments_list', $departments_list);
        }

    }

    public function show($slug)
    {
        $department = Department::whereSlug($slug)->with('services')->with('summaries')->firstOrFail();

        SEOMeta::setTitle($department->name . ' - Bilge Hastanesi');
        /*SEOMeta::setDescription(Str::limit($department->content, 100));*/
	SEOMeta::setDescription(strip_tags(Str::limit($department->content, 100)));
        SEOMeta::setKeywords(['tıbbi bölümler', 'birimler', 'hizmetler', 'branşlar', $department->name]);
        OpenGraph::setTitle($department->name . ' - Bilge Hastanesi');
        /*OpenGraph::setDescription(Str::limit($department->content, 100));*/
	OpenGraph::setDescription(strip_tags(Str::limit($department->content, 100)));

        $otherDepartments = Department::where('slug', '!=', $slug)->limit(10)->inRandomOrder()->get();

        $doctors = Doctor::whereHas('departments', function($query) use ($department) {
            return $query->where('name', $department->name);
        })->get();

        $health_corners = HealthCorner::whereHas('doctors', function ($query) use ($doctors, $department) {
           $query->whereHas('departments', function ($q) use ($department) {
               return $q->where('name', '=', $department->name);
           });
        })->orderBy('created_at', 'DESC')->limit(3)->get();


        $banner = Banner::where('page', 'bolumlerimiz')->first();

        /*$services = Service::whereHas('departments', function ($query) use ($department) {
            return $query->where('name', $department->name);
        });*/


        if (isset($banner))
            return view('site.pages.department_detail')
                ->with('department', $department)
                ->with('otherDepartments', $otherDepartments)
                ->with('doctors', $doctors)
                ->with('banner', $banner)
                ->with('health_corners', $health_corners)/*->with('services', $services)*/;
        else
            return view('site.pages.department_detail')
                ->with('department', $department)
                ->with('otherDepartments', $otherDepartments)
                ->with('doctors', $doctors)
                ->with('health_corners', $health_corners)/*->with('services', $services)*/;
    }

    public function search_departments(Request $request)
    {
        SEOMeta::setTitle($request->department . ' Tıbbi Bölümleri - Bilge Hastanesi');
        SEOMeta::setDescription('Bilge Hastanesi ' . $request->department . '  bölümleri');
        SEOMeta::setKeywords(['tıbbi bölümler', 'birimler', 'hizmetler', 'branşlar', $request->department]);
        OpenGraph::setTitle($request->department . ' Tıbbi Bölümleri - Bilge Hastanesi');
        OpenGraph::setDescription('Bilge Hastanesi ' . $request->department . ' bölümleri');

        if ($request->department === null) {
            return redirect()->route('site.departments');
        }

        $departments = Department::where('name', 'LIKE', '%' . $request->department . '%')
            ->orWhere('content', 'LIKE', '%' . $request->department . '%')
            ->paginate(6);

        $departments_list = Department::orderBy('name', 'ASC')->get(['name', 'slug']);

        if($departments->currentPage() > $departments->lastPage()) {
            return redirect()->route('site.departments');
        }

        $banner = Banner::where('page', 'bolumlerimiz')->first();

        if (isset($banner))
            return view('site.pages.department')->with('departments', $departments)->with('banner', $banner)->with('departments_list', $departments_list);
        else
            return view('site.pages.department')->with('departments', $departments)->with('departments_list', $departments_list);
    }

    public function search_department_detail(Request $request)
    {
        if ($request->search === null) {
            return redirect()->back();
        }

        $department = Department::whereSlug($request->search)->with('services')->with('summaries')->firstOrFail();

        SEOMeta::setTitle($department->name . ' - Bilge Hastanesi');
        SEOMeta::setDescription(strip_tags(Str::limit($department->content, 100)));
        SEOMeta::setKeywords(['tıbbi bölümler', 'birimler', 'hizmetler', 'branşlar', $department->name]);
        OpenGraph::setTitle($department->name . ' - Bilge Hastanesi');
        OpenGraph::setDescription(strip_tags(Str::limit($department->content, 100)));

        $otherDepartments = Department::where('slug', '!=', $department->slug)->limit(10)->inRandomOrder()->get();

        $doctors = Doctor::whereHas('departments', function($query) use ($department) {
            return $query->where('name', $department->name);
        })->get();

        $health_corners = HealthCorner::whereHas('doctors', function ($query) use ($doctors, $department) {
            $query->whereHas('departments', function ($q) use ($department) {
                return $q->where('name', '=', $department->name);
            });
        })->orderBy('created_at', 'DESC')->limit(3)->get();

        $banner = Banner::where('page', 'bolumlerimiz')->first();

        /*$services = Service::whereHas('departments', function ($query) use ($department) {
            return $query->where('name', $department->name);
        });*/


        if (isset($banner))
            return view('site.pages.department_detail')
                ->with('department', $department)
                ->with('otherDepartments', $otherDepartments)
                ->with('doctors', $doctors)
                ->with('banner', $banner)
                ->with('health_corners', $health_corners)/*->with('services', $services)*/;
        else
            return view('site.pages.department_detail')
                ->with('department', $department)
                ->with('otherDepartments', $otherDepartments)
                ->with('doctors', $doctors)
                ->with('health_corners', $health_corners)/*->with('services', $services)*/;
    }
}
