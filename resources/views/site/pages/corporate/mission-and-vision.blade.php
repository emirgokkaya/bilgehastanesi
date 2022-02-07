@extends('site.layouts.master')

@section('content')
    <!--Page Title-->
   {{-- <section class="page-title" style="background-image: url({{ asset('images/background/8.jpg') }});">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Misyon & Vizyon</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.homepage') }}">Anasayfa</a></li>
                    <li>Misyon & Vizyon</li>
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
                @if(isset($mission_vision))
                    <div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12 order-2">
                        <div class="service-detail">
                            <div class="content-box ml-3">
                                <div class="title-box text-center">
                                    <h2>Misyon & Vizyon</h2>
                                </div>
                                {!! $mission_vision->mission_vision !!}
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
