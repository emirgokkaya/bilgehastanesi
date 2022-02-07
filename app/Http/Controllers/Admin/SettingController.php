<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Corporation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        $corporate = Corporation::all();
        return view('admin.pages.corporations.index')->with('corporate', $corporate);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'email' => 'email|required',
            'phone' => 'required',
            'phone2' => '',
            'facebook' => '',
            'instagram' => '',
            'twitter' => '',
            'youtube' => '',
            'linkedin' => '',
            'whatsapp' => '',
            'kvkk' => '',
            'health_policy' => 'mimetypes:application/pdf',
            'international_health_tourism_authorization_certificate' => 'mimetypes:application/pdf',
            'application_form' => 'file',
            'address' => '',
            'year_of_foundation' => ''
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if (count(Corporation::all()) <= 0) {
            $corporate = new Corporation();
            $corporate->email = $request->email;
            $corporate->phone = $request->phone;
            $corporate->phone2 = $request->phone2;
            $corporate->facebook = $request->facebook;
            $corporate->instagram = $request->instagram;
            $corporate->youtube = $request->youtube;
            $corporate->linkedin = $request->linkedin;
            $corporate->whatsapp = $request->whatsapp;
            $corporate->twitter = $request->twitter;
            $corporate->address = $request->address;
            $corporate->year_of_foundation = $request->year_of_foundation;
            $corporate->kvkk = $request->kvkk;
            $corporate->footer_content = $request->footer_content;

            if ($request->has('health_policy')) {
                $file = $request->file('health_policy');
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $corporate->health_policy = $fileNameToStore;

                $file->storeAs('public/corporate', $fileNameToStore);
            }

            if ($request->has('international_health_tourism_authorization_certificate')) {
                $file = $request->file('international_health_tourism_authorization_certificate');
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $corporate->international_health_tourism_authorization_certificate = $fileNameToStore;

                $file->storeAs('public/corporate', $fileNameToStore);
            }

            if ($request->has('application_form')) {
                $file = $request->file('application_form');
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $corporate->application_form = $fileNameToStore;

                $file->storeAs('public/corporate', $fileNameToStore);
            }

            $corporate->save();

            return redirect()->back()->with('message', 'Site ayarları yapıldı')->with('status', 'success');

        } else {
            $corporate = Corporation::first();

            $corporate->email = $request->email;
            $corporate->phone = $request->phone;
            $corporate->phone2 = $request->phone2;
            $corporate->facebook = $request->facebook;
            $corporate->instagram = $request->instagram;
            $corporate->youtube = $request->youtube;
            $corporate->linkedin = $request->linkedin;
            $corporate->whatsapp = $request->whatsapp;
            $corporate->twitter = $request->twitter;
            $corporate->address = $request->address;
            $corporate->year_of_foundation = $request->year_of_foundation;
            $corporate->kvkk = $request->kvkk;
            $corporate->footer_content = $request->footer_content;

            if ($request->has('health_policy')) {
                $file = $request->file('health_policy');
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $corporate->health_policy = $fileNameToStore;

                $file->storeAs('public/corporate', $fileNameToStore);
            }

            if ($request->has('international_health_tourism_authorization_certificate')) {
                $file = $request->file('international_health_tourism_authorization_certificate');
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $corporate->international_health_tourism_authorization_certificate = $fileNameToStore;

                $file->storeAs('public/corporate', $fileNameToStore);
            }

            if ($request->has('application_form')) {
                $file = $request->file('application_form');
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $corporate->application_form = $fileNameToStore;

                $file->storeAs('public/corporate', $fileNameToStore);
            }

            $corporate->update();

            return redirect()->back()->with('message', 'Site ayarları güncellendi')->with('status', 'success');
        }
    }
}
