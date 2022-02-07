<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageInformationTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class HomepageInformationTitleController extends Controller
{
    public function homepage_information_title_get()
    {
        $homepage_information_title = HomepageInformationTitle::all();
        return view('admin.pages.homepage_information_titles.index')->with('homepage_information_title', $homepage_information_title);
    }

    public function homepage_information_title_save(Request $request)
    {
        if (count(HomepageInformationTitle::all()) <= 0) {
            $validation = Validator::make($request->all(), [
                'top_title' => '',
                'title' => 'required',
                'content' => 'required',
                'icon' => '',
                'image' => 'required|mimes:jpg,png'
            ]);

            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation);
            }

            $homepage_information_title = new HomepageInformationTitle();
            $homepage_information_title->top_title = $request->top_title;
            $homepage_information_title->title = $request->title;
            $homepage_information_title->content = $request->content;
            $homepage_information_title->icon = $request->icon;

            if ($request->has('image')) {
                $file = $request->image;
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;

                $homepage_information_title->image = $fileNameToStore;


                $image = Image::make($file)->save($filename);
                Storage::put("public/images/homepage_information_title/{$fileNameToStore}", $image);
            }

            $homepage_information_title->save();

            return redirect()->back()->with('message', 'Anasayfa bilgilendirme kaydı tamamlandı')->with('status', 'success');
        } else {
            $validation = Validator::make($request->all(), [
                'top_title' => '',
                'title' => 'required',
                'content' => 'required',
                'icon' => '',
                'image' => 'mimes:jpg,png'
            ]);

            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation);
            }

            $homepage_information_title = HomepageInformationTitle::firstOrFail();
            $homepage_information_title->top_title = $request->top_title;
            $homepage_information_title->title = $request->title;
            $homepage_information_title->content = $request->content;
            $homepage_information_title->icon = $request->icon;


            if ($request->has('image')) {
                $file = $request->image;
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;

                $homepage_information_title->image = $fileNameToStore;


                $image = Image::make($file)->save($filename);
                Storage::put("public/images/homepage_information_title/{$fileNameToStore}", $image);
            }

            $homepage_information_title->update();

            return redirect()->back()->with('message', 'Anasayfa bilgilendirme kaydı güncellendi')->with('status', 'info');
        }
    }
}
