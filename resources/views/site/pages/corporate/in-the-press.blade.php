@extends('site.layouts.master')

@section('content')
    <!--Page Title-->
    {{--<section class="page-title" style="background-image: url({{ asset('images/background/8.jpg') }});">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Basında Biz</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.homepage') }}">Anasayfa</a></li>
                    <li>Basında Biz</li>
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
                    @forelse($presses as $press)
                    <div class="service-detail">
                        <div class="content-box">
                            <div class="title-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <a href="{{ asset('storage/images/corporate/in_the_press/' . $press->image) }}" class="lightbox-image">
                                            <div class="row">
                                                <div class="col-8">
                                                    <i style="color: gray" class="shadow-lg">{{ date('d/m/Y', strtotime($press->history)) }}</i>
                                                    <h2>{{ $press->title }}</h2>
                                                    <span class="theme_color">{!! $press->description !!}</span>
                                                </div>
                                                <div class="col-4">
                                                    <img src="{{ asset('storage/images/corporate/in_the_press/' . $press->image) }}" class="rounded-circle shadow-lg img-thumbnail" style="width: 150px!important;height: 150px!important;" alt="">
                                                </div>
                                            </div>
                                            <hr>
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="col-12 text-center">
                            <p>Henüz içerik kaydı mevcut değil</p>
                        </div>
                    @endforelse
                    {{ $presses->links('site.partials.pagination') }}
                </div>


                @include('site.pages.corporate.partials.sidebar')
            </div>
        </div>
    </div>
    <!-- End Sidebar Page Container -->
@endsection
