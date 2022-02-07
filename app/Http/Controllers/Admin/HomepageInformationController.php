<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomepageInformationController extends Controller
{
    public function index()
    {
        $homepage_informations = HomepageInformation::orderBy('id', 'DESC')->get();

        return view('admin.pages.homepage_informations.index')->with('homepage_informations', $homepage_informations);
    }

    public function create()
    {
        return view('admin.pages.homepage_informations.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'icon' => '',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $homepage_information = new HomepageInformation();
        $homepage_information->title = $request->title;
        $homepage_information->content = $request->content;
        $homepage_information->icon = $request->icon;

        $homepage_information->save();

        return redirect()->route('admin.homepage_informations')->with('status', 'success')->with('message', 'Bilgilendirme kaydı tamamlandı');
    }

    public function show($slug)
    {
        $info = HomepageInformation::whereSlug($slug)->firstOrFail();

        return view('admin.pages.homepage_informations.show')->with('info', $info);
    }

    public function update(Request $request, $slug)
    {
        $info = HomepageInformation::whereSlug($slug)->firstOrFail();

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'icon' => '',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $info->title = $request->title;
        $info->content = $request->content;
        $info->icon = $request->icon;

        $info->update();

        return redirect()->route('admin.homepage_informations')->with('message', 'Bilgilendirme kaydı düzenlendi')->with('status', 'info');
    }

    public function destroy($slug)
    {
        HomepageInformation::whereSlug($slug)->delete();

        return redirect()->route('admin.homepage_informations')->with('message', 'Bilgilendirme kaydı silindi')->with('status', 'success');
    }
}
