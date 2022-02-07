<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OtherService;
use App\Models\OtherServiceSummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OtherServiceSummaryController extends Controller
{
    public function index()
    {
        $summaries = OtherServiceSummary::orderBy('id', 'DESC')->get();
        return view('admin.pages.other_service_summaries.index')->with('summaries', $summaries);
    }

    public function create()
    {
        $other_services = OtherService::all();
        return view('admin.pages.other_service_summaries.create')->with('other_services', $other_services);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'other_service' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $summary = new OtherServiceSummary();
        $summary->title = $request->title;
        $summary->description = $request->description;
        $summary->other_service_id = $request->other_service;

        $summary->save();

        return redirect()->route('admin.other_service_summaries')->with('message', 'Yeni bilgilendirme kaydı tamamlandı')->with('status', 'success');
    }

    public function show($slug)
    {
        $summary = OtherServiceSummary::whereSlug($slug)->firstOrFail();
        $other_services = OtherService::all();

        return view('admin.pages.other_service_summaries.show')->with('summary', $summary)->with('other_services', $other_services);
    }

    public function update($slug, Request $request)
    {
        $summary = OtherServiceSummary::whereSlug($slug)->firstOrFail();
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'other_service' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $summary->title = $request->title;
        $summary->description = $request->description;
        $summary->other_service_id = $request->other_service;

        $summary->update();
        return redirect()->route('admin.other_service_summaries')->with('message', 'Bilgilendirme kaydı güncellendi')->with('status', 'info');
    }

    public function destroy($slug)
    {
        OtherServiceSummary::whereSlug($slug)->delete();

        return redirect()->route('admin.other_service_summaries')->with('message', 'Bilgilendirme başarıyla silindi')->with('status', 'success');
    }
}
