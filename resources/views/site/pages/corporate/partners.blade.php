@extends('site.layouts.master')

@section('content')
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
                                    @forelse($partners as $partner)
                                        <div class="image-column col-md-12 col-12 text-center">
					    @if(isset($partner->percent))
                                            <img src="{{ asset('storage/images/partners/' . $partner->image) }}" class="rounded shadow-lg img-thumbnail mb-5" style="width: 200px!important;height: 200px!important;" alt="">
                                            @endif
					    <h3 class="text-center">{{ $partner->name }}</h3>
                                            @if(isset($partner->percent))
                                            <div class="skills">
                                                <div class="skill-item">
                                                    <div class="skill-header clearfix">
                                                        <div class="skill-title">Ortaklık Payı</div>
                                                        <div class="skill-percentage"><div class="count-box"><span class="count-text" data-speed="3000" data-stop="{{ $partner->percent }}">0</span>%</div></div>
                                                    </div>
                                                    <div class="skill-bar">
                                                        <div class="bar-inner"><div class="bar progress-line" data-width="{{ $partner->percent }}"></div></div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @if(!$loop->last)
                                                <hr>
                                            @endif
                                        </div>
                                    @empty
                                        <div class="col-12 text-center">
                                            <p>Henüz içerik kaydı mevcut değil</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('site.pages.corporate.partials.sidebar')
            </div>
        </div>
    </div>
@endsection
