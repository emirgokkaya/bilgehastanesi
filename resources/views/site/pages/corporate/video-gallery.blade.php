@extends('site.layouts.master')

@section('content')
    <!--Page Title-->
   {{-- <section class="page-title" style="background-image: url({{ asset('images/background/8.jpg') }});">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Video Galeri</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.homepage') }}">Anasayfa</a></li>
                    <li>Video Galeri</li>
                </ul>
            </div>
        </div>
    </section>--}}
    <!--End Page Title-->

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side / Our Blog-->
                <!--Product Info Tabs-->
                <div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12 order-2">
                    <div class="service-detail">
                        <div class="content-box">
                            <div class="two-column">
                                <div class="row">




                                    <!-- Tabs -->

                                        <div class="column col-12">
                                            <div class="default-tabs tabs-box">
                                                <!--Tabs Box-->
                                                <ul class="tab-buttons clearfix">
                                                    <li class="tab-btn active-btn" data-tab="#tab1">Görsel</li>
                                                    <li class="tab-btn" data-tab="#tab2">Video</li>
                                                    <li class="tab-btn" data-tab="#tab3">Sanal Tur</li>
                                                </ul>

                                                <div class="tabs-content">
                                                    <!--Tab-->
                                                    <div class="tab active-tab" id="tab1">
                                                        <div class="row">
                                                            @forelse($galleries_image as $gallery)
                                                                <div class="col-md-6 col-sm-12">
                                                                    <figure class="image">
                                                                        <a href="{{ asset('storage/images/galleries/' . $gallery->source) }}" class="lightbox-image">
                                                                            <img src="{{ asset('storage/images/galleries/' . $gallery->source) }}" width="600" height="400" alt="">
                                                                        </a>
                                                                        @if($gallery->title != "")
                                                                            <h4 class="text-center">{{ $gallery->title }}</h4>
                                                                        @endif
                                                                        @if($gallery->description != "")
                                                                            <p>{!! \Illuminate\Support\Str::limit($gallery->description, 255) !!}</p>
                                                                        @endif
                                                                    </figure>
                                                                </div>
                                                            @empty
                                                            @endforelse
                                                        </div>
                                                    </div>

                                                    <!--Tab-->
                                                    <div class="tab" id="tab2">
                                                        <div class="row">
                                                            @forelse($galleries_video as $gallery)
                                                                <div class="col-md-6 col-sm-12">
                                                                    <video width="290" height="330" class="rounded" poster="{{ asset('images/logo.svg') }}" controls>
                                                                        <source src="{{ asset('storage/images/galleries/' . $gallery->source) }}" type="video/mp4">
                                                                        Your browser does not support the video tag.
                                                                    </video>
                                                                    @if($gallery->title != "")
                                                                        <h4 class="text-left">{{ $gallery->title }}</h4>
                                                                    @endif
                                                                    @if($gallery->description != "")
                                                                        <p>{!! \Illuminate\Support\Str::limit($gallery->description, 255) !!}</p>
                                                                    @endif
                                                                </div>
                                                            @empty
                                                            @endforelse
                                                        </div>
                                                    </div>

                                                    <!--Tab-->
                                                    <div class="tab text-center" id="tab3">
                                                        <h5><a href="{{ asset('sanaltur/index.html') }}" target="_blank"><img
                                                                    src="{{ asset('images/sanal-tur.jpg') }}" alt=""></a></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <!--End Tabs -->



                                    {{--@forelse($galleries as $gallery)
                                    <div class="image-column col-xl-6 col-lg-12 col-md-12">
                                        @if($gallery->type === "image")
                                        <figure class="image">
                                            <a href="{{ asset('storage/images/galleries/' . $gallery->source) }}" class="lightbox-image">
                                                <img src="{{ asset('storage/images/galleries/' . $gallery->source) }}" width="600" height="400" alt="">
                                            </a>
                                            @if($gallery->title != "")
                                                <h4 class="text-center">{{ $gallery->title }}</h4>
                                            @endif
                                            @if($gallery->description != "")
                                                <p>{!! \Illuminate\Support\Str::limit($gallery->description, 255) !!}</p>
                                            @endif
                                        </figure>
                                        @else
                                            <video width="410" height="330" class="rounded" poster="{{ asset('images/logo.svg') }}" controls>
                                                <source src="{{ asset('storage/images/galleries/' . $gallery->source) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                            @if($gallery->title != "")
                                                <h4 class="text-center">{{ $gallery->title }}</h4>
                                            @endif
                                            @if($gallery->description != "")
                                                <p>{!! \Illuminate\Support\Str::limit($gallery->description, 255) !!}</p>
                                            @endif
                                        @endif
                                    </div>
                                    @empty
                                        <div class="text-center text-secondary">
                                            <h5>Henüz bir içerik girilmedi</h5>
                                        </div>

                                    @endforelse--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('site.pages.corporate.partials.sidebar')
            </div>
        </div>
    </div>
    <!-- End Sidebar Page Container -->
@endsection
