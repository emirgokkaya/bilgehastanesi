<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InThePress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class InThePressController extends Controller
{
    public function index()
    {
        $in_the_press = InThePress::orderBy('id', 'DESC')->get();
        return view('admin.pages.corporations.in_the_press.index')->with('in_the_press', $in_the_press);
    }

    public function create()
    {
        return view('admin.pages.corporations.in_the_press.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpg,png',
            'title' => 'required',
            'description' => '',
            'history' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $press = new InThePress();
        $press->title = $request->title;
        $press->description = $request->description;
        $press->history = $request->history;

        if ($request->has('image')) {
            $file = $request->image;
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $press->image = $fileNameToStore;


            $image = Image::make($file)->save($filename);
            Storage::put("public/images/corporate/in_the_press/{$fileNameToStore}", $image);
        }

        $press->save();

        return redirect()->route('admin.in_the_press')->with('message', 'Basın kaydı yapıldı')->with('status', 'success');
    }

    public function show($slug)
    {
        $press = InThePress::where('slug', $slug)->firstOrFail();
        return view('admin.pages.corporations.in_the_press.show')->with('press', $press);
    }

    public function update(Request $request, $slug)
    {
        $press = InThePress::whereSlug($slug)->firstOrFail();
        $validator = Validator::make($request->all(), [
            'image' => 'image|mimes:jpg,png',
            'title' => 'required',
            'description' => '',
            'history' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $press->title = $request->title;
        $press->description = $request->description;
        $press->history = $request->history;

        if ($request->has('image')) {
            $file = $request->image;
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $press->image = $fileNameToStore;


            $image = Image::make($file)->save($filename);
            Storage::put("public/images/corporate/in_the_press/{$fileNameToStore}", $image);
        }

        $press->update();

        return redirect()->route('admin.in_the_press')->with('message', 'Basın kaydı düzenlendi')->with('status', 'success');
    }

    public function destroy($slug)
    {
        InThePress::whereSlug($slug)->delete();

        return redirect()->route('admin.in_the_press')->with('message', 'Basın Haberi Silindi')->with('status', 'success');
    }
}
