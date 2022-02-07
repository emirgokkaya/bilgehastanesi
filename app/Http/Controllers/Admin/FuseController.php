<?php

namespace App\Http\Controllers\Admin;

use App\CustomClasses\ImageManagement;
use App\Http\Controllers\Controller;
use App\Models\Fuse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FuseController extends Controller
{
    public function index()
    {
        $fuses = Fuse::orderBy('id', 'DESC')->get();
        return view('admin.pages.corporations.fuses.index')->with('fuses', $fuses);
    }

    public function create()
    {
        return view('admin.pages.corporations.fuses.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|mimes:jpg,png,jpeg,svg,gif',
            'name' => 'required',
            'description' => ''
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $fuse = new Fuse();
        $fuse->name = $request->name;
        $fuse->description = $request->description;

        if ($request->has('image')) {
            $file = $request->file('image');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $fuse->image = $fileNameToStore;

            $file->storeAs('public/images/fuses', $fileNameToStore);
            /*Storage::put("public/images/fuses/{$fileNameToStore}", $file);*/
        }

        $fuse->save();

        return redirect()->route('admin.fuses')->with('message', 'Kurum kaydı tamamlandı')->with('status', 'success');
    }

    public function show($slug)
    {
        $fuse = Fuse::whereSlug($slug)->firstOrFail();

        return view('admin.pages.corporations.fuses.show')->with('fuse', $fuse);
    }

    public function update(Request $request, $slug)
    {

        $validator = Validator::make($request->all(), [
            'image' => 'mimes:jpg,png,jpeg,svg,gif',
            'name' => 'required',
            'description' => ''
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $fuse = Fuse::whereSlug($slug)->firstOrFail();
        $fuse->name = $request->name;
        $fuse->description = $request->description;

        if ($request->has('image')) {
            $file = $request->file('image');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $fuse->image = $fileNameToStore;

            $file->storeAs('public/images/fuses', $fileNameToStore);
            /*Storage::put("public/images/fuses/{$fileNameToStore}", $file);*/
        }

        $fuse->update();

        return redirect()->route('admin.fuses')->with('message', 'Kurum güncellemesi tamamlandı')->with('status', 'success');
    }

    public function destroy($slug)
    {
        Fuse::where('slug', $slug)->delete();

        return redirect()->back()->with('message', 'Kurum silindi')->with('status', 'success');
    }
}
