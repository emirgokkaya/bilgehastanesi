<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Fuse;
use App\Models\Gallery;
use App\Models\HealthCorner;
use App\Models\HomepageInformation;
use App\Models\HomepageInformationTitle;
use App\Models\InThePress;
use App\Models\NewsAnnouncement;
use App\Models\OtherService;
use App\Models\Service;
use App\Models\Slider;
use App\Models\TopFeature;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Bilge Hastanesi');
        SEOMeta::setDescription('Bilge Hastanesi resmi web sitesi');
        SEOMeta::setKeywords(['hastane', 'özel hastane', 'tıbbi branş', 'doktorlar', 'hekimler']);
        OpenGraph::setTitle('Bilge Hastanesi');
        OpenGraph::setDescription('Bilge Hastanesi resmi web sitesi');

        $sliders = Slider::orderBy('id', 'DESC')->get();
        /*$services = Service::orderBy('created_at', 'DESC')->limit(10)->get();*/
        $oservices = OtherService::orderBy('created_at', 'ASC')->limit(12)->get();
        $departments = Department::orderBy('created_at', 'DESC')->limit(12)->get();
        $doctors = Doctor::orderBy('created_at', 'DESC')->with('departments')->limit(12)->get();
        $news_announcements = NewsAnnouncement::orderBy('created_at', 'DESC')->limit(2)->get();
        $health_corners = HealthCorner::orderBy('created_at', 'DESC')->limit(3)->get();
        $image_galleries = Gallery::where('type', 'image')->orderBy('created_at', 'DESC')->limit(3)->get();
        /*$video_galleries = Gallery::where('type', 'video')->orderBy('created_at', 'DESC')->limit(3)->get();*/
        $top_features = TopFeature::orderBy('id', 'DESC')->limit(3)->get();
        $home_informations = HomepageInformation::limit(4)->get();
        $home_information_title = HomepageInformationTitle::get();

        return view('site.index')
            ->with('sliders', $sliders)
            /*->with('services', $services)*/
            ->with('departments', $departments)
            ->with('doctors', $doctors)
            ->with('news_announcements', $news_announcements)
            ->with('oservices', $oservices)
            ->with('image_galleries', $image_galleries)
            /*->with('video_galleries', $video_galleries)*/
            ->with('health_corners', $health_corners)
            ->with('top_features', $top_features)
            ->with('home_informations', $home_informations)
            ->with('home_information_title', $home_information_title);
    }

    public function kvkk()
    {
        SEOMeta::setTitle('KVKK Metni - Bilge Hastanesi');
        SEOMeta::setDescription('KVKK Metni');
        SEOMeta::setKeywords(['kvkk metni', 'kvkk', 'kullanıcı veri koruma kanunu']);
        OpenGraph::setTitle('KVKK Metni - Bilge Hastanesi');
        OpenGraph::setDescription('KVKK Metni');

        return view('site.pages.kvkk.index');
    }

    public function search_post(Request $request)
    {
        SEOMeta::setTitle('Arama Sonucu - Bilge Hastanesi');
        SEOMeta::setDescription($request->keyword . ' arama sonuçları');
        SEOMeta::setKeywords([$request->keyword]);
        OpenGraph::setTitle('Arama Sonucu - Bilge Hastanesi');
        OpenGraph::setDescription($request->keyword . ' arama sonuçları');

        $validator = Validator::make($request->all(), [
            'keyword' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        }

        /*hizmetler*/
        $services = Service::where('name', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere('description', 'LIKE', '%' . $request->keyword . '%')
            ->get();

        /*diğer hizmetler*/
        $oservices = OtherService::where('name', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere('content', 'LIKE', '%' . $request->keyword . '%')
            ->get();

        /*bölümler*/
        $departments = Department::where('name', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere('content', 'LIKE', '%' . $request->keyword . '%')
            ->get();

        /*doktorlar*/
        $doctors = Doctor::where('name', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere('lastname', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere('degree', 'LIKE', '%' .  $request->keyword . '%')
            ->get();

        /*haber ve duyuru*/
        $news_announcements = NewsAnnouncement::where('title', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere('content', 'LIKE', '%' .  $request->keyword . '%')
            ->get();

        /*basında biz*/
        $in_the_presses = InThePress::where('title', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere('description', 'LIKE', '%' . $request->keyword . '%')
            ->get();

        /*sağlık köşesi*/
        $health_corners = HealthCorner::where('title', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere('content', 'LIKE', '%' .  $request->keyword . '%')
            ->get();

        return view('site.pages.search-result')
            ->with('services_search', $services)
            ->with('oservices_search', $oservices)
            ->with('departments_search', $departments)
            ->with('doctors_search', $doctors)
            ->with('news_announcements_search', $news_announcements)
            ->with('in_the_presses_search', $in_the_presses)
            ->with('health_corners_search', $health_corners);
    }

    public function appointment_mail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if ($request->kvkk_checkbox === "on") {

            Mail::to(config('mail.emails.appointment.email'))->send(new Appointment($request));

            return redirect()->back()->with('message', 'Mesajınız gönderildi')->with('status', 'success');
        } else {
            return redirect()->back()->with('message', 'KVKK metnini onaylamanız gerekmektedir')->with('status', 'error');
        }
    }
}
