<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\OnlineAppointment;
use App\Models\Contact;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\OtherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OnlineAppointmentController extends Controller
{
    public function online_get()
    {
        $departments = Department::orderBy('name', 'ASC')->get();
        $doctors = Doctor::orderBy('name', 'ASC')->get();
        $other_services = OtherService::orderBy('name', 'ASC')->get();
        $contact = Contact::first();
        return view('site.pages.contact.online_form')
            ->with('departments', $departments)
            ->with('doctors', $doctors)
            ->with('other_services', $other_services)
            ->with('contact', $contact);
    }

    public function online_post(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'topic' => 'required',
            'message' => 'required',
            'department' => '',
            'doctor' => '',
            'other_service' => '',
            'date' => '',
            'time' => ''
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if ($request->kvkk_checkbox === "on"){
            Mail::to(config('mail.emails.appointment.email'))->send(new OnlineAppointment($request));
            return redirect()->back()->with('message', 'Randevu talebiniz alınmıştır.')->with('status', 'success');
        }
        else
            return redirect()->back()->with('message', 'KVKK metni onaylanması gerekiyor')->with('status', 'error');

    }
}
