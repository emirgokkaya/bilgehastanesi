@extends('site.layouts.master')

@section('content')
    <!--Page Title-->
    {{--<section class="page-title" style="background-image: url({{ asset('images/background/8.jpg') }});">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Anlaşmalı Kurumlar</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.homepage') }}">Anasayfa</a></li>
                    <li>Anlaşmalı Kurumlar</li>
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
                            <div class="two-column">
                                <div class="row">
                                    @forelse($fuses as $fuse)
                                        <div class="image-column col-md-3 col-6 text-center">
                                            <img src="{{ asset('storage/images/fuses/' . $fuse->image) }}" class="rounded shadow-lg img-thumbnail mb-5" style="width: 200px!important;height: 200px!important;" alt="">
                                            <h3 class="text-center">{{ $fuse->name }}</h3>
                                            <hr>
                                            <p>{!! $fuse->description !!}</p>
                                        </div>
                                    @empty
                                        <div class="col-12 text-center">
                                            <p>Henüz içerik kaydı mevcut değil</p>
                                        </div>
                                    @endforelse

                                    {{--<div class="image-column col-xl-6 col-lg-12 col-md-12">
                                        <figure class="image"><a href="{{ asset('images/resource/post-img.jpg') }}" class="lightbox-image"><img src="{{ asset('images/resource/post-img.jpg') }}" alt=""></a></figure>
                                    </div>
                                    <div class="text-column col-xl-6 col-lg-12 col-md-12">
                                        <p>Complete account of the systems and expound the actually teachings of the great explorer of the truth, the master-builder of human uts happiness.</p>
                                        <ul class="list-style-one">
                                            <li>Enhancing Your Vision sit ametcon sec tetur</li>
                                            <li>adipisicing eiusmod tempor tread depth sit tread</li>
                                            <li>eiusmod Your Vision sit ametcon sec tetur sec</li>
                                            <li>adipisicing eiusmod tempor tread depth sit </li>
                                            <li>tread Your Vision sit ametcon sec tetur</li>
                                        </ul>
                                    </div>--}}
                                </div>
                                {{ $fuses->links('site.partials.pagination') }}

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
