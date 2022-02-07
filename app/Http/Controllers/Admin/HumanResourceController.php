<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class HumanResourceController extends Controller
{
    public function career_get()
    {
        $career = Career::all();
        return view('admin.pages.corporations.human_resource.career.index')->with('career', $career);
    }

    public function career_save(Request $request)
    {
        if (count(Career::all()) <= 0) {
            $validator = Validator::make($request->all(), [
                'image' => 'required|mimes:jpg,png',
                'title' => 'required',
                'content' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            } else {
                $career = new Career();
                $career->title = $request->title;
                $career->content = $request->content;

                if ($request->has('image')) {
                    $file = $request->image;
                    $filenameWithExt = $file->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                    $filename = preg_replace("/\s+/", '-', $filename);
                    $extension = $file->getClientOriginalExtension();
                    $fileNameToStore = $filename . '_' . time() . '.' . $extension;

                    $career->image = $fileNameToStore;


                    $image = Image::make($file)->save($filename);
                    Storage::put("public/images/corporate/human_resource/career/{$fileNameToStore}", $image);
                }

                $career->save();

                return redirect()->back()->with('message', 'Kariyer yazısı kaydedildi')->with('status', 'success');
            }

        } else {
            $validator = Validator::make($request->all(), [
                'image' => 'mimes:jpg,png',
                'title' => '',
                'content' => ''
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            } else {
                $career = Career::firstOrFail();
                if ($request->title != null or $request->title != "") {
                    $career->title = $request->title;
                }
                if ($request->content != null or $request->content != "") {
                    $career->content = $request->content;
                }

                if ($request->has('image')) {
                    $file = $request->image;
                    $filenameWithExt = $file->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                    $filename = preg_replace("/\s+/", '-', $filename);
                    $extension = $file->getClientOriginalExtension();
                    $fileNameToStore = $filename . '_' . time() . '.' . $extension;

                    $career->image = $fileNameToStore;


                    $image = Image::make($file)->save($filename);
                    Storage::put("public/images/corporate/human_resource/career/{$fileNameToStore}", $image);
                }

                $career->update();

                return redirect()->back()->with('message', 'Kariyer yazısı güncellendi')->with('status', 'success');
            }
        }
    }
}
