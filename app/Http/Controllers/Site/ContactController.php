<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\ClaimMail;
use App\Models\Banner;
use App\Models\Contact;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('İletişim - Bilge Hastanesi');
        SEOMeta::setDescription('Bilge Hastanesi iletişim bilgileri, nasıl giderim, görüş ve önerileriniz');
        SEOMeta::setKeywords(['görüş ve önerileriniz', 'özel hastane', 'hastane', 'tıbbi branş', 'doktorlar', 'hekimler', 'iletişim', 'harita', 'nasıl giderim']);
        OpenGraph::setTitle('İletişim - Bilge Hastanesi');
        OpenGraph::setDescription('Bilge Hastanesi iletişim bilgileri, nasıl giderim, görüş ve önerileriniz');

        $contact = Contact::first();

        $banner = Banner::where('page', 'iletisim')->first();

        if ($contact != null)
            if (isset($banner))
                return view('site.pages.contact.index')->with('contact', $contact)->with('banner', $banner);
            else
                return view('site.pages.contact.index')->with('contact', $contact);
        else
            return redirect()->back();
    }

    public function how_can_i_go()
    {
        SEOMeta::setTitle('İletişim - Bilge Hastanesi');
        SEOMeta::setDescription('Bilge Hastanesi iletişim bilgileri, nasıl giderim, görüş ve önerileriniz');
        SEOMeta::setKeywords(['görüş ve önerileriniz', 'özel hastane', 'hastane', 'tıbbi branş', 'doktorlar', 'hekimler', 'iletişim', 'harita', 'nasıl giderim']);
        OpenGraph::setTitle('İletişim - Bilge Hastanesi');
        OpenGraph::setDescription('Bilge Hastanesi iletişim bilgileri, nasıl giderim, görüş ve önerileriniz');

        $contact = Contact::first();

        $banner = Banner::where('page', 'iletisim')->first();

        if ($contact != null)
            if (isset($banner))
                return view('site.pages.contact.how_can_i_go')->with('contact', $contact)->with('banner', $banner);
            else
                return view('site.pages.contact.how_can_i_go')->with('contact', $contact);
        else
            return redirect()->back();
    }

    public function write_us_get()
    {
        SEOMeta::setTitle('İletişim - Bilge Hastanesi');
        SEOMeta::setDescription('Bilge Hastanesi iletişim bilgileri, nasıl giderim, görüş ve önerileriniz');
        SEOMeta::setKeywords(['görüş ve önerileriniz', 'özel hastane', 'hastane', 'tıbbi branş', 'doktorlar', 'hekimler', 'iletişim', 'harita', 'nasıl giderim']);
        OpenGraph::setTitle('İletişim - Bilge Hastanesi');
        OpenGraph::setDescription('Bilge Hastanesi iletişim bilgileri, nasıl giderim, görüş ve önerileriniz');

        $contact = Contact::first();

        $banner = Banner::where('page', 'iletisim')->first();

        if ($contact != null)
            if (isset($banner))
                return view('site.pages.contact.write_us')->with('contact', $contact)->with('banner', $banner);
            else
                return view('site.pages.contact.write_us')->with('contact', $contact);
        else
            return redirect()->back();
    }

    public function write_us_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'topic' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if ($request->kvkk_checkbox === "on") {

            Mail::to(config('mail.emails.claim.email'))->send(new ClaimMail($request));
            /*Mail::to(env('MAIL_USERNAME'))->send(new ClaimMail($request));*/

            return redirect()->back()->with('message', 'Mesajınız gönderildi')->with('status', 'success');
        } else {
            return redirect()->back()->with('message', 'KVKK metnini onaylamanız gerekmektedir')->with('status', 'error');
        }


    }
}
