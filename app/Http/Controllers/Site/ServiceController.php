<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Service;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Tıbbi Bölüm Hizmetlerimiz - Bilge Hastanesi');
        SEOMeta::setDescription('Bilge Hastanesi tıbbi bölüm hizmetlerimiz');
        SEOMeta::setKeywords(['hizmetler', 'hizmetlerimiz', 'branş', 'bölüm hizmetleri', 'servislerimiz', 'tubbi bölüm hizmetlerimiz']);
        OpenGraph::setTitle('Tıbbi Bölüm Hizmetlerimiz - Bilge Hastanesi');
        OpenGraph::setDescription('Bilge Hastanesi tıbbi bölüm hizmetlerimiz');

        $services = Service::paginate(9);
        $banner = Banner::where('page', 'hizmetlerimiz')->first();

        if($services->currentPage() > $services->lastPage()) {
            return redirect()->route('site.services');
        }

        if (isset($banner))
            return view('site.pages.services')->with('services', $services)->with('banner', $banner);
        else
            return view('site.pages.services')->with('services', $services);
    }

    public function show($slug)
    {
        $service = Service::whereSlug($slug)->with('departments')->with('summaries')->firstOrFail();

	$related_services = Service::whereHas('departments', function ($query) use ($service) {
            return $query->where('slug', $service->departments[0]->slug);
        })->where('name', '!=' ,$service->name)->get(['name', 'slug']);

        SEOMeta::setTitle($service->name . ' - Bilge Hastanesi');
        SEOMeta::setDescription(strip_tags(Str::limit($service->description)));
        SEOMeta::setKeywords(['hizmetler', 'hizmetlerimiz', 'branş', 'bölüm hizmetleri', 'servislerimiz', $service->name]);
        OpenGraph::setTitle($service->name . ' - Bilge Hastanesi');
        OpenGraph::setDescription(strip_tags(Str::limit($service->description)));

        $doctors = Doctor::whereHas('departments', function ($query) use ($service) {
            $query->whereHas('services', function ($q) use ($service) {
               return $q->where('name', $service->name);
            });
        })->get();

        $otherServices = Service::where('slug', '!=', $slug)->limit(6)->inRandomOrder()->get();

        $banner = Banner::where('page', 'hizmetlerimiz')->first();

        /*$services = Service::whereHas('departments', function ($query) use ($department) {
            return $query->where('name', $department->name);
        });*/

        if (isset($banner))
            return view('site.pages.service_detail')
		->with('service', $service)
		->with('otherServices', $otherServices)
		->with('doctors', $doctors)
		->with('banner', $banner)
		->with('related_services', $related_services)/*->with('services', $services)*/;
        else
            return view('site.pages.service_detail')
		->with('service', $service)
		->with('otherServices', $otherServices)
		->with('doctors', $doctors)
		->with('related_services', $related_services)/*->with('services', $services)*/;
    }
}
