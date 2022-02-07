<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QualityPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QualityPolicyController extends Controller
{
    public function index()
    {
        $quality_policies = QualityPolicy::orderBy('created_at', 'DESC')->get();

        return view('admin.pages.corporations.quality_policies.index')->with('quality_policies', $quality_policies);
    }

    public function create()
    {
        return view('admin.pages.corporations.quality_policies.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'title' => 'required',
           'file1' => 'nullable|mimes:pdf',
           'file2' => 'nullable|mimes:pdf',
           'image' => 'nullable',
           'text' => 'nullable',
           'text2' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $quality = new QualityPolicy();
        $quality->title = $request->title;
        if ($request->has('file1')) {
            $file = $request->file('file1');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $quality->file1 = $fileNameToStore;

            $file->storeAs('public/corporate/quality_policies/', $fileNameToStore);
        }

        if ($request->has('file2')) {
            $file = $request->file('file2');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $quality->file2 = $fileNameToStore;

            $file->storeAs('public/corporate/quality_policies/', $fileNameToStore);
        }

        if ($request->has('image')) {
            $file = $request->file('image');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $quality->image = $fileNameToStore;

            $file->storeAs('public/corporate/quality_policies/images', $fileNameToStore);
        }

        $quality->text = $request->text;
        $quality->text2 = $request->text2;

        $quality->save();


        return redirect()->route('admin.quality_policies')->with('message', 'Kalite Politikası Kaydedildi')->with('status', 'success');
    }

    public function show($slug)
    {
        $quality = QualityPolicy::whereSlug($slug)->first();
        if ($quality === null) {
            return redirect()->back();
        } else {
            return view('admin.pages.corporations.quality_policies.show')->with('quality', $quality);
        }
    }

    public function update(Request $request, $slug)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'file1' => 'nullable|mimes:pdf',
            'file2' => 'nullable|mimes:pdf',
            'image' => 'nullable',
            'text' => 'nullable',
            'text2' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $quality = QualityPolicy::whereSlug($slug)->first();
        $quality->title = $request->title;
        if ($request->has('file1')) {
            $file = $request->file('file1');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $quality->file1 = $fileNameToStore;

            $file->storeAs('public/corporate/quality_policies/', $fileNameToStore);
        }

        if ($request->has('file2')) {
            $file = $request->file('file2');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $quality->file2 = $fileNameToStore;

            $file->storeAs('public/corporate/quality_policies/', $fileNameToStore);
        }

        if ($request->has('image')) {
            $file = $request->file('image');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $quality->image = $fileNameToStore;

            $file->storeAs('public/corporate/quality_policies/images', $fileNameToStore);
        }

        $quality->text = $request->text;
        $quality->text2 = $request->text2;

        $quality->update();


        return redirect()->route('admin.quality_policies')->with('message', 'Kalite Politikası Güncellendi')->with('status', 'success');
    }

    public function destroy($slug)
    {
        QualityPolicy::whereSlug($slug)->delete();

        return redirect()->route('admin.quality_policies')->with('message', 'Kalite Politikası Silindi')->with('status', 'success');
    }
}
