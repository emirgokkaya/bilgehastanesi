<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\WorkingTimes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorkingTimeController extends Controller
{
    public function index()
    {
        $working_times = WorkingTimes::with('doctors')->get();
        return view('admin.pages.working_times.index')->with('working_times', $working_times);
    }

    public function create()
    {
        $doctors = Doctor::all();
        return view('admin.pages.working_times.create')->with('doctors', $doctors);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'doctor' => 'required',
            'day' => 'required',
            'start' => 'date_format:H:i|nullable',
            'finish' => 'date_format:H:i|after:start|nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $working_time = new WorkingTimes();

        $working_time->day = $request->day;
        $working_time->start = $request->start;
        $working_time->finish = $request->finish;
        $working_time->save();
        $working_time->doctors()->attach($request->doctor);

        return redirect()->route('admin.working_times')->with('message', 'Yeni çalışma saati kaydı tamamlandı')->with('status', 'success');
    }

    public function show($id)
    {
        $working_time = WorkingTimes::with('doctors')->where('id', $id)->firstOrFail();
        $doctors = Doctor::all();

        return view('admin.pages.working_times.show')->with('working_time', $working_time)->with('doctors', $doctors);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'doctor' => 'required',
            'day' => 'required',
            'start' => 'date_format:H:i|nullable',
            'finish' => 'date_format:H:i|after:start|nullable',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $working_time = WorkingTimes::whereId($id)->first();

        $working_time->day = $request->day;
        $working_time->start = $request->start;
        $working_time->finish = $request->finish;
        $working_time->update();
        $working_time->doctors()->detach();
        $working_time->doctors()->attach($request->doctor);

        return redirect()->route('admin.working_times')->with('message', 'Çalışma saati kaydı güncellendi')->with('status', 'info');
    }

    public function destroy($id)
    {
        WorkingTimes::whereId($id)->delete();

        return redirect()->route('admin.working_times')->with('message', 'Çalışma saati kaydı silindi')->with('status', 'success');
    }
}
