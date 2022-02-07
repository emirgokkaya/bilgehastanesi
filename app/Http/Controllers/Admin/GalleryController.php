<?php

namespace App\Http\Controllers\Admin;

use App\CustomClasses\ImageManagement;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('created_at', 'DESC')->get();
        return view("admin.pages.corporations.galleries.index")->with('galleries', $galleries);
    }

    public function create()
    {
        return view('admin.pages.corporations.galleries.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'source' => 'required|mimes:jpg,png,mp4|max:2048000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $gallery = new Gallery();
        if ($request->has('source')) {
            $file = $request->file('source');
            $fileext = $request->file('source')->getClientOriginalExtension();


            if ($fileext === "jpg" || $fileext === "png" || $fileext === "jpeg") {
                $gallery->source = ImageManagement::imageUploadGalleries($request->file('source'), 'public/images/galleries');
                $gallery->type = "image";
            } else if($fileext === "mp4") {
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $gallery->source = $fileNameToStore;
                $gallery->type = "video";

                $file->storeAs('public/images/galleries', $fileNameToStore);
            } else {
                return redirect()->route('admin.galleries')->with('message', 'Desteklenmeyen dosya formatı, kayıt işlemi başarısız oldu')->with('status', 'error');
            }
        }

        $gallery->title = $request->title;
        $gallery->description = $request->description;

        $gallery->save();

        return redirect()->route('admin.galleries')->with('message', 'Yeni galeri kaydı tamamlandı')->with('status', 'success');
    }

    public function show($slug)
    {
        $gallery = Gallery::whereSlug($slug)->firstOrFail();

        return view('admin.pages.corporations.galleries.show')->with('gallery', $gallery);
    }

    public function update(Request $request, $slug)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'source' => 'mimes:jpg,png,mp4|max:2048000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $gallery = Gallery::whereSlug($slug)->firstOrFail();
        if ($request->has('source')) {
            $file = $request->file('source');
            $fileext = $request->file('source')->getClientOriginalExtension();


            if ($fileext === "jpg" || $fileext === "png" || $fileext === "jpeg") {
                $gallery->source = ImageManagement::imageUploadGalleries($request->file('source'), 'public/images/galleries');
                $gallery->type = "image";
            } else if($fileext === "mp4") {
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $gallery->source = $fileNameToStore;
                $gallery->type = "video";

                $file->storeAs('public/images/galleries', $fileNameToStore);
            } else {
                return redirect()->route('admin.galleries')->with('message', 'Desteklenmeyen dosya formatı, kayıt işlemi başarısız oldu')->with('status', 'error');
            }
        }

        $gallery->title = $request->title;
        $gallery->description = $request->description;

        $gallery->save();

        return redirect()->route('admin.galleries')->with('message', 'Galeri kaydı güncellendi')->with('status', 'success');
    }

    public function destroy($slug)
    {
        Gallery::whereSlug($slug)->delete();

        return redirect()->route('admin.galleries')->with('message', 'Galeri kaydı silindi')->with('status', 'success');
    }
}
