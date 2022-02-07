<?php

namespace App\Http\Controllers\Admin;

use App\CustomClasses\ImageManagement;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\HealthCorner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HealthCornerController extends Controller
{
    public function index()
    {
        if (auth()->user()->role != "admin") {
            $health_corners = HealthCorner::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->with('doctors')->get();
        } else {
            $health_corners = HealthCorner::orderBy('created_at', 'DESC')->with('doctors')->get();
        }

        return view('admin.pages.corporations.health_corners.index')->with('health_corners', $health_corners);
    }

    public function create()
    {
        $doctors = Doctor::get(['id', 'degree', 'name', 'lastname']);
        return view('admin.pages.corporations.health_corners.create')->with('doctors', $doctors);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|mimes:jpg,png|max:5120',
            'doctors' => 'array'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $corner = new HealthCorner();

        if ($request->has('image')) {
            $corner->image = ImageManagement::imageUploadNewsAnnouncement($request->file('image'), 'public/images/health_corners');
            $corner->title = $request->title;
            $corner->user_id = auth()->user()->id;
            $corner->content = $request->content;
        }

        $corner->save();
        $corner->doctors()->attach($request->doctors);

        return redirect()->route('admin.health_corners')->with('message', 'Yeni sağlık köşesi kaydı tamamlandı')->with('status', 'success');
    }

    public function show($slug)
    {
        if (auth()->user()->role != "admin") {
            $corner = HealthCorner::where('user_id', auth()->user()->id)->whereSlug($slug)->with('doctors')->firstOrFail();
        } else {
            $corner = HealthCorner::whereSlug($slug)->with('doctors')->firstOrFail();
        }

        $doctors = Doctor::get(['id', 'name', 'lastname', 'degree']);

        return view('admin.pages.corporations.health_corners.show')->with('corner', $corner)->with('doctors', $doctors);
    }

    public function update(Request $request, $slug)
    {
        if (auth()->user()->role != "admin") {
            $corner = HealthCorner::where('user_id', auth()->user()->id)->whereSlug($slug)->firstOrFail();
        } else {
            $corner = HealthCorner::whereSlug($slug)->firstOrFail();
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'image' => 'mimes:jpg,png|max:5120',
            'doctors' => 'array'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }


        if ($request->has('image')) {
            $corner->image = ImageManagement::imageUploadHealthCorners($request->file('image'), 'public/images/health_corners');
        }
        $corner->title = $request->title;
        $corner->content = $request->content;

        $corner->update();

        $corner->doctors()->detach();
        $corner->doctors()->attach($request->doctors);

        return redirect()->route('admin.health_corners')->with('message', 'Sağlık Köşesi kaydı güncellendi')->with('status', 'info');
    }

    public function destroy($slug)
    {
        if (auth()->user()->role != "admin") {
            HealthCorner::where('user_id', auth()->user()->id)->whereSlug($slug)->delete();
        } else {
            HealthCorner::whereSlug($slug)->delete();
        }

        return redirect()->route('admin.health_corners')->with('message', 'Sağlık Köşesi başarıyla silindi')->with('status', 'success');
    }
}
