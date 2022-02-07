<?php

namespace App\Http\Controllers\Admin;

use App\CustomClasses\ImageManagement;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\IDoctor;

class DoctorController extends Controller implements IDoctor
{
    public function index()
    {
        $doctors = Doctor::orderBy('id', 'DESC')->get();
        return view('admin.pages.doctors.index')->with('doctors', $doctors);
    }

    public function create()
    {
        $departments = Department::all();

        return view('admin.pages.doctors.create')->with('departments', $departments);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'degree' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'date_of_birth' => 'required|date',
            'profile_photo' => 'required|mimes:jpg,png|max:2048',
            'speciality' => '',
            'education' => '',
            'certificate' => '',
            'experience' => '',
            'biography' => '',
            'email' => 'email|unique:doctors',
            'departments' => 'required|array'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $doctor = new Doctor();
        $this->save($doctor, $request);

        return redirect()->route('admin.doctors')->with('message', 'Yeni doktor kaydı tamamlandı')->with('status', 'success');
    }

    public function show($slug)
    {
        $doctor = Doctor::whereSlug($slug)->with('departments')->firstOrFail();
        $departments = Department::all();

        return view('admin.pages.doctors.show')->with('doctor', $doctor)->with('departments', $departments);
    }

    public function update($slug, Request $request)
    {
        $doctor = Doctor::whereSlug($slug)->firstOrFail();

        $validator = Validator::make($request->all(), [
            'degree' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'date_of_birth' => 'required|date',
            'profile_photo' => 'mimes:jpg,png|max:2048|nullable',
            'speciality' => '',
            'education' => '',
            'experience' => '',
            'biography' => '',
            'certificate' => '',
            'email' => [
                'required',
                'email',
                'unique:doctors,email,'.$doctor->id
            ],
            'departments' => 'required|array'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }


        if ($request->profile_photo != null) $doctor->profile_photo = ImageManagement::imageUpload($request->file('profile_photo'), 'public/images/doctors');
        if ($request->degree != $doctor->degree and $request->degree != null) $doctor->degree = $request->degree;
        if ($request->name != $doctor->name and $request->name != null) $doctor->name = $request->name;
        if ($request->lastname != $doctor->lastname and $request->lastname != null) $doctor->lastname = $request->lastname;
        if ($request->speciality != $doctor->speciality) $doctor->speciality = $request->speciality;
        if ($request->education != $doctor->education) $doctor->education = $request->education;
        if ($request->certificate != $doctor->certificate) $doctor->certificate = $request->certificate;
        if ($request->experience != $doctor->experience) $doctor->experience = $request->experience;
        if ($request->biography != $doctor->biography) $doctor->biography = $request->biography;
        if ($request->date_of_birth != $doctor->date_of_birth and $request->date_of_birth != null) $doctor->date_of_birth = $request->date_of_birth;
        if ($request->foreign_language != $doctor->foreign_language) $doctor->foreign_language = $request->foreign_language;
        if ($request->facebook != $doctor->facebook) $doctor->facebook = $request->facebook;
        if ($request->instagram != $doctor->instagram) $doctor->instagram = $request->instagram;
        if ($request->whatsapp != $doctor->whatsapp) $doctor->whatsapp = $request->whatsapp;
        if ($request->twitter != $doctor->twitter) $doctor->twitter = $request->twitter;
        if ($request->linkedin != $doctor->linkedin) $doctor->linkedin = $request->linkedin;

        $doctor->email = $request->email;
        $doctor->update();

        $doctor->departments()->detach();
        $doctor->departments()->attach($request->departments);

        return redirect()->route('admin.doctors')->with('message', 'Doktor kaydı güncellendi')->with('status', 'info');
    }

    public function destroy($slug)
    {
        Doctor::whereSlug($slug)->delete();

        return redirect()->route('admin.doctors')
            ->with('message', 'Doktor kaydı silindi')
            ->with('status', 'info');
    }

    public function save($doctor, $request)
    {
        $doctor->degree = $request->degree;
        $doctor->name = $request->name;
        $doctor->lastname = $request->lastname;
        $doctor->profile_photo = ImageManagement::imageUpload($request->file('profile_photo'), 'public/images/doctors');
        $doctor->speciality = $request->speciality;
        $doctor->education = $request->education;
        $doctor->certificate = $request->certificate;
        $doctor->experience = $request->experience;
        $doctor->email = $request->email;
        $doctor->biography = $request->biography;
        $doctor->date_of_birth = $request->date_of_birth;
        $doctor->foreign_language = $request->foreign_language;
        $doctor->facebook = $request->facebook;
        $doctor->instagram = $request->instagram;
        $doctor->whatsapp = $request->whatsapp;
        $doctor->twitter = $request->twitter;
        $doctor->linkedin = $request->linkedin;
        $doctor->save();
        $doctor->departments()->attach($request->departments);
    }
}
