<?php

namespace App\Http\Controllers\Admin;

use App\CustomClasses\ImageManagement;
use App\Http\Controllers\Controller;
use App\Models\OtherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class OtherServiceController extends Controller
{
    public function index()
    {
        $oservices = OtherService::all();
        return view('admin.pages.oservices.index')->with('services', $oservices);
    }

    public function create()
    {
        return view('admin.pages.oservices.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'name' => 'required',
           'image' => 'image|mimes:png,jpg,jpeg|required',
           'content' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $oservice = new OtherService();
        $oservice->name = $request->name;
        $oservice->content = $request->content;
        if ($request->has('image')) {
            /*$file = $request->file('image');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $oservice->image = $fileNameToStore;

            $file->storeAs('public/images/other_services', $fileNameToStore);*/
            /*Storage::put("public/images/fuses/{$fileNameToStore}", $file);*/

            $oservice->image = ImageManagement::imageUploadOtherService($request->file('image'), 'public/images/other_services');
        }

        $oservice->save();

        return redirect()->route('admin.oservices')->with('message', 'Diğer Hizmet Kaydı Tamalandı')->with('status', 'success');
    }

    public function show($slug)
    {
        $oservice = OtherService::whereSlug($slug)->firstOrFail();
        return view('admin.pages.oservices.show')->with('service', $oservice);
    }

    public function update(Request $request, $slug)
    {
        $service = OtherService::whereSlug($slug)->firstOrFail();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg',
            'content' => 'required'
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
            Storage::put("public/images/other_services/{$fileNameToStore}", $image);*/

            $service->image = ImageManagement::imageUploadOtherService($request->file('image'), 'public/images/other_services');
        }

        $service->name = $request->name;
        $service->content = $request->content;

        $service->update();

        return redirect()->route('admin.oservices')->with('message', 'Diğer Hizmet kaydı güncellendi')->with('status', 'info');
    }

    public function destroy($slug)
    {
        OtherService::whereSlug($slug)->delete();

        return redirect()->route('admin.oservices')->with('message', 'Diğer Hizmet silindi')->with('status', 'success');
    }
}
