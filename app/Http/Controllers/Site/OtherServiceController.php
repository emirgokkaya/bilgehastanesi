<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\OtherService;
use App\Models\Service;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OtherServiceController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Sağlık Hizmetlerimiz - Bilge Hastanesi');
        SEOMeta::setDescription('Bilge Hastanesi sağlık hizmetlerimiz');
        SEOMeta::setKeywords(['hizmetler', 'hizmetlerimiz', 'branş', 'bölüm hizmetleri', 'servislerimiz']);
        OpenGraph::setTitle('Sağlık Hizmetlerimiz - Bilge Hastanesi');
        OpenGraph::setDescription('Bilge Hastanesi sağlık hizmetlerimiz');

        $services = OtherService::orderBy('created_at', 'DESC')->paginate(9);
        $services_list = OtherService::orderBy('name', 'ASC')->get(['name', 'slug']);

        if($services->currentPage() > $services->lastPage()) {
            return redirect()->route('site.oservices');
        }

        $banner = Banner::where('page', 'diger-hizmetlerimiz')->first();

        if (isset($banner))
            return view('site.pages.other_services')->with('services', $services)->with('banner', $banner)->with('services_list', $services_list);
        else
            return view('site.pages.other_services')->with('services', $services)->with('services_list', $services_list);
    }

    public function show($slug)
    {
        $service = OtherService::whereSlug($slug)->with('summaries')->first();

        SEOMeta::setTitle($service->name . ' - Bilge Hastanesi');
        SEOMeta::setDescription(strip_tags(Str::limit($service->content)));
        SEOMeta::setKeywords(['hizmetler', 'hizmetlerimiz', 'branş', 'bölüm hizmetleri', 'servislerimiz', $service->name]);
        OpenGraph::setTitle($service->name . ' - Bilge Hastanesi');
        OpenGraph::setDescription(strip_tags(Str::limit($service->content)));

        $banner = Banner::where('page', 'diger-hizmetlerimiz')->first();

        $other_services = OtherService::where('slug', '!=', $slug)->limit(10)->inRandomOrder()->get();

        if ($service != null){
            if (isset($banner))
                return view('site.pages.other_services_detail')
                    ->with('service', $service)
                    ->with('banner', $banner)
                    ->with('other_services', $other_services);
            else
                return view('site.pages.other_services_detail')
                    ->with('service', $service)
                    ->with('other_services', $other_services);
        } else {
            return redirect()->back();
        }
    }

    public function search_other_services(Request $request)
    {
        SEOMeta::setTitle($request->services . ' Sağlık Hizmetlerimiz - Bilge Hastanesi');
        SEOMeta::setDescription('Bilge Hastanesi ' . $request->services . ' hizmetleri');
        SEOMeta::setKeywords(['hizmetler', 'hizmetlerimiz', 'branş', 'bölüm hizmetleri', 'servislerimiz', $request->services]);
        OpenGraph::setTitle($request->services . ' Sağlık Hizmetlerimiz - Bilge Hastanesi');
        OpenGraph::setDescription('Bilge Hastanesi ' . $request->services . ' hizmetleri');

        if ($request->services === null) {
            return redirect()->route('site.oservices');
        }

        $services_list = OtherService::orderBy('name', 'ASC')->get(['name', 'slug']);
        $services = OtherService::where('name', 'LIKE', '%' . $request->services . '%')
            ->orWhere('content', 'LIKE', '%' . $request->services . '%')
            ->paginate(6);

        if($services->currentPage() > $services->lastPage()) {
            return redirect()->route('site.oservices');
        }

        $banner = Banner::where('page', 'diger-hizmetlerimiz')->first();

        if (isset($banner))
            return view('site.pages.other_services')->with('services', $services)->with('banner', $banner)->with('services_list', $services_list);
        else
            return view('site.pages.other_services')->with('services', $services)->with('services_list', $services_list);
    }

    public function search_other_service_detail(Request $request)
    {
        if ($request->search === null) {
            return redirect()->back();
        }

        $service = OtherService::whereSlug($request->search)->firstOrFail();

        $other_services = OtherService::where('slug', '!=', $request->search)->limit(10)->inRandomOrder()->get();

        SEOMeta::setTitle($service->name . ' - Bilge Hastanesi');
        SEOMeta::setDescription(strip_tags(Str::limit($service->content)));
        SEOMeta::setKeywords(['hizmetler', 'hizmetlerimiz', 'branş', 'bölüm hizmetleri', 'servislerimiz', $service->name]);
        OpenGraph::setTitle($service->name . ' - Bilge Hastanesi');
        OpenGraph::setDescription(strip_tags(Str::limit($service->content)));

        $banner = Banner::where('page', 'bolumlerimiz')->first();

        if ($service != null){
            if (isset($banner))
                return view('site.pages.other_services_detail')
                    ->with('service', $service)
                    ->with('banner', $banner)
                    ->with('other_services', $other_services);
            else
                return view('site.pages.other_services_detail')
                    ->with('service', $service)
                    ->with('other_services', $other_services);
        } else {
            return redirect()->back();
        }
    }
}
