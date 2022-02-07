@extends('site.layouts.master')

@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image: url(@if(!isset($banner->image)) {{ asset('images/background/8.jpg') }} @else {{ asset('storage/images/banners/cropped_1920_500/' . $banner->image) }} @endif );">
        <div class="auto-container">
            <div class="title-outer" style="background-color: rgba(255, 255, 255, 0.8)">
                <h1>Bölüm Hizmetlerimiz</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.homepage') }}">Anasayfa</a></li>
                    <li>Bölüm Hizmetlerimiz</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Services Section -->
    <section class="services-section-two">
        <div class="auto-container">

            <div class="carousel-outer">
                <div class="row">
                    <!-- service Block -->
                    @forelse($services as $service)
                        <div class="service-block-two col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href="{{ route('site.service.detail', ['slug' => $service->slug]) }}"><img src="{{ asset('storage/images/services/' . $service->image) }}" width="370" height="270" alt=""></a></figure>
                                </div>
                                <div class="lower-content">
                                    <div class="title-box">
                                        {{--<span class="icon flaticon-heart-2"></span>--}}
                                        <h4><a href="{{ route('site.service.detail', ['slug' => $service->slug]) }}">{{ $service->name }}</a></h4>
                                    </div>
                                    {{--<div class="text">{{ \Illuminate\Support\Str::limit($department->content, 20) }}</div>--}}
                                    {{--<span class="icon-right flaticon-heart-2"></span>--}}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="service-block-two col-lg-12 col-md-12 col-sm-12 text-center">
                            <h5>Henüz bir hizmet eklenmedi</h5>
                        </div>
                    @endforelse
                </div>

                {{ $services->links('site.partials.pagination') }}
            </div>
        </div>
    </section>
    <!-- End service Section -->
@endsection
