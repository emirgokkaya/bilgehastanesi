@extends('site.layouts.master')

@section('content')
    <!--Page Title-->
    {{--<section class="page-title" style="background-image: url({{ asset('images/background/8.jpg') }});">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Haber & Duyurular</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.homepage') }}">Anasayfa</a></li>
                    <li>Haber & Duyurular</li>
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
                            <!-- Two Column -->
                            <div class="two-column">
                                <div class="row">
                                    @forelse($corners as $corner)
                                        <div class="image-column col-xl-6 col-lg-12 col-md-12 text-center">
                                            <a href="{{ route('site.health.corner.show', ['slug' => $corner->slug]) }}"><img src="{{ asset('storage/images/health_corners/' . $corner->image) }}" class="rounded shadow-lg img-thumbnail mb-5" style="width: 300px!important;height: 200px!important;" alt=""></a>
                                            <a href="{{ route('site.health.corner.show', ['slug' => $corner->slug]) }}"><h3 class="text-center">{{ $corner->title }}</h3></a>
                                            <hr>
                                            <p>{!! \Illuminate\Support\Str::limit($corner->content, 255) !!}</p>
                                            <div class="row">
                                                <div class="col-6">
                                                    <i class="fa fa-calendar" style="color: #1270a2"></i> {{ $corner->created_at->format('d/m/Y') }}
                                                </div>
                                                <div class="col-6">
                                                    <a href="{{ route('site.health.corner.show', ['slug' => $corner->slug]) }}" class="btn btn-default" style="background-color: #1270a2!important; color: white!important;">Devamını Oku</a>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12 text-center">
                                            <p>Henüz içerik kaydı mevcut değil</p>
                                        </div>
                                    @endforelse

                                    {{ $corners->links('site.partials.pagination') }}

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
