<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\JobApplication;
use App\Models\About;
use App\Models\AdministrativeTeam;
use App\Models\BoardOfDirector;
use App\Models\Career;
use App\Models\ChiefPhysician;
use App\Models\CompanionVisitorPolicy;
use App\Models\Fuse;
use App\Models\Gallery;
use App\Models\HealthCorner;
use App\Models\HealthGuide;
use App\Models\InThePress;
use App\Models\MissionVision;
use App\Models\NewsAnnouncement;
use App\Models\Partner;
use App\Models\PatientRight;
use App\Models\QualityPolicy;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CorporateController extends Controller
{
    public function about()
    {
        $about = About::first();

        SEOMeta::setTitle('Hakkımızda - Kurumsal - Bilge Hastanesi');
        if (isset($about)) SEOMeta::setDescription(strip_tags(Str::limit($about->about, 100)));
        else SEOMeta::setDescription('Bilge hastanesi hakkımızda sayfası');

        SEOMeta::setKeywords(['hakkımızda', 'özel hastane', 'hastane', 'tıbbi branş', 'doktorlar', 'hekimler', 'vizyon', 'misyon', 'başhekimimizden', 'idari ekip', 'başhekimlik', 'yönetim kurulu', 'kalite politikası',
            'anlaşmalı kurumlar', 'video galeri', 'galeri', 'sanal tur', 'insan kaynakları', 'kariyer', 'haberler', 'duyurular', 'basında biz', 'sağlık köşesi', 'sağlık rehberi', 'hasta hakları', 'refakatçi politikası']);
        OpenGraph::setTitle('Hakkımızda - Kurumsal - Bilge Hastanesi');
        if (isset($about)) OpenGraph::setDescription(strip_tags(Str::limit($about->about, 100)));
        else OpenGraph::setDescription('Bilge hastanesi hakkımızda sayfası');




        if ($about != null) {
            return view('site.pages.corporate.about')->with('about', $about);
        } else {
            return view('site.pages.corporate.about');
        }
    }


    public function mission_vision()
    {
        $mission_vision = MissionVision::first();

        SEOMeta::setTitle('Misyon Vizyon - Kurumsal - Bilge Hastanesi');
        if(isset($mission_vision)) SEOMeta::setDescription(strip_tags(Str::limit($mission_vision->mission_vision, 100)));
        else SEOMeta::setDescription('Bilge hastanesi misyon ve vizyon');
        SEOMeta::setKeywords(['hakkımızda', 'özel hastane', 'hastane', 'tıbbi branş', 'doktorlar', 'hekimler', 'vizyon', 'misyon', 'başhekimimizden', 'idari ekip', 'başhekimlik', 'yönetim kurulu', 'kalite politikası',
            'anlaşmalı kurumlar', 'video galeri', 'galeri', 'sanal tur', 'insan kaynakları', 'kariyer', 'haberler', 'duyurular', 'basında biz', 'sağlık köşesi', 'sağlık rehberi', 'hasta hakları', 'refakatçi politikası']);
        OpenGraph::setTitle('Misyon Vizyon - Kurumsal - Bilge Hastanesi');

        if(isset($mission_vision)) OpenGraph::setDescription(strip_tags(Str::limit($mission_vision->mission_vision, 100)));

        else OpenGraph::setDescription('Bilge hastanesi misyon ve vizyon');

        if ($mission_vision != null)
            return view('site.pages.corporate.mission-and-vision')->with('mission_vision', $mission_vision);
        else
            return view('site.pages.corporate.mission-and-vision');
    }

    public function chief_physician()
    {
        $chief_physician = ChiefPhysician::first();

        if(isset($chief_physician)) SEOMeta::setTitle('Başhekimimizden - ' . $chief_physician->name . ' - Kurumsal - Bilge Hastanesi');
        else SEOMeta::setTitle('Başhekimimizden - Kurumsal - Bilge Hastanesi');

        if(isset($chief_physician)) SEOMeta::setDescription(strip_tags(Str::limit($chief_physician->content, 100)));
        else SEOMeta::setDescription('Bilge Hastanesi başhekimimizden');

        SEOMeta::setKeywords(['hakkımızda', 'özel hastane', 'hastane', 'tıbbi branş', 'doktorlar', 'hekimler', 'vizyon', 'misyon', 'başhekimimizden', 'idari ekip', 'başhekimlik', 'yönetim kurulu', 'kalite politikası',
            'anlaşmalı kurumlar', 'video galeri', 'galeri', 'sanal tur', 'insan kaynakları', 'kariyer', 'haberler', 'duyurular', 'basında biz', 'sağlık köşesi', 'sağlık rehberi', 'hasta hakları', 'refakatçi politikası']);


        if(isset($chief_physician)) OpenGraph::setTitle('Başhekimimizden - ' . $chief_physician->name . ' - Kurumsal - Bilge Hastanesi');
        else OpenGraph::setTitle('Başhekimimizden - Kurumsal - Bilge Hastanesi');

        if(isset($chief_physician)) OpenGraph::setDescription(strip_tags(Str::limit($chief_physician->content, 100)));
        else OpenGraph::setDescription('Bilge Hastanesi başhekimimizden');

        if ($chief_physician != null)
            return view('site.pages.corporate.chief-physician')->with('chief_physician', $chief_physician);
        else
            return view('site.pages.corporate.chief-physician');
    }

    public function board_of_directors()
    {
        SEOMeta::setTitle('Yönetim Kurulu - Kurumsal - Bilge Hastanesi');
        SEOMeta::setDescription('Bilge Hastanesi kurumsal bilgiler');
        SEOMeta::setKeywords(['hakkımızda', 'özel hastane', 'hastane', 'tıbbi branş', 'doktorlar', 'hekimler', 'vizyon', 'misyon', 'başhekimimizden', 'idari ekip', 'başhekimlik', 'yönetim kurulu', 'kalite politikası',
            'anlaşmalı kurumlar', 'video galeri', 'galeri', 'sanal tur', 'insan kaynakları', 'kariyer', 'haberler', 'duyurular', 'basında biz', 'sağlık köşesi', 'sağlık rehberi', 'hasta hakları', 'refakatçi politikası']);
        OpenGraph::setTitle('Yönetim Kurulu - Kurumsal - Bilge Hastanesi');
        OpenGraph::setDescription('Bilge Hastanesi kurumsal bilgiler');

        $directors = BoardOfDirector::orderBy('id', 'DESC')->get();
        return view('site.pages.corporate.board-of-directors')->with('directors', $directors);
    }

    public function administrative_team()
    {
        SEOMeta::setTitle('İdari Ekip - Kurumsal - Bilge Hastanesi');
        SEOMeta::setDescription('Bilge Hastanesi kurumsal bilgiler');
        SEOMeta::setKeywords(['hakkımızda', 'özel hastane', 'hastane', 'tıbbi branş', 'doktorlar', 'hekimler', 'vizyon', 'misyon', 'başhekimimizden', 'idari ekip', 'başhekimlik', 'yönetim kurulu', 'kalite politikası',
            'anlaşmalı kurumlar', 'video galeri', 'galeri', 'sanal tur', 'insan kaynakları', 'kariyer', 'haberler', 'duyurular', 'basında biz', 'sağlık köşesi', 'sağlık rehberi', 'hasta hakları', 'refakatçi politikası']);
        OpenGraph::setTitle('İdari Ekip - Kurumsal - Bilge Hastanesi');
        OpenGraph::setDescription('Bilge Hastanesi kurumsal bilgiler');

        $teams = AdministrativeTeam::orderBy('id', 'DESC')->get();
        return view('site.pages.corporate.administrative-teams')->with('teams', $teams);
    }

    public function quality_policy()
    {
        SEOMeta::setTitle('Kalite Politikası - Kurumsal - Bilge Hastanesi');
        SEOMeta::setDescription('Bilge Hastanesi kurumsal bilgiler');
        SEOMeta::setKeywords(['hakkımızda', 'özel hastane', 'hastane', 'tıbbi branş', 'doktorlar', 'hekimler', 'vizyon', 'misyon', 'başhekimimizden', 'idari ekip', 'başhekimlik', 'yönetim kurulu', 'kalite politikası',
            'anlaşmalı kurumlar', 'video galeri', 'galeri', 'sanal tur', 'insan kaynakları', 'kariyer', 'haberler', 'duyurular', 'basında biz', 'sağlık köşesi', 'sağlık rehberi', 'hasta hakları', 'refakatçi politikası']);
        OpenGraph::setTitle('Kalite Politikası - Kurumsal - Bilge Hastanesi');
        OpenGraph::setDescription('Bilge Hastanesi kurumsal bilgiler');

        $quality_policies = QualityPolicy::all();
        return view('site.pages.corporate.quality-policy')->with('quality_policies', $quality_policies);
    }

    public function contracted_institutions()
    {
        SEOMeta::setTitle('Anlaşmalı Kurumlar - Kurumsal - Bilge Hastanesi');
        SEOMeta::setDescription('Bilge Hastanesi kurumsal bilgiler');
        SEOMeta::setKeywords(['hakkımızda', 'özel hastane', 'hastane', 'tıbbi branş', 'doktorlar', 'hekimler', 'vizyon', 'misyon', 'başhekimimizden', 'idari ekip', 'başhekimlik', 'yönetim kurulu', 'kalite politikası',
            'anlaşmalı kurumlar', 'video galeri', 'galeri', 'sanal tur', 'insan kaynakları', 'kariyer', 'haberler', 'duyurular', 'basında biz', 'sağlık köşesi', 'sağlık rehberi', 'hasta hakları', 'refakatçi politikası']);
        OpenGraph::setTitle('Anlaşmalı Kurumlar - Kurumsal - Bilge Hastanesi');
        OpenGraph::setDescription('Bilge Hastanesi kurumsal bilgiler');

        $fuses = Fuse::orderBy('id', 'DESC')->paginate(8);
        return view('site.pages.corporate.contracted-institutions')->with('fuses', $fuses);
    }

    public function video_gallery()
    {
        SEOMeta::setTitle('Galeri - Kurumsal - Bilge Hastanesi');
        SEOMeta::setDescription('Bilge Hastanesi kurumsal bilgiler');
        SEOMeta::setKeywords(['hakkımızda', 'özel hastane', 'hastane', 'tıbbi branş', 'doktorlar', 'hekimler', 'vizyon', 'misyon', 'başhekimimizden', 'idari ekip', 'başhekimlik', 'yönetim kurulu', 'kalite politikası',
            'anlaşmalı kurumlar', 'video galeri', 'galeri', 'sanal tur', 'insan kaynakları', 'kariyer', 'haberler', 'duyurular', 'basında biz', 'sağlık köşesi', 'sağlık rehberi', 'hasta hakları', 'refakatçi politikası']);
        OpenGraph::setTitle('Galeri - Kurumsal - Bilge Hastanesi');
        OpenGraph::setDescription('Bilge Hastanesi kurumsal bilgiler');

        $galleries_image = Gallery::whereType('image')->orderBy('created_at', 'DESC')->get();
        $galleries_video = Gallery::whereType('video')->orderBy('created_at', 'DESC')->get();
        return view('site.pages.corporate.video-gallery')->with('galleries_image', $galleries_image)->with('galleries_video', $galleries_video);
    }

    public function human_resources_career_get()
    {
        SEOMeta::setTitle('İnsan Kaynakları - Kurumsal - Bilge Hastanesi');
        SEOMeta::setDescription('Bilge Hastanesi kurumsal bilgiler');
        SEOMeta::setKeywords(['hakkımızda', 'özel hastane', 'hastane', 'tıbbi branş', 'doktorlar', 'hekimler', 'vizyon', 'misyon', 'başhekimimizden', 'idari ekip', 'başhekimlik', 'yönetim kurulu', 'kalite politikası',
            'anlaşmalı kurumlar', 'video galeri', 'galeri', 'sanal tur', 'insan kaynakları', 'kariyer', 'haberler', 'duyurular', 'basında biz', 'sağlık köşesi', 'sağlık rehberi', 'hasta hakları', 'refakatçi politikası']);
        OpenGraph::setTitle('İnsan Kaynakları - Kurumsal - Bilge Hastanesi');
        OpenGraph::setDescription('Bilge Hastanesi kurumsal bilgiler');

        $career = Career::first();

        if ($career != null)
            return view('site.pages.corporate.human_resources.human-resources')->with('career', $career);
        else
            return view('site.pages.corporate.human_resources.human-resources');
    }

    public function human_resources_job_application_get()
    {
        SEOMeta::setTitle('İnsan Kaynakları - Kurumsal - Bilge Hastanesi');
        SEOMeta::setDescription('Bilge Hastanesi kurumsal bilgiler');
        SEOMeta::setKeywords(['hakkımızda', 'özel hastane', 'hastane', 'tıbbi branş', 'doktorlar', 'hekimler', 'vizyon', 'misyon', 'başhekimimizden', 'idari ekip', 'başhekimlik', 'yönetim kurulu', 'kalite politikası',
            'anlaşmalı kurumlar', 'video galeri', 'galeri', 'sanal tur', 'insan kaynakları', 'kariyer', 'haberler', 'duyurular', 'basında biz', 'sağlık köşesi', 'sağlık rehberi', 'hasta hakları', 'refakatçi politikası']);
        OpenGraph::setTitle('İnsan Kaynakları - Kurumsal - Bilge Hastanesi');
        OpenGraph::setDescription('Bilge Hastanesi kurumsal bilgiler');

        return view('site.pages.corporate.human_resources.job_application.index');
    }

    public function human_resources_job_application_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'is_adi' => 'required',
           'daha_once' => 'required',
           'is_durumu' => 'required',
           'ad_soyad' => 'required',
           'dogum_yeri' => 'required',
           'dogum_tarihi' => 'required',
           'cinsiyet' => 'required',
           'uyruk' => 'required',
           'iliski_durumu' => 'required',
           'ev_adresi' => 'required',
           'telefon1' => 'required',
           'telefon2' => '',
           'eposta' => 'required',
            'cv' => 'required|mimes:pdf',
            'kvkk_checkbox' => ''
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            if ($request->kvkk_checkbox === "on") {
                $file_url = null;
                if ($request->has('cv')) {
                    $file = $request->file('cv');
                    $filenameWithExt = $file->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                    $filename = preg_replace("/\s+/", '-', $filename);
                    $extension = $file->getClientOriginalExtension();
                    $fileNameToStore = $filename.'_'.time().'.'.$extension;

                    $file->storeAs('corporate/job_applications/', $fileNameToStore);

                    /*$file_url = asset('storage/corporate/job_applications/'. $fileNameToStore);*/

                    Mail::to(config('mail.emails.business.email'))->send(new JobApplication($request, $fileNameToStore));

                    return redirect()->back()->with('message', 'Özgeçmişiniz gönderilmiştir')->with('status', 'success');
                } else {
                    return redirect()->back()->with('message', 'Özgeçmiş dosyası eklemeniz gerekmektedir')->with('status', 'error');
                }
            } else {
                return redirect()->back()->with('message', 'KVKK onaylamanız gerekmektedir')->with('status', 'error');
            }
        }
    }

    public function news_announcements()
    {
        SEOMeta::setTitle('Haber ve Duyurular - Kurumsal - Bilge Hastanesi');
        SEOMeta::setDescription('Bilge Hastanesi kurumsal bilgiler');
        SEOMeta::setKeywords(['hakkımızda', 'özel hastane', 'hastane', 'tıbbi branş', 'doktorlar', 'hekimler', 'vizyon', 'misyon', 'başhekimimizden', 'idari ekip', 'başhekimlik', 'yönetim kurulu', 'kalite politikası',
            'anlaşmalı kurumlar', 'video galeri', 'galeri', 'sanal tur', 'insan kaynakları', 'kariyer', 'haberler', 'duyurular', 'basında biz', 'sağlık köşesi', 'sağlık rehberi', 'hasta hakları', 'refakatçi politikası']);
        OpenGraph::setTitle('Haber ve Duyurular - Kurumsal - Bilge Hastanesi');
        OpenGraph::setDescription('Bilge Hastanesi kurumsal bilgiler');

        $news = NewsAnnouncement::orderBy('created_at', 'DESC')->paginate(10);
        return view('site.pages.corporate.news_announcements.index')->with('news', $news);
    }

    public function news_announcements_show($slug)
    {
        $new = NewsAnnouncement::whereSlug($slug)->firstOrFail();

        if(isset($new)) SEOMeta::setTitle($new->title . ' - Kurumsal - Bilge Hastanesi');
        else SEOMeta::setTitle('Haber ve Duyurular - Kurumsal - Bilge Hastanesi');

        if(isset($new)) SEOMeta::setDescription(strip_tags(Str::limit($new->content, 100)));
        else SEOMeta::setDescription('Haber ve Duyurular - Kurumsal - Bilge Hastanesi');

        SEOMeta::setKeywords(['hakkımızda', 'özel hastane', 'hastane', 'tıbbi branş', 'doktorlar', 'hekimler', 'vizyon', 'misyon', 'başhekimimizden', 'idari ekip', 'başhekimlik', 'yönetim kurulu', 'kalite politikası',
            'anlaşmalı kurumlar', 'video galeri', 'galeri', 'sanal tur', 'insan kaynakları', 'kariyer', 'haberler', 'duyurular', 'basında biz', 'sağlık köşesi', 'sağlık rehberi', 'hasta hakları', 'refakatçi politikası']);

        if(isset($new)) OpenGraph::setTitle($new->title . ' - Kurumsal - Bilge Hastanesi');
        else OpenGraph::setTitle('Haber ve Duyurular - Kurumsal - Bilge Hastanesi');

        if(isset($new)) OpenGraph::setDescription(strip_tags(Str::limit($new->content, 100)));
        else OpenGraph::setDescription('Haber ve Duyurular - Kurumsal - Bilge Hastanesi');

        return view('site.pages.corporate.news_announcements.show')->with('new', $new);
    }

    public function in_the_press()
    {
        SEOMeta::setTitle('Basında Biz - Kurumsal - Bilge Hastanesi');
        SEOMeta::setDescription('Bilge Hastanesi kurumsal bilgiler');
        SEOMeta::setKeywords(['hakkımızda', 'özel hastane', 'hastane', 'tıbbi branş', 'doktorlar', 'hekimler', 'vizyon', 'misyon', 'başhekimimizden', 'idari ekip', 'başhekimlik', 'yönetim kurulu', 'kalite politikası',
            'anlaşmalı kurumlar', 'video galeri', 'galeri', 'sanal tur', 'insan kaynakları', 'kariyer', 'haberler', 'duyurular', 'basında biz', 'sağlık köşesi', 'sağlık rehberi', 'hasta hakları', 'refakatçi politikası']);
        OpenGraph::setTitle('Basında Biz - Kurumsal - Bilge Hastanesi');
        OpenGraph::setDescription('Bilge Hastanesi kurumsal bilgiler');

        $presses = InThePress::orderBy('id', 'DESC')->paginate(6);
        return view('site.pages.corporate.in-the-press')->with('presses', $presses);
    }

    public function health_corner()
    {
        SEOMeta::setTitle('Sağlık Köşesi - Kurumsal - Bilge Hastanesi');
        SEOMeta::setDescription('Bilge Hastanesi kurumsal bilgiler');
        SEOMeta::setKeywords(['hakkımızda', 'özel hastane', 'hastane', 'tıbbi branş', 'doktorlar', 'hekimler', 'vizyon', 'misyon', 'başhekimimizden', 'idari ekip', 'başhekimlik', 'yönetim kurulu', 'kalite politikası',
            'anlaşmalı kurumlar', 'video galeri', 'galeri', 'sanal tur', 'insan kaynakları', 'kariyer', 'haberler', 'duyurular', 'basında biz', 'sağlık köşesi', 'sağlık rehberi', 'hasta hakları', 'refakatçi politikası']);
        OpenGraph::setTitle('Sağlık Köşesi - Kurumsal - Bilge Hastanesi');
        OpenGraph::setDescription('Bilge Hastanesi kurumsal bilgiler');

        $corners = HealthCorner::orderBy('created_at', 'DESC')->paginate(10);
        return view('site.pages.corporate.health_corner.index')->with('corners', $corners);
    }

    public function health_corner_show($slug)
    {
        $corner = HealthCorner::whereSlug($slug)->with('doctors')->orderBy('created_at', 'DESC')->firstOrFail();

        if(isset($corner)) SEOMeta::setTitle($corner->title . ' - Kurumsal - Bilge Hastanesi');
        else SEOMeta::setTitle('Sağlık Köşesi - Kurumsal - Bilge Hastanesi');

        if(isset($corner)) SEOMeta::setDescription(strip_tags(Str::limit($corner->content, 100)));
        else SEOMeta::setDescription('Bilge Hastanesi sağlık köşesi');

        SEOMeta::setKeywords(['hakkımızda', 'özel hastane', 'hastane', 'tıbbi branş', 'doktorlar', 'hekimler', 'vizyon', 'misyon', 'başhekimimizden', 'idari ekip', 'başhekimlik', 'yönetim kurulu', 'kalite politikası',
            'anlaşmalı kurumlar', 'video galeri', 'galeri', 'sanal tur', 'insan kaynakları', 'kariyer', 'haberler', 'duyurular', 'basında biz', 'sağlık köşesi', 'sağlık rehberi', 'hasta hakları', 'refakatçi politikası']);

        if(isset($corner)) OpenGraph::setTitle($corner->title . ' - Kurumsal - Bilge Hastanesi');
        else OpenGraph::setTitle('Sağlık Köşesi - Kurumsal - Bilge Hastanesi');

        if(isset($corner)) OpenGraph::setDescription(strip_tags(Str::limit($corner->content, 100)));
        else OpenGraph::setDescription('Bilge Hastanesi sağlık köşesi');

        return view('site.pages.corporate.health_corner.show')->with('corner', $corner);
    }

    public function ebebek_health_corner()
    {
        return view('site.pages.corporate.ebebek-health-corner');
    }

    public function health_guide()
    {
        SEOMeta::setTitle('Sağlık Rehberi - Kurumsal - Bilge Hastanesi');
        SEOMeta::setDescription('Bilge Hastanesi kurumsal bilgiler');
        SEOMeta::setKeywords(['hakkımızda', 'özel hastane', 'hastane', 'tıbbi branş', 'doktorlar', 'hekimler', 'vizyon', 'misyon', 'başhekimimizden', 'idari ekip', 'başhekimlik', 'yönetim kurulu', 'kalite politikası',
            'anlaşmalı kurumlar', 'video galeri', 'galeri', 'sanal tur', 'insan kaynakları', 'kariyer', 'haberler', 'duyurular', 'basında biz', 'sağlık köşesi', 'sağlık rehberi', 'hasta hakları', 'refakatçi politikası']);
        OpenGraph::setTitle('Sağlık Rehberi - Kurumsal - Bilge Hastanesi');
        OpenGraph::setDescription('Bilge Hastanesi kurumsal bilgiler');

        $guides = HealthGuide::orderBy('title', 'DESC')->get();
        return view('site.pages.corporate.health-guide')->with('guides', $guides);
    }

    public function patient_right()
    {
        $patient_right = PatientRight::first();

        SEOMeta::setTitle('Hasta Hakları - Kurumsal - Bilge Hastanesi');

        if(isset($patient_right)) SEOMeta::setDescription(strip_tags(Str::limit($patient_right->content, 100)));
        else SEOMeta::setDescription('Bilge Hastanesi hasta hakları');

        SEOMeta::setKeywords(['hakkımızda', 'özel hastane', 'hastane', 'tıbbi branş', 'doktorlar', 'hekimler', 'vizyon', 'misyon', 'başhekimimizden', 'idari ekip', 'başhekimlik', 'yönetim kurulu', 'kalite politikası',
            'anlaşmalı kurumlar', 'video galeri', 'galeri', 'sanal tur', 'insan kaynakları', 'kariyer', 'haberler', 'duyurular', 'basında biz', 'sağlık köşesi', 'sağlık rehberi', 'hasta hakları', 'refakatçi politikası']);
        OpenGraph::setTitle('Hasta Hakları - Kurumsal - Bilge Hastanesi');

        if(isset($patient_right)) OpenGraph::setDescription(strip_tags(Str::limit($patient_right->content, 100)));
        else OpenGraph::setDescription('Bilge Hastanesi hasta hakları');

        if ($patient_right != null) {
            return view('site.pages.corporate.patient-rights')->with('patient_right', $patient_right);
        } else {
            return view('site.pages.corporate.patient-rights');
        }
    }

    public function companion_visitor_policy()
    {
        $companion_visitor_policy = CompanionVisitorPolicy::first();

        SEOMeta::setTitle('Refakatçi Politikası - Kurumsal - Bilge Hastanesi');
        if(isset($companion_visitor_policy)) SEOMeta::setDescription(strip_tags(Str::limit($companion_visitor_policy->content, 100)));
        else SEOMeta::setDescription('Refakatçi Politikası - Kurumsal - Bilge Hastanesi');
        SEOMeta::setKeywords(['hakkımızda', 'özel hastane', 'hastane', 'tıbbi branş', 'doktorlar', 'hekimler', 'vizyon', 'misyon', 'başhekimimizden', 'idari ekip', 'başhekimlik', 'yönetim kurulu', 'kalite politikası',
            'anlaşmalı kurumlar', 'video galeri', 'galeri', 'sanal tur', 'insan kaynakları', 'kariyer', 'haberler', 'duyurular', 'basında biz', 'sağlık köşesi', 'sağlık rehberi', 'hasta hakları', 'refakatçi politikası']);
        OpenGraph::setTitle('Refakatçi Politikası - Kurumsal - Bilge Hastanesi');
        if(isset($companion_visitor_policy)) OpenGraph::setDescription(strip_tags(Str::limit($companion_visitor_policy->content, 100)));
        else OpenGraph::setDescription('Refakatçi Politikası - Kurumsal - Bilge Hastanesi');

        if ($companion_visitor_policy != null)
            return view('site.pages.corporate.companion-visitor-policy')->with('companion_visitor_policy', $companion_visitor_policy);
        else
            return view('site.pages.corporate.companion-visitor-policy');
    }

    public function partners()
    {
        $partners = Partner::orderBy('created_at', 'DESC')->get();

        return view('site.pages.corporate.partners')->with('partners', $partners);
    }
}
