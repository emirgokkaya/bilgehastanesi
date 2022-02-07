@extends('site.layouts.master')

@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image: url(@if(!isset($banner->image)) {{ asset('images/background/8.jpg') }} @else {{ asset('storage/images/banners/cropped_1920_500/' . $banner->image) }} @endif );">
        <div class="auto-container">
            <div class="title-outer" style="background-color: rgba(255, 255, 255, 0.8)">
                <h1>İletişim</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.homepage') }}">Anasayfa</a></li>
                    <li>İletişim Bilgileri</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    @isset($contact->map_url)
    <!-- Map Section -->
    <section class="map-section">
        <div class="auto-container">
            <div class="map-outer">
                {{--<div class="map-canvas"
                     data-zoom="12"
                     data-lat="-37.817085"
                     data-lng="144.955631"
                     data-type="roadmap"
                     data-hue="#ffc400"
                     data-title="Envato"
                     data-icon-path="images/icons/map-marker.png"
                     data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>">
                </div>--}}
                <div class="row">
                    <div class="col-12">
                        {!! $contact->map_url !!}

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Map Section -->
    @endisset

    <!-- Contact Section -->
    <section class="contact-section" id="contact">
        <div class="small-container">
            <!-- Contact box -->
            <div class="contact-box">
                <div class="row">
                    <div class="contact-info-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner">
                            <span class="icon flaticon-worldwide"></span>
                            <h4><strong>Adres</strong></h4>
                            @isset($contact->address)<p>{!! $contact->address !!}</p>@endisset
                        </div>
                    </div>

                    <div class="contact-info-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner">
                            <span class="icon flaticon-phone"></span>
                            <h4><strong>Telefon</strong></h4>
                            @isset($contact->phone)<p><i class="fa fa-phone" style="color: #1270a2"></i> <a href="tel:{{$contact->phone}}">{{ $contact->phone }}</a></p>@endisset
                            @isset($contact->fax)<p><i class="fa fa-fax" style="color: #1270a2"></i> <a href="tel:{{$contact->fax}}">{{ $contact->fax }}</a></p>@endisset
                            @isset($contact->whatsapp)<p><i class="fab fa-whatsapp" style="color: #1270a2"></i> <a href="https://api.whatsapp.com/send?phone={{ $contact->whatsapp }}&text=Bilgi%20almak%20istiyorum.">{{ $contact->whatsapp }}</a></p>@endisset
                        </div>
                    </div>

                    <div class="contact-info-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner">
                            <span class="icon flaticon-email"></span>
                            <h4><strong>E-Posta</strong></h4>
                            @isset($contact->email)<p><span class="fa fa-envelope" style="color: #1270a2"></span> <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>@endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Contact Section -->
@endsection
