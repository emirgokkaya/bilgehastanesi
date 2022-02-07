<?php

namespace App\Http\Controllers\Admin;

use App\CustomClasses\ImageManagement;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('id', 'DESC')->get();
        return view('admin.pages.services.index')->with('services', $services);
    }

    public function create()
    {
        $departments = Department::all();

        return view('admin.pages.services.create')->with('departments', $departments);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required|mimes:jpg,png|max:2048',
            'description' => 'required',
            'departments' => 'required|array'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $service = new Service();
        $service->name = $request->name;
        $service->description = $request->description;

        if ($request->has('image')) {
            /*$file = $request->image;
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $service->image = $fileNameToStore;

            $image = Image::make($file)->save($filename);
            Storage::put("public/images/services/{$fileNameToStore}", $image);*/

            $service->image = ImageManagement::imageUploadService($request->file('image'), 'public/images/services');
        }

        $service->save();

        $service->departments()->attach($request->departments);

        return redirect()->route('admin.services')->with('message', 'Yeni hizmet kaydı tamamlandı')->with('status', 'success');
    }

    public function show($slug)
    {
        $service = Service::whereSlug($slug)->firstOrFail();

        $departments = Department::all();

        return view('admin.pages.services.show')->with('service', $service)->with('departments', $departments);
    }

    public function update($slug, Request $request)
    {
        $service = Service::whereSlug($slug)->firstOrFail();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'mimes:jpg,png|max:2048',
            'description' => 'required',
            'departments' => 'required|array'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if ($request->has('image')) {
            /*$file = $request->image;
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $service->image = $fileNameToStore;

            $image = Image::make($file)->save($filename);
            Storage::put("public/images/services/{$fileNameToStore}", $image);*/

            $service->image = ImageManagement::imageUploadService($request->file('image'), 'public/images/services');
        }

        $service->name = $request->name;
        $service->description = $request->description;

        $service->update();
        $service->departments()->detach();
        $service->departments()->attach($request->departments);

        return redirect()->route('admin.services')->with('message', 'Hizmet kaydı güncellendi')->with('status', 'info');
    }

    public function destroy($slug)
    {
        Service::whereSlug($slug)->delete();

        return redirect()->route('admin.services')->with('message', 'Hizmet başarıyla silindi')->with('status', 'success');
    }
}
