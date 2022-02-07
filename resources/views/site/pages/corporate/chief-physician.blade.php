@extends('site.layouts.master')

@section('content')
    <!--Page Title-->
    {{--<section class="page-title" style="background-image: url({{ asset('images/background/8.jpg') }});">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Başhekimimizden</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.homepage') }}">Anasayfa</a></li>
                    <li>Başhekimimizden</li>
                </ul>
            </div>
        </div>
    </section>--}}
    <!--End Page Title-->

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                @if(isset($chief_physician))
                    <!--Content Side / Our Blog-->
                        <div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12 order-2">
                            <div class="service-detail">
                                <div class="images-box text-center">
                                    <img src="{{ asset('storage/images/corporate/chief_physician/' . $chief_physician->profile_image) }}" style="width: 200px!important;height: 200px!important;" class="img-thumbnail" alt="" width="200" height="200">
                                </div>

                                <div class="content-box">
                                    <div class="title-box text-center">
                                        <h2>{{ $chief_physician->name }}</h2>
                                    </div>
                                    <p>{!! $chief_physician->content !!}</p>
                                </div>
                            </div>
                        </div>
                @else
                        <div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12 order-2">
                            <div class="service-detail text-center">
                                Henüz içerik kaydı mevcut değil
                            </div>
                        </div>
                @endif

                @include('site.pages.corporate.partials.sidebar')
            </div>
        </div>
    </div>
    <!-- End Sidebar Page Container -->
@endsection
