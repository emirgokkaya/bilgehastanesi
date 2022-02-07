@extends('site.layouts.master')

@section('content')
    <!--Page Title-->
    {{--<section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.homepage') }}">Anasayfa</a></li>
                    <li>Hakkımızda</li>
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
                @if(isset($about))
                    <div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12 order-2">
                        <div class="service-detail">
                            <div class="content-box">
                                <div class="title-box text-center">
                                    <h2>Hakkımızda</h2>
                                </div>
                                {!! $about->about !!}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12 order-2">
                        <div class="service-detail text-center">
                            <div class="content-box">
                                Henüz içerik kaydı mevcut değil
                            </div>
                        </div>
                    </div>
                @endif

               @include('site.pages.corporate.partials.sidebar')
            </div>
        </div>
    </div>
    <!-- End Sidebar Page Container -->
@endsection
