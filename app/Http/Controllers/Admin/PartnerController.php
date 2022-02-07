<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('created_at', 'DESC')->get();
        return view('admin.pages.corporations.partners.index')->with('partners', $partners);
    }

    public function create()
    {
        return view('admin.pages.corporations.partners.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'image' => 'nullable|image|mimes:jpg,png',
           'name' => 'required',
           'percent' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $partner = new Partner();
        $partner->name = $request->name;
        $partner->percent = $request->percent;

        if ($request->has('image')) {
            $file = $request->image;
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $partner->image = $fileNameToStore;


            $image = Image::make($file)->save($filename);
            Storage::put("public/images/partners/{$fileNameToStore}", $image);
        }

        $partner->save();

        return redirect()->route('admin.partners')->with('message', 'Ortaklık kaydı yapıldı')->with('status', 'success');
    }

    public function show($name)
    {
        $partner = Partner::whereSlug($name)->firstOrFail();
        return view('admin.pages.corporations.partners.show')->with('partner', $partner);
    }

    public function update(Request $request, $name)
    {
        $partner = Partner::whereSlug($name)->firstOrFail();
        $validator = Validator::make($request->all(), [
            'image' => 'image|mimes:jpg,png|nullable',
            'name' => 'required',
            'percent' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $partner->name = $request->name;
        $partner->percent = $request->percent;

        if ($request->has('image')) {
            $file = $request->image;
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $partner->image = $fileNameToStore;


            $image = Image::make($file)->save($filename);
            Storage::put("public/images/partners/{$fileNameToStore}", $image);
        }

        $partner->update();

        return redirect()->route('admin.partners')->with('message', 'Ortaklık kaydı düzenlendi')->with('status', 'success');
    }

    public function destroy($name)
    {
        Partner::whereSlug($name)->delete();

        return redirect()->route('admin.partners')->with('message', 'Ortaklık kaydı Silindi')->with('status', 'success');
    }
}
