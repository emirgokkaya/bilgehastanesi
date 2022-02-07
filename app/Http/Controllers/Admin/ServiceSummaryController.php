<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceSummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceSummaryController extends Controller
{
    public function index()
    {
        $summaries = ServiceSummary::orderBy('id', 'DESC')->get();
        return view('admin.pages.service_summaries.index')->with('summaries', $summaries);
    }

    public function create()
    {
        $services = Service::all();
        return view('admin.pages.service_summaries.create')->with('services', $services);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'service' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $summary = new ServiceSummary();
        $summary->title = $request->title;
        $summary->description = $request->description;
        $summary->service_id = $request->service;

        $summary->save();

        return redirect()->route('admin.service_summaries')->with('message', 'Yeni bilgilendirme kaydı tamamlandı')->with('status', 'success');
    }

    public function show($slug)
    {
        $summary = ServiceSummary::whereSlug($slug)->firstOrFail();
        $services = Service::all();

        return view('admin.pages.service_summaries.show')->with('summary', $summary)->with('services', $services);
    }

    public function update($slug, Request $request)
    {
        $summary = ServiceSummary::whereSlug($slug)->firstOrFail();
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'service' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $summary->title = $request->title;
        $summary->description = $request->description;
        $summary->service_id = $request->service;

        $summary->update();
        return redirect()->route('admin.service_summaries')->with('message', 'Bilgilendirme kaydı güncellendi')->with('status', 'info');
    }

    public function destroy($slug)
    {
        ServiceSummary::whereSlug($slug)->delete();

        return redirect()->route('admin.service_summaries')->with('message', 'Bilgilendirme başarıyla silindi')->with('status', 'success');
    }
}
