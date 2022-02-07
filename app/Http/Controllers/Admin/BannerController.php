<?php

namespace App\Http\Controllers\Admin;

use App\CustomClasses\ImageManagement;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('page', 'DESC')->get();

        return view('admin.pages.banner.index')->with('banners', $banners);
    }

    public function create()
    {
        return view('admin.pages.banner.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'mimes:jpg,png,jpeg|image',
            'page' => [
                'required',
                Rule::in(['bolumlerimiz', 'doktorlarimiz', 'hizmetlerimiz', 'diger-hizmetlerimiz', 'iletisim']),
                'unique:banners,page'
            ]
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $banner = new Banner();
            if ($request->has('image')) {
                $banner->page = $request->page;
                $banner->image = ImageManagement::imageUploadBanners($request->file('image'), 'public/images/banners');

                $banner->save();

                return redirect()->route('admin.banners')->with('message', 'Sayfa Resmi eklendi')->with('status', 'success');
            } else {
                return redirect()->back();
            }
        }
    }

    public function show($page)
    {
        $banner = Banner::wherePage($page)->firstOrFail();
        return view('admin.pages.banner.show')->with('banner', $banner);
    }

    public function update(Request $request, $page)
    {
        $banner = Banner::wherePage($page)->firstOrFail();
        $validator = Validator::make($request->all(), [
            'image' => 'mimes:jpg,png,jpeg|image',
            'page' => [
                'required',
                Rule::in(['bolumlerimiz', 'doktorlarimiz', 'hizmetlerimiz', 'diger-hizmetlerimiz', 'iletisim']),
                'unique:banners,page,'.$banner->id
            ]
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $banner->page = $request->page;
            if ($request->has('image'))
                $banner->image = ImageManagement::imageUploadBanners($request->file('image'), 'public/images/banners');
            $banner->update();
            return redirect()->route('admin.banners')->with('message', 'Sayfa Resmi güncellendi')->with('status', 'info');
        }
    }

    public function destroy($page)
    {
        Banner::wherePage($page)->delete();

        return redirect()->route('admin.banners')->with('message', 'Sayfa Kapak Resmi silindi')->with('status', 'success');
    }
}
