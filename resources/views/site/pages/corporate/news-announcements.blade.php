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
                                    @forelse($news as $new)
                                        <div class="image-column col-xl-6 col-lg-12 col-md-12 text-center">
                                            <a href=""><img src="{{ asset('storage/images/news_announcements/' . $new->image) }}" class="rounded shadow-lg img-thumbnail mb-5" style="width: 300px!important;height: 200px!important;" alt=""></a>
                                            <a href=""><h3 class="text-center">{{ $new->title }}</h3></a>
                                            <hr>
                                            <p>{!! \Illuminate\Support\Str::limit($new->content, 255) !!}</p>
                                            <a href="" class="btn btn-default" style="background-color: #1270a2!important; color: white!important;">Devamını Oku</a>
                                        </div>
                                    @empty
                                        Henüz haber ve duyuru kaydı mevcut değil
                                    @endforelse
                                    {{ $news->links('site.partials.pagination') }}
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
