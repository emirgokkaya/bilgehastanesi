@extends('site.layouts.master')

@section('content')
    <!--Page Title-->
    {{--<section class="page-title" style="background-image: url({{ asset('images/background/8.jpg') }});">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Yönetim Kurulu</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.homepage') }}">Anasayfa</a></li>
                    <li>Yönetim Kurulu</li>
                </ul>
            </div>
        </div>
    </section>--}}
    <!--End Page Title-->

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row">

                    <!--Content Side / Our Blog-->
                    <div class="content-side col-xl-8 col-lg-8 col-md-8 col-sm-12 order-2">
                        @forelse($directors as $director)
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 text-center">
                                <img src="{{ asset('storage/images/corporate/directors/' . $director->profile_photo) }}" class="img-thumbnail" style="width: 200px!important; height: 200px!important;" alt="">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 text-center">
                                <br><br>
                                <h5>{{ $director->degree . " " . $director->name . " " . $director->lastname }}</h5>
                                <div>
                                    <p>{{ $director->role }}</p>
                                </div>
                                <div>
                                    <p><a href="mailto:{{ $director->email }}">{{ $director->email }}</a></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @empty
                            <div class="row">
                                <div class="col-12 text-center">
                                    <p>Henüz içerik kaydı mevcut değil</p>
                                </div>
                            </div>
                        @endforelse

                    </div>


                @include('site.pages.corporate.partials.sidebar')
            </div>
        </div>
    </div>
    <!-- End Sidebar Page Container -->
@endsection
