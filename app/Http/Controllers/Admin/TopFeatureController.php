<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TopFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TopFeatureController extends Controller
{
    public function index()
    {
        $top_features = TopFeature::orderBy('id', 'DESC')->get();

        return view('admin.pages.top_features.index')->with('top_features', $top_features);
    }

    public function create()
    {
        return view('admin.pages.top_features.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'link' => 'required',
            'icon' => ''
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $feature = new TopFeature();
        $feature->title = $request->title;
        $feature->link = $request->link;
        if ($request->icon === null || $request->icon === "") $feature->icon = "icon flaticon-charity";
        else $feature->icon = $request->icon;

        $feature->save();

        return redirect()->route('admin.top_features')->with('message', 'Yeni top feature kaydı tamamlandı')->with('status', 'success');
    }

    public function show($id)
    {
        $feature = TopFeature::whereId($id)->firstOrFail();

        return view('admin.pages.top_features.show')->with('feature', $feature);
    }

    public function update(Request $request, $id)
    {
        $feature = TopFeature::whereId($id)->firstOrFail();
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'link' => 'required',
            'icon' => ''
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $feature->title = $request->title;
        $feature->link = $request->link;
        if ($request->icon === null || $request->icon === "") $feature->icon = "icon flaticon-charity";
        else $feature->icon = $request->icon;

        $feature->update();
        return redirect()->route('admin.top_features')->with('message', 'Top feature kaydı güncellendi')->with('status', 'info');
    }

    public function destroy($id)
    {
        TopFeature::whereId($id)->delete();

        return redirect()->route('admin.top_features')->with('message', 'Top feature başarıyla silindi')->with('status', 'success');
    }
}
