@extends('site.layouts.master')

@section('content')

    <!-- Team Section Two -->
    <section class="team-section-two alternate alternate2">
        <div class="auto-container">

            <div class="row">
                <div class="row mb-5">
                    <div class="column col-lg-12 col-md-12 col-sm-12">
                        <div class="default-tabs style-two tabs-box">
                            <!--Tabs Box-->
                            <ul class="tab-buttons clearfix">
                                <li class="tab-btn active-btn" data-tab="#tab1">Doktorlar({{ count($doctors_search) }})</li>
                                <li class="tab-btn" data-tab="#tab2">Bölümler({{ count($departments_search) }})</li>
                                <li class="tab-btn" data-tab="#tab3">Hizmetler({{ count($services_search) }})</li>
                                <li class="tab-btn" data-tab="#tab4">Diğer Hizmetler({{ count($oservices_search) }})</li>
                                <li class="tab-btn" data-tab="#tab5">Haber ve Duyurular({{ count($news_announcements_search) }})</li>
                                <li class="tab-btn" data-tab="#tab6">Basında Biz({{ count($in_the_presses_search) }})</li>
                                <li class="tab-btn" data-tab="#tab7">Sağlık Köşesi({{ count($health_corners_search) }})</li>
                            </ul>

                            <div class="tabs-content">
                                <!--Tab-->
                                <div class="tab active-tab" id="tab1">
                                    @forelse($doctors_search as $doctor)
                                        <ul class="list-group">
                                            <a href="{{ route('site.doctor.detail', ['slug' => $doctor->slug]) }}" class="list-group-item list-group-item-action">{{ $doctor->degree . ' ' . $doctor->name . ' ' . $doctor->lastname }}</a><br>
                                        </ul>
                                    @empty
                                        <p class="text-center">Doktorlarda herhangi bir sonuç bulunamadı</p>
                                    @endforelse
                                </div>

                                <!--Tab-->
                                <div class="tab" id="tab2">
                                    @forelse($departments_search as $department)
                                        <ul class="list-group">
                                            <a href="{{ route('site.department.detail', ['slug' => $department->slug]) }}" class="list-group-item list-group-item-action">{{ $department->name }}</a><br>
                                        </ul>
                                    @empty
                                        <p class="text-center">Bölümlerde herhangi bir sonuç bulunamadı</p>
                                    @endforelse
                                </div>

                                <!--Tab-->
                                <div class="tab" id="tab3">
                                    @forelse($services_search as $service)
                                        <ul class="list-group">
                                            <a href="{{ route('site.service.detail', ['slug' => $service->slug]) }}" class="list-group-item list-group-item-action">{{ $service->name }}</a><br>
                                        </ul>
                                    @empty
                                        <p class="text-center">Hizmetlerde herhangi bir sonuç bulunamadı</p>
                                    @endforelse
                                </div>

                                <!--Tab-->
                                <div class="tab" id="tab4">
                                    @forelse($oservices_search as $service)
                                        <ul class="list-group">
                                            <a href="{{ route('site.oservice.detail', ['slug' => $service->slug]) }}" class="list-group-item list-group-item-action">{{ $service->name }}</a><br>
                                        </ul>
                                    @empty
                                        <p class="text-center">Diğer Hizmetlerde herhangi bir sonuç bulunamadı</p>
                                    @endforelse
                                </div>

                                <!--Tab-->
                                <div class="tab" id="tab5">
                                    @forelse($news_announcements_search as $news)
                                        <ul class="list-group">
                                            <a href="{{ route('site.news.announcements.show', ['slug' => $news->slug]) }}" class="list-group-item list-group-item-action">{{ $news->title }}</a><br>
                                        </ul>
                                    @empty
                                        <p class="text-center">Haber ve Duyurularda herhangi bir sonuç bulunamadı</p>
                                    @endforelse
                                </div>

                                <!--Tab-->
                                <div class="tab" id="tab6">
                                    @forelse($in_the_presses_search as $press)
                                        <ul class="list-group">
                                            <a href="{{ route('site.in.the.press') }}" class="list-group-item list-group-item-action">{{ $news->title }}</a><br>
                                        </ul>
                                    @empty
                                        <p class="text-center">Basında Bizde herhangi bir sonuç bulunamadı</p>
                                    @endforelse
                                </div>

                                <!--Tab-->
                                <div class="tab" id="tab7">
                                    @forelse($health_corners_search as $corner)
                                        <ul class="list-group">
                                            <a href="{{ route('site.health.corner.show', ['slug' => $corner->slug]) }}" class="list-group-item list-group-item-action">{{ $corner->title }}</a><br>
                                        </ul>
                                    @empty
                                        <p class="text-center">Sağlık Köşesinde herhangi bir sonuç bulunamadı</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="divider-one">
                <!--End Tabs -->
            </div>

        </div>
    </section>
    <!--End Team Section -->
@endsection
