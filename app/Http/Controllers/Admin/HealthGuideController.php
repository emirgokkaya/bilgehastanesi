<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HealthGuide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HealthGuideController extends Controller
{
    public function index()
    {
        if (auth()->user()->role != "admin") {
            $health_guides = HealthGuide::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        } else {
            $health_guides = HealthGuide::orderBy('created_at', 'DESC')->get();
        }

        return view('admin.pages.corporations.health_guides.index')->with('health_guides', $health_guides);
    }

    public function create()
    {
        return view('admin.pages.corporations.health_guides.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $health_guide = new HealthGuide();
        $health_guide->title = $request->title;
        $health_guide->description = $request->content;
        $health_guide->user_id = auth()->user()->id;

        $health_guide->save();

        return redirect()->route('admin.health_guides')->with('message', 'Yeni sağlık rehberi kaydı tamamlandı')->with('status', 'success');
    }

    public function show($slug)
    {
        if (auth()->user()->role != "admin") {
            $health_guide = HealthGuide::where('user_id', auth()->user()->id)->whereSlug($slug)->firstOrFail();
        } else {
            $health_guide = HealthGuide::whereSlug($slug)->firstOrFail();
        }

        return view('admin.pages.corporations.health_guides.show')->with('health_guide', $health_guide);
    }

    public function update(Request $request, $slug)
    {
        if (auth()->user()->role != "admin") {
            $news = HealthGuide::where('user_id', auth()->user()->id)->whereSlug($slug)->firstOrFail();
        } else {
            $news = HealthGuide::whereSlug($slug)->firstOrFail();
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $news->title = $request->title;
        $news->description = $request->content;

        $news->update();
        return redirect()->route('admin.health_guides')->with('message', 'Sağlık rehberi kaydı güncellendi')->with('status', 'info');
    }

    public function destroy($slug)
    {
        if (auth()->user()->role != "admin") {
            HealthGuide::where('user_id', auth()->user()->id)->whereSlug($slug)->delete();
        } else {
            HealthGuide::whereSlug($slug)->delete();
        }

        return redirect()->route('admin.health_guides')->with('message', 'Sağlık rehberi başarıyla silindi')->with('status', 'success');
    }
}
