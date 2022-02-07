@extends('site.layouts.master')

@section('content')
    <!--Page Title-->
    {{--<section class="page-title" style="background-image: url({{ asset('images/background/8.jpg') }});">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Kalite Politikası</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.homepage') }}">Anasayfa</a></li>
                    <li>Kalite Politikası</li>
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

                                    @if(count($quality_policies) > 0)
                                    <!-- Tabs -->

                                        <div class="column col-12">
                                            <div class="default-tabs tabs-box">
                                                <!--Tabs Box-->
                                                <ul class="tab-buttons clearfix">
                                                    @forelse($quality_policies as $quality)
                                                        <li class="tab-btn @if($loop->first) active-btn @endif" data-tab="#tab{{$quality->id}}">{{ $quality->title }}</li>
                                                    @empty
                                                    @endforelse
                                                </ul>

                                                <div class="tabs-content">
                                                    @forelse($quality_policies as $quality)
                                                        <!--Tab-->
                                                            <div class="tab @if($loop->first) active-tab @endif" id="tab{{$quality->id}}">
                                                                <div class="row">
                                                                    @if($quality->image != null)
                                                                        <div class="col-12 text-center mb-5">
                                                                            <img src="{{ asset('storage/corporate/quality_policies/images/' . $quality->image) }}" width="500" height="300" alt="">
                                                                        </div>
                                                                    @endif
                                                                    @if($quality->text != null)
                                                                        <div class="col-12 mb-5">
                                                                            {!! $quality->text !!}
                                                                        </div>
                                                                    @endif

                                                                    @if($quality->text2 != null)
                                                                        <div class="col-12 mb-5">
                                                                            {!! $quality->text2 !!}
                                                                        </div>
                                                                    @endif

                                                                    @if($quality->file1 != null)
                                                                        <div class="col-6 text-center">
                                                                            <p>{{ \Illuminate\Support\Str::limit($quality->file1, 10)  }}</p>
                                                                            <a href="{{ asset('storage/corporate/quality_policies/' . $quality->file1) }}"><i class="fa fa-file-alt fa-3x"></i></a>
                                                                        </div>
                                                                    @endif

                                                                    @if($quality->file2 != null)
                                                                        <div class="col-6 text-center">
                                                                            <p>{{ \Illuminate\Support\Str::limit($quality->file2, 10) }}</p>
                                                                            <a href="{{ asset('storage/corporate/quality_policies/' . $quality->file2) }}"><i class="fa fa-file-alt fa-3x"></i></a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                    @empty
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>

                                    <!--End Tabs -->
                                    @else
                                        <div class="col-12 text-center">
                                            <p>Henüz içerik kaydı mevcut değil</p>
                                        </div>
                                    @endif
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
