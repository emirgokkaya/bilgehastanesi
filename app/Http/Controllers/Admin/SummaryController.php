<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Summary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SummaryController extends Controller
{
    public function index()
    {
        $summaries = Summary::orderBy('id', 'DESC')->get();
        return view('admin.pages.summaries.index')->with('summaries', $summaries);
    }

    public function create()
    {
        $departments = Department::all();
        return view('admin.pages.summaries.create')->with('departments', $departments);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'department' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $summary = new Summary();
        $summary->title = $request->title;
        $summary->description = $request->description;
        $summary->department_id = $request->department;

        $summary->save();

        return redirect()->route('admin.summaries')->with('message', 'Yeni bilgilendirme kaydı tamamlandı')->with('status', 'success');
    }

    public function show($slug)
    {
        $summary = Summary::whereSlug($slug)->firstOrFail();
        $departmens = Department::all();

        return view('admin.pages.summaries.show')->with('summary', $summary)->with('departments', $departmens);
    }

    public function update($slug, Request $request)
    {
        $summary = Summary::whereSlug($slug)->firstOrFail();
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'department' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $summary->title = $request->title;
        $summary->description = $request->description;
        $summary->department_id = $request->department;

        $summary->update();
        return redirect()->route('admin.summaries')->with('message', 'Bilgilendirme kaydı güncellendi')->with('status', 'info');
    }

    public function destroy($slug)
    {
        Summary::whereSlug($slug)->delete();

        return redirect()->route('admin.summaries')->with('message', 'Bilgilendirme başarıyla silindi')->with('status', 'success');
    }
}
