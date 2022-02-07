@extends('site.layouts.master')

@section('content')
    @if(count($sliders) > 0)
    <!--Main Slider-->
    <section class="main-slider mb-5">
        <div class="rev_slider_wrapper fullwidthbanner-container"  id="rev_slider_one_wrapper" data-source="gallery">
            <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
                <ul>
                    @forelse($sliders as $slider)
                        <li data-index="rs-{{$slider->id}}" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb=""  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">

                            <!-- MAIN IMAGE -->
                            <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="20" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{ asset('storage/images/sliders/cropped_1920_900/' . $slider->image) }}">

                            <div class="tp-caption"
                                     data-paddingbottom="[0,0,0,0]"
                                     data-paddingleft="[15,15,15,15]"
                                     data-paddingright="[0,0,0,0]"
                                     data-paddingtop="[0,0,0,0]"
                                     data-responsive_offset="on"
                                     data-type="text"
                                     data-height="none"
                                     data-width="['750','750','750','650']"
                                     data-whitespace="normal"
                                     data-hoffset="['0','0','0','0']"
                                     data-voffset="['-180','-170','-180','-180']"
                                     data-x="['left','left','left','left']"
                                     data-y="['middle','middle','middle','middle']"
                                     data-textalign="['top','top','top','top']"
                                     data-frames='[{"delay":1000,"speed":1500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                                    <span class="title" style="background-color: rgba(255, 255, 255, 0.8)">@if($slider->display === 0) {{ $slider->span_title }} @endif</span>
                                </div>

                            <div class="tp-caption"
                                 data-paddingbottom="[0,0,0,0]"
                                 data-paddingleft="[15,15,15,15]"
                                 data-paddingright="[15,15,15,15]"
                                 data-paddingtop="[0,0,0,0]"
                                 data-responsive_offset="on"
                                 data-type="text"
                                 data-height="none"
                                 data-width="['750','750','750','650']"
                                 data-whitespace="normal"
                                 data-hoffset="['0','0','0','0']"
                                 data-voffset="['-100','-95','-100','-115']"
                                 data-x="['left','left','left','left']"
                                 data-y="['middle','middle','middle','middle']"
                                 data-textalign="['top','top','top','top']"
                                 data-frames='[{"delay":1000,"speed":1500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                                <h2><span style="background-color: rgba(255, 255, 255, 0.8)">@if($slider->display === 0) {{ $slider->title }} @endif</span></h2>
                            </div>

                            <div class="tp-caption"
                                 data-paddingbottom="[0,0,0,0]"
                                 data-paddingleft="[15,15,15,15]"
                                 data-paddingright="[15,15,15,15]"
                                 data-paddingtop="[0,0,0,0]"
                                 data-responsive_offset="on"
                                 data-type="text"
                                 data-height="none"
                                 data-width="['700','750','700','450']"
                                 data-whitespace="normal"
                                 data-hoffset="['0','0','0','0']"
                                 data-voffset="['0','0','0','0']"
                                 data-x="['left','left','left','left']"
                                 data-y="['middle','middle','middle','middle']"
                                 data-textalign="['top','top','top','top']"
                                 data-frames='[{"delay":1000,"speed":1500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                                @if($slider->content != null and $slider->display === 0)<div class="text"><span style="background-color: rgba(255, 255, 255, 0.8)">{{ $slider->content }}</span></div>@endif
                            </div>

                            <div class="tp-caption tp-resizeme"
                                 data-paddingbottom="[0,0,0,0]"
                                 data-paddingleft="[15,15,15,15]"
                                 data-paddingright="[15,15,15,15]"
                                 data-paddingtop="[0,0,0,0]"
                                 data-responsive_offset="on"
                                 data-type="text"
                                 data-height="none"
                                 data-whitespace="normal"
                                 data-width="['650','650','700','300']"
                                 data-hoffset="['0','0','0','0']"
                                 data-voffset="['80','90','90','140']"
                                 data-x="['left','left','left','left']"
                                 data-y="['middle','middle','middle','middle']"
                                 data-textalign="['top','top','top','top']"
                                 data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                                <div class="btn-box">
                                    @if($slider->button_text1 != null and $slider->display === 0)<a href="@if($slider->link1 != null) {{ $slider->link1 }} @else javascript:void(0) @endif" class="theme-btn btn-style-one" style="font-size: 28px!important;"><span class="btn-title">{{ $slider->button_text1 }}</span></a>@endif
                                    @if($slider->button_text2 != null and $slider->display === 0)<a href="@if($slider->link2 != null) {{ $slider->link2 }} @else javascript:void(0) @endif" class="theme-btn btn-style-two" style="font-size: 28px!important;"><span class="btn-title">{{ $slider->button_text2 }}</span></a>@endif
                                </div>
                            </div>
                        </li>
                    @empty
                        <li>Henüz Slayt Kaydedilmedi</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </section>
    <!-- End Main Slider-->

        @if(count($top_features) === 3)
        <!-- Top Features -->
        <section class="top-features">
            <div class="auto-container">
                <div class="row">
                    @forelse($top_features as $feature)
                    <!-- Feature Block -->
                    <div class="feature-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            {{--<img src="{{ asset('images/logo.svg') }}" width="100" alt="">--}}
                            <a href="{{ $feature->link }}"><span class="{{ $feature->icon }}"></span></a>
                            <h4><a href="{{ $feature->link }}">{{ $feature->title }}</a></h4>
                        </div>
                    </div>
                    @empty
                    @endforelse

                    {{--<!-- Feature Block -->
                    <div class="feature-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <span class="icon flaticon-phone-2"></span>
                            <h4><a href="{{ route('site.write_us.get') }}">Bize Danışın</a></h4>
                        </div>
                    </div>

                    <!-- Feature Block -->
                    <div class="feature-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <span class="icon flaticon-doctor"></span>
                            <h4><a href="#">Tahlil Sonuçları</a></h4>
                        </div>
                    </div>--}}
                </div>
            </div>
        </section>
        <!-- End Features Section -->
        @endif

    @endif

    {{--@if(count($services) > 0)
    <!-- Services Section Five -->
    <section class="services-section-five">
        <div class="auto-container">
            <div class="sec-title text-center">
                --}}{{--<span class="sub-title">Hizmetlerimiz</span>--}}{{--
                <h2>Hizmetlerimiz</h2>
                <span class="divider"></span>
            </div>

            <div class="carousel-outer">
                <!-- Services Carousel -->
                <div class="services-carousel owl-carousel owl-theme default-dots">
                    @forelse($services as $service)
                    <!-- service Block -->
                    <div class="service-block-five">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="{{ route('site.service.detail', ['slug' => $service->slug]) }}"><img src="{{ asset('storage/images/services/' . $service->image) }}" alt=""></a></figure>
                            </div>
                            <div class="lower-content">
                                <h4><a href="{{ route('site.service.detail', ['slug' => $service->slug]) }}">{{ $service->name }}</a></h4>
                                <div class="text">{!! \Illuminate\Support\Str::limit($service->content, 50) !!}</div>
                                <a href="#" class="read-more">Okumaya Devam Et <i class="flaticon-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="col-12 mt-5">
                <a href="{{ route('site.services') }}" class="btn btn-block" style="color: white; background-color: #1270a2">Bölüm Hizmetlerimiz</a>
            </div>
        </div>
    </section>
    <!-- End Services Section Five -->
    @endif--}}

    @if(count($departments) > 0)
        <!-- Services Section Five -->
        <section class="services-section-five">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <h2>TIBBİ BÖLÜMLERİMİZ</h2>
                    <span class="divider"></span>
                </div>

                <div class="carousel-outer mb-4">
                    <!-- Services Carousel -->
                    <div class="services-carousel owl-carousel owl-theme default-dots">
                        <!-- service Block -->
                        @forelse($departments as $department)
                        <div class="service-block-five">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href="{{ route('site.department.detail', ['slug' => $department->slug]) }}"><img src="{{ asset('storage/images/departments/' . $department->image) }}" width="370" height="270" alt=""></a></figure>
                                </div>
                                <div class="lower-content">
                                    <h4><a href="{{ route('site.department.detail', ['slug' => $department->slug]) }}">{{ $department->name }}</a></h4>
                                    <div class="text">{!! \Illuminate\Support\Str::limit($department->content, 50) !!}</div>
                                    <a href="{{ route('site.department.detail', ['slug' => $department->slug]) }}" class="read-more">Detaylar <i class="flaticon-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                <a href="{{ route('site.departments') }}" class="theme-btn btn-style-one large btn-block" style="background-color: #1270a2;"><span class="btn-title">Tıbbi Bölümlerimiz</span></a>
            </div>
        </section>
        <!-- End Services Section Five -->
    @endif

    @if(count($doctors) > 0)
    <!-- Services Section Five -->
    <section class="services-section-five mb-5">
        <div class="auto-container">
            <div class="sec-title text-center">
                {{--<span class="sub-title">Hizmetlerimiz</span>--}}
                <h2>DOKTORLARIMIZ</h2>
                <span class="divider"></span>
            </div>

            <div class="carousel-outer">
                <!-- Services Carousel -->
                <div class="services-carousel owl-carousel owl-theme default-dots">
                @forelse($doctors as $doctor)
                    <!-- service Block -->
                        <div class="service-block-five">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href="{{ route('site.doctor.detail', ['slug' => $doctor->slug]) }}"><img src="{{ asset('storage/images/doctors/cropped_270_500/' . $doctor->profile_photo) }}" alt=""></a></figure>
                                </div>
                                <a href="{{ route('site.doctor.detail', ['slug' => $doctor->slug]) }}">
                                    <div class="lower-content">
                                        <h4>
                                           {{ $doctor->degree }}
                                        </h4>
                                        <h4>
                                            {{ $doctor->name . ' ' . $doctor->lastname }}
                                        </h4>
                                        <div class="text" style="color: #1270a2!important;"><a href="{{ route('site.doctor.detail', ['slug' => $doctor->slug]) }}">{{ $doctor->departments[0]->name }}</a></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
                <div class="col-12 mt-5">
                    <a href="{{ route('site.doctors') }}" class="theme-btn btn-style-one large btn-block" style="background-color: #1270a2;"><span class="btn-title">Doktorlarımız</span></a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Section Five -->
    @endif

    @if(count($oservices) > 0)
        <!-- Services Section Five -->
        <section class="services-section-five mb-5">
            <div class="auto-container">
                <div class="sec-title text-center">
                    {{--<span class="sub-title">Hizmetlerimiz</span>--}}
                    <h2>SAĞLIK HİZMETLERİMİZ</h2>
                    <span class="divider"></span>
                </div>

                <div class="carousel-outer">
                    <!-- Services Carousel -->
                    <div class="services-carousel owl-carousel owl-theme default-dots">
                    @forelse($oservices as $service)
                        <!-- service Block -->
                            <div class="service-block-five">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><a href="{{ route('site.oservice.detail', ['slug' => $service->slug]) }}"><img src="{{ asset('storage/images/other_services/' . $service->image) }}" width="370" height="270" alt=""></a></figure>
                                    </div>
                                    <div class="lower-content">
                                        <h4><a href="{{ route('site.oservice.detail', ['slug' => $service->slug]) }}">{{ $service->name }}</a></h4>
                                        <div class="text">{!! \Illuminate\Support\Str::limit($service->content, 50) !!}</div>
                                        <a href="{{ route('site.oservice.detail', ['slug' => $service->slug]) }}" class="read-more">Okumaya Devam Et <i class="flaticon-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                    <div class="col-12 mt-5">
                        <a href="{{ route('site.oservices') }}" class="theme-btn btn-style-one large btn-block" style="background-color: #1270a2;"><span class="btn-title">Sağlık Hizmetlerimiz</span></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Services Section Five -->
    @endif


    @if(count($home_informations) > 0 and $home_information_title[0] != null)
        <!-- About Section Two -->
        <section class="about-section-two">
            <div class="auto-container">
                <div class="row">
                    <!-- Content Column -->
                    <div class="content-column col-xl-6 col-lg-7 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="sec-title">
                                <span class="sub-title">{{ $home_information_title[0]->top_title }}</span>
                                <h4>{{ $home_information_title[0]->title }}</h2>
                                <span class="divider"></span>
                                <p>{{ $home_information_title[0]->content }}</p>
                            </div>

                            <div class="row">
                                @forelse($home_informations as $info)
                                <!-- Feature BLock -->
                                    <div class="feature-block-two col-lg-6 col-md-6 col-sm-12">
                                        <div class="inner-box">
                                            <span class="icon {{ $info->icon }} {{--fa fa-stethoscope--}}"></span>
                                            <h4>{{ $info->title }}</h4>
                                            <p>{!! $info->content !!}</p>
                                        </div>
                                    </div>
                                @empty
                                @endforelse

                                {{--<!-- Feature BLock -->
                                <div class="feature-block-two col-lg-6 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <span class="icon fa fa-ambulance"></span>
                                        <h4>Emergency Help</h4>
                                        <p>Whether you're taking your first steps, just finding your stride,</p>
                                    </div>
                                </div>

                                <!-- Feature BLock -->
                                <div class="feature-block-two col-lg-6 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <span class="icon fa fa-user-md"></span>
                                        <h4>Qualified Doctors</h4>
                                        <p>Whether you're taking your first steps, just finding your stride,</p>
                                    </div>
                                </div>

                                <!-- Feature BLock -->
                                <div class="feature-block-two col-lg-6 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <span class="icon fa fa-first-aid"></span>
                                        <h4>Medical Professionals</h4>
                                        <p>Whether you're taking your first steps, just finding your stride,</p>
                                    </div>
                                </div>
    --}}
                            </div>
                        </div>
                    </div>

                    <!-- Images Column -->
                    <div class="image-column col-xl-6 col-lg-5 col-md-12 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('storage/images/homepage_information_title/' . $home_information_title[0]->image) }}" style="width: 500px!important; height: 550px!important;" alt=""></figure>
                            <div class="icon-box"><span class="icon {{ $home_information_title[0]->icon }}{{-- flaticon-doctor --}}"></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section Two -->
    @endif


    @if(count($image_galleries) > 0)
    <!-- Portfolio Section -->
    <section class="portfolio-section">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sec-title">
                        <h2>GALERİ</h2>
                        <span class="divider"></span>
                    </div>
                </div>
            </div>

            <!--MixitUp Galery-->
            <div class="mixitup-gallery">

                <div class="btns-outer">
                    <a href="{{ route('site.video.gallery') }}" class="theme-btn btn-style-one"><span class="btn-title">Tümünü Görüntüle</span></a>
                    <!--Filter-->
                    <ul class="filter-tabs filter-btns clearfix">
                        <li id="all-source" class="filter active" data-role="button" data-filter="all">Hepsi</li>
                        <li id="image-source" class="filter" data-role="button" data-filter=".image-source">Görsel Galeri</li>
                        {{--<li id="video-source" class="filter" data-role="button" data-filter=".video-source">Video Galeri</li>--}}
                        <li id="sanal-tur" class="filter" data-role="button" data-filter=".sanal-tur">Sanal Tur</li>
                    </ul>
                </div>

                <div class="filter-list row mid-spacing">
                    <!-- Portfolio Block -->
                    @forelse($image_galleries as $gallery)
                        <div class="portfolio-block all mix image-source col-lg-4 col-md-6 col-sm-12 image-list">
                            <div class="image-box">
                                <figure class="image"><img src="{{ asset('storage/images/galleries/' . $gallery->source) }}" width="600" height="400" alt=""></figure>
                                <div class="overlay">
                                    <a href="{{ asset('storage/images/galleries/' . $gallery->source) }}" class="icon-box lightbox-image"><span class="fa fa-expand"></span></a>
                                    <div class="title-box">
                                        <h5>{{ $gallery->title }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse

{{--
                @forelse($video_galleries as $gallery)
                    <!-- Portfolio Block -->
                    <div class="portfolio-block all mix video-source col-lg-4 col-md-6 col-sm-12">

                        <div class="image-box">
                            <figure class="image">
                                <video src="{{ asset('storage/images/galleries/' . $gallery->source) }}" width="100%"></video>
                            </figure>
                            <div class="overlay">
                                <a href="{{ asset('storage/images/galleries/' . $gallery->source) }}" class="icon-box lightbox-image"><span class="fa fa-expand"></span></a>
                                <div class="title-box">
                                    <h5>{{ $gallery->title }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
--}}

                    <!-- Portfolio Block -->
                    <div class="portfolio-block all mix sanal-tur col-lg-12 col-md-12 col-sm-12 sanal-list">
                        <div class="image-box">
                            <figure class="image">
                                <img src="{{ asset('images/sanal-tur.jpg') }}">
                            </figure>
                            <div class="overlay">
                                <div class="title-box">
                                    <a href="{{ asset('sanaltur/index.html') }}" target="_blank"><h5>Bilge Hastanesi Sanal Tur</h5></a>
                                    <div class="cat">
                                        <a href="{{ asset('sanaltur/index.html') }}" target="_blank">Hastanemizi Canlı Gezmek İçin Tıklayınız.</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Portfolio Section -->
    @endif

    @if(count($health_corners) > 0)
        <!-- News Section -->
        <section class="news-section">
            <div class="auto-container">
                <!-- Sec Title -->
                <div class="sec-title text-center">
                    <h2>SAĞLIK KÖŞESİ</h2>
                    <span class="divider"></span>
                </div>

                <div class="row">
                    <!-- News Block -->
                    @forelse($health_corners as $corner)
                        <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                            <div class="inner-box">
                                <div class="image-box">
                                    <a href="{{ route('site.health.corner.show', ['slug' => $corner->slug]) }}">
                                        <figure class="image"><img src="{{ asset('storage/images/health_corners/' . $corner->image) }}" style="width:370px; height:270px" alt=""></figure>
                                    </a>
                                    <a href="javascript:void(0)" class="date">{{ $corner->created_at->diffForHumans() }}</a>
                                </div>
                                <div class="lower-content">
                                    <h4><a href="{{ route('site.health.corner.show', ['slug' => $corner->slug]) }}">{{ $corner->title }}</a></h4>
                                    <div class="text">{!! \Illuminate\Support\Str::limit(strip_tags($corner->content, 150)) !!}</div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse

                    <div class="col-12 text-center">
                        <a href="{{ route('site.health.corner') }}" class="theme-btn btn-style-one large btn-block" style="background-color: #1270a2;"><span class="btn-title">Sağlık Köşesi</span></a>
                    </div>
                </div>
            </div>
        </section>
        <!--End News Section -->
    @endif

    @if(count($news_announcements) > 0)
    <!-- News Section -->
    {{--<section class="news-section">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title text-center">
                <span class="title">Haber ve Duyurular</span>
                <h2>Son Duyurular ve Güncel Haberler</h2>
                <span class="divider"></span>
            </div>

            <div class="row">
                <!-- News Block -->
                @forelse($news_announcements as $news)
                <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-box">
                        <div class="image-box">
                            <a href="{{ route('site.news.announcements.show', ['slug' => $news->slug]) }}">
                                <figure class="image"><img src="{{ asset('storage/images/news_announcements/' . $news->image) }}" width="370" height="270" alt=""></figure>
                            </a>
                            <a href="javascript:void(0)" class="date">{{ $news->created_at->diffForHumans() }}</a>
                        </div>
                        <div class="lower-content">
                            <h4><a href="{{ route('site.news.announcements.show', ['slug' => $news->slug]) }}">{{ $news->title }}</a></h4>
                            <div class="text">{!! \Illuminate\Support\Str::limit($news->content, 50) !!}</div>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse

                <div class="col-12 text-center">
                    <a href="{{ route('site.news.announcements') }}" class="theme-btn btn-style-one large btn-block" style="background-color: #1270a2;"><span class="btn-title">Sağlık Köşesi</span></a>
                </div>
            </div>
        </div>
    </section>--}}
    <!--End News Section -->

    <!-- News Section Three -->
    <section class="news-section-three">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title text-center">
                <h2>SON DUYURULAR VE GÜNCEL HABERLER</h2>
                <span class="divider"></span>
            </div>

            <div class="row">
                @forelse($news_announcements as $news)
                <!-- News Block -->
                <div class="news-block-two col-lg-6 col-md-12 col-sm-12 wow fadeInUp">
                    <div class="inner-box">
                        <figure class="image"><a href="{{ route('site.news.announcements.show', ['slug' => $news->slug]) }}"><img src="{{ asset('storage/images/news_announcements/' . $news->image) }}" width="370" height="270" alt=""></a></figure>
                        <div class="overlay-content">
                            <div class="inner">
                                <span class="date">{{ $news->created_at->diffForHumans() }}</span>
                                <h4><a href="{{ route('site.news.announcements.show', ['slug' => $news->slug]) }}">{{ $news->title }}</a></h4>
                                <a href="{{ route('site.news.announcements.show', ['slug' => $news->slug]) }}" class="read-more">Daha Fazla</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
                <div class="col-12 text-center">
                    <a href="{{ route('site.news.announcements') }}" class="theme-btn btn-style-one large btn-block" style="background-color: #1270a2;"><span class="btn-title">Haber ve Duyurular</span></a>
                </div>
            </div>
        </div>
    </section>
    <!--End News Section -->
    @endif

@endsection
