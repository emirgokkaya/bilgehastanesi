@extends('site.layouts.master')

@section('content')
    <!--Page Title-->
    {{--<section class="page-title" style="background-image: url({{ asset('images/background/8.jpg') }});">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Sağlık Rehberi</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.homepage') }}">Anasayfa</a></li>
                    <li>Sağlık Rehberi</li>
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
                <div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12 order-2">
                    <div class="service-detail">
                        <div class="content-box">

                            @if(count($guides) > 0)
                                <div class="row mb-5">
                                    <div class="column col-lg-12 col-md-12 col-sm-12">
                                        <!--Accordian Box-->
                                        <ul class="accordion-box">

                                            @forelse($guides as $guide)
                                            <!--Block-->
                                            <li class="accordion block @if($loop->first) active-block @endif">
                                                <div class="acc-btn @if($loop->first) active @endif">{{ $guide->title }} <span class="icon fa fa-chevron-down"></span></div>
                                                <div class="acc-content @if($loop->first) current @endif">
                                                    <div class="content">
                                                        <p>{!!  $guide->description !!}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            @empty
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                                <hr class="divider-one">
                            @else
                                <p class="text-secondary text-center">Kayıt bulunamadı</p>
                            @endif


                            {{--<div class="product-info-tabs">
                                <!--Product Tabs-->
                                <div class="prod-tabs tabs-box">
                                    <!--Tab Btns-->
                                    <ul class="tab-btns tab-buttons clearfix">
                                        @forelse($guides as $guide)
                                        <li data-tab="#prod-details-{{$guide->id}}" class="tab-btn @if($loop->first) active-btn @endif">
                                            {{ $guide->title }}
                                        </li>
                                        @empty
                                        @endforelse
                                    </ul>

                                    <!--Tabs Container-->
                                    <div class="tabs-content">

                                        @forelse($guides as $guide)
                                        <!--Tab / Active Tab-->
                                        <div class="tab @if($loop->first) active-tab @endif" id="prod-details-{{$guide->id}}">
                                            <div class="content">
                                                <p>{!! $guide->description !!}</p>
                                            </div>
                                        </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>--}}

                        </div>
                    </div>
                </div>

                @include('site.pages.corporate.partials.sidebar')
            </div>
        </div>
    </div>
    <!-- End Sidebar Page Container -->
@endsection
