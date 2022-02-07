<?php

namespace App\Http\Controllers\Admin;

use App\CustomClasses\ImageManagement;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('id', 'DESC')->get();
        return view('admin.pages.sliders.index')->with('sliders', $sliders);
    }

    public function create()
    {
        return view('admin.pages.sliders.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'image' => 'required|mimes:jpg,png|max:2048',
           'title' => 'required',
           'span_title' => '',
           'content' => '',
           'button_text1' => 'required_with:link1, button_text1',
           'button_text2' => 'required_with:link2, button_text2',
            'link1' => '',
            'link2' => '',
            'display'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }


        $slider = new Slider();
        $this->save($slider, $request);

        return redirect()->route('admin.sliders')->with('message', 'Yeni slayt kaydı tamamlandı')->with('status', 'success');
    }

    public function show($slug) {
        $slider = Slider::whereSlug($slug)->firstOrFail();

        return view('admin.pages.sliders.show')->with('slider', $slider);
    }

    public function update(Request $request, $slug)
    {
        $slider = Slider::whereSlug($slug)->firstOrFail();

        $validator = Validator::make($request->all(), [
            'image' => 'mimes:jpg,png|max:2048',
            'title' => '',
            'span_title' => '',
            'content' => '',
            'button_text1' => 'required_with:link1, button_text1',
            'button_text2' => 'required_with:link2, button_text2',
            'link1' => '',
            'link2' => '',
            'display'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if ($request->image != null){
            $slider->image = ImageManagement::imageUploadSlider($request->file('image'), 'public/images/sliders');
        }
        $slider->title = $request->title;
        $slider->span_title = $request->span_title;
        $slider->content = $request->content;
        $slider->button_text1 = $request->button_text1;
        $slider->button_text2 = $request->button_text2;
        $slider->link1 = $request->link1;
        $slider->link2 = $request->link2;

        if ($request->display === "on") {
            $slider->display = 1;
        } else {
            $slider->display = 0;
        }

        $slider->update();

        return redirect()->route('admin.sliders')->with('message', 'Slayt güncelleme işlemi tamamlandı')->with('status', 'success');
    }

    public function destroy($slug)
    {
        Slider::whereSlug($slug)->delete();

        return redirect()->route('admin.sliders')->with('message', 'Slayt silme işlemi tamamlandı')->with('status', 'success');
    }

    public function save($slider, $request)
    {
        $slider->image = ImageManagement::imageUploadSlider($request->file('image'), 'public/images/sliders');
        $slider->title = $request->title;
        $slider->span_title = $request->span_title;
        $slider->content = $request->content;
        $slider->button_text1 = $request->button_text1;
        $slider->button_text2 = $request->button_text2;
        $slider->link1 = $request->link1;
        $slider->link2 = $request->link2;
        if ($request->display === "on") {
            $slider->display = 1;
        } else {
            $slider->display = 0;
        }

        $slider->save();
    }
}
