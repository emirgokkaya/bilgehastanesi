<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\ChiefPhysician;
use App\Models\CompanionVisitorPolicy;
use App\Models\MissionVision;
use App\Models\PatientRight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class CorporateController extends Controller
{
    public function about_get()
    {
        $about = About::all();
        return view('admin.pages.corporations.about.index')->with('about', $about);
    }

    public function about_save(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'about' => 'required'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }



        if (count(About::all()) <= 0) {
            $about = new About();
            $about->about = $request->about;
            $about->save();

            return redirect()->back()->with('message', 'Hakkımızda yazısı kaydedildi')->with('status', 'success');
        } else {
            $about = About::first();
            $about->about = $request->about;
            $about->update();

            return redirect()->back()->with('message', 'Hakkımızda yazısı güncellendi')->with('status', 'success');
        }
    }

    public function mission_vision_get()
    {
        $mission_vision = MissionVision::all();
        return view('admin.pages.corporations.mission_vision.index')->with('mission_vision', $mission_vision);
    }

    public function mission_vision_save(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'mission_vision' => 'required'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }



        if (count(MissionVision::all()) <= 0) {
            $mission_vision = new MissionVision();
            $mission_vision->mission_vision = $request->mission_vision;
            $mission_vision->save();

            return redirect()->back()->with('message', 'Misyon & Vizyon yazısı kaydedildi')->with('status', 'success');
        } else {
            $mission_vision = MissionVision::first();
            $mission_vision->mission_vision = $request->mission_vision;
            $mission_vision->update();

            return redirect()->back()->with('message', 'Misyon & Vizyon yazısı güncellendi')->with('status', 'success');
        }
    }

    public function chief_physician_get()
    {
        $chief_physician = ChiefPhysician::all();
        return view('admin.pages.corporations.chief_physician.index')->with('chief_physician', $chief_physician);
    }

    public function chief_physician_save(Request $request)
    {
        if (count(ChiefPhysician::all()) <= 0) {
            $validator = Validator::make($request->all(), [
                'profile_image' => 'required|mimes:jpg,png',
                'name' => 'required',
                'content' => 'required'
            ]);

            if ($validator->fails()){
                return redirect()->back()->withErrors($validator->errors());
            } else {
                $chief_physician = new ChiefPhysician();
                $chief_physician->name = $request->name;
                $chief_physician->content = $request->content;

                if ($request->has('profile_image')) {
                    $file = $request->profile_image;
                    $filenameWithExt = $file->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                    $filename = preg_replace("/\s+/", '-', $filename);
                    $extension = $file->getClientOriginalExtension();
                    $fileNameToStore = $filename.'_'.time().'.'.$extension;

                    $chief_physician->profile_image = $fileNameToStore;


                    $image = Image::make($file)->save($filename);
                    Storage::put("public/images/corporate/chief_physician/{$fileNameToStore}", $image);
                }

                $chief_physician->save();

                return redirect()->back()->with('message', 'Başhekimimizden yazısı kaydedildi')->with('status', 'success');
            }

        } else {
            $validator = Validator::make($request->all(), [
                'image' => 'mimes:jpg,png',
                'name' => '',
                'content' => ''
            ]);

            if ($validator->fails()){
                return redirect()->back()->withErrors($validator);
            } else {
                $chief_physician = ChiefPhysician::firstOrFail();
                if ($request->name != null or $request->name != ""){
                    $chief_physician->name = $request->name;
                }
                if ($request->content != null or $request->content != ""){
                    $chief_physician->content = $request->content;
                }

                if ($request->has('profile_image')) {
                    $file = $request->profile_image;
                    $filenameWithExt = $file->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                    $filename = preg_replace("/\s+/", '-', $filename);
                    $extension = $file->getClientOriginalExtension();
                    $fileNameToStore = $filename.'_'.time().'.'.$extension;

                    $chief_physician->profile_image = $fileNameToStore;


                    $image = Image::make($file)->save($filename);
                    Storage::put("public/images/corporate/chief_physician/{$fileNameToStore}", $image);
                }

                $chief_physician->update();

                return redirect()->back()->with('message', 'Başhekimimizden yazısı güncellendi')->with('status', 'success');
            }
        }
    }

    public function contracted_institutions()
    {
    }

    public function past_to_present()
    {
    }

    public function human_resources()
    {

    }

    public function patient_rights()
    {
        $patient_right = PatientRight::all();
        return view('admin.pages.corporations.patient_rights.index')->with('patient_right', $patient_right);
    }

    public function patient_right_save(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'content' => 'required'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }

        if (count(PatientRight::all()) <= 0) {
            $patient_right = new PatientRight();
            $patient_right->content = $request->content;
            $patient_right->save();

            return redirect()->back()->with('message', 'Hasta Hakları kaydedildi')->with('status', 'success');
        } else {
            $patient_right = PatientRight::first();
            $patient_right->content = $request->content;
            $patient_right->update();

            return redirect()->back()->with('message', 'Hasta Hakları güncellendi')->with('status', 'success');
        }
    }

    public function companion_visitor_policy_get()
    {
        $companion_visitor_policy = CompanionVisitorPolicy::all();
        return view('admin.pages.corporations.companion_visitor_policy.index')->with('companion_visitor_policy', $companion_visitor_policy);
    }

    public function companion_visitor_policy_save(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'content' => 'required'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }

        if (count(CompanionVisitorPolicy::all()) <= 0) {
            $companion_visitor = new CompanionVisitorPolicy();
            $companion_visitor->content = $request->content;
            $companion_visitor->save();

            return redirect()->back()->with('message', 'Refakatçi ve Ziyaretçi Politikası kaydedildi')->with('status', 'success');
        } else {
            $companion_visitor = CompanionVisitorPolicy::first();
            $companion_visitor->content = $request->content;
            $companion_visitor->update();

            return redirect()->back()->with('message', 'Refakatçi ve Ziyaretçi Politikası güncellendi')->with('status', 'success');
        }
    }
}
