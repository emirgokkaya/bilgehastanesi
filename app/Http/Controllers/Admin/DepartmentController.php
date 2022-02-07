<?php

namespace App\Http\Controllers\Admin;

use App\CustomClasses\ImageManagement;
use App\Http\Controllers\Controller;
use App\Interfaces\IDepartment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Summary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller implements IDepartment
{
    public function index()
    {
        $departments = Department::orderBy('id', 'DESC')->get();
        return view('admin.pages.departments.index')->with('departments', $departments);
    }

    public function create()
    {
        return view('admin.pages.departments.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'image' => 'required|mimes:jpg,png|max:2048',
            'name' => 'required|unique:departments',
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $department = new Department();
        $this->save($department, $request);

        return redirect()->route('admin.departments')->with('message', 'Yeni bölüm kaydı tamamlandı')->with('status', 'success');
    }

    public function show($slug)
    {
        $deparment = Department::whereSlug($slug)->firstOrFail();

        return view('admin.pages.departments.show')->with('department', $deparment);
    }

    public function update($slug, Request $request)
    {
        $department = Department::whereSlug($slug)->firstOrFail();
        $validator = Validator::make($request->all(), [
           'image' => 'mimes:jpg,png|max:2048|nullable',
           'name' => 'required|unique:departments,name,'.$department->id,
           'content' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if ($request->image != null) $department->image = ImageManagement::imageUploadDepartment($request->file('image'), 'public/images/departments');
        $department->name = $request->name;
        $department->content = $request->content;

        $department->update();
        return redirect()->route('admin.departments')->with('message', 'Bölüm kaydı güncellendi')->with('status', 'info');
    }

    public function destroy($slug)
    {
        $department = Department::whereSlug($slug)->first();
        Department::whereSlug($slug)->delete();
        Summary::where('department_id', $department->id)->delete();

        return redirect()->route('admin.departments')->with('message', 'Bölüm başarıyla silindi')->with('status', 'success');
    }

    public function save($department, $request)
    {
        $department->name = $request->name;
        $department->content = $request->content;
        $department->image = ImageManagement::imageUploadDepartment($request->file('image'), 'public/images/departments');
        $department->save();
    }
}
