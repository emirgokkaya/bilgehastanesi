@extends('site.layouts.master')

@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image: url(@if(!isset($banner->image)) {{ asset('images/background/8.jpg') }} @else {{ asset('storage/images/banners/cropped_1920_500/' . $banner->image) }} @endif );">
        <div class="auto-container">
            <div class="title-outer" style="background-color: rgba(255, 255, 255, 0.8)">
                <h1>İletişim</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.homepage') }}">Anasayfa</a></li>
                    <li>Nasıl Giderim ?</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    @isset($contact->how_can_i_go)
    <!-- Map Section -->
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-12 text-center">
                <div class="card">
                    <div class="card-header">Ulaşım Bilgileri</div>
                    <div class="card-body">
                        <img src="{{ asset('storage/images/contact/' . $contact->image) }}" alt="">
                        {!! $contact->how_can_i_go !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            <p>{!! $contact->address !!}</p>
                        </div>
                    </div>

                    <div class="contact-info-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner">
                            <span class="icon flaticon-phone"></span>
                            <h4><strong>Telefon</strong></h4>
                            <p><i class="fa fa-phone" style="color: #1270a2"></i> <a href="tel:{{$contact->phone}}">{{ $contact->phone }}</a></p>
                            <p><i class="fa fa-fax" style="color: #1270a2"></i> <a href="tel:{{$contact->fax}}">{{ $contact->fax }}</a></p>
                            <p><i class="fab fa-whatsapp" style="color: #1270a2"></i> <a href="https://api.whatsapp.com/send?phone={{ $contact->whatsapp }}&text=Bilgi%20almak%20istiyorum.">{{ $contact->whatsapp }}</a></p>
                        </div>
                    </div>

                    <div class="contact-info-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner">
                            <span class="icon flaticon-email"></span>
                            <h4><strong>E-Posta</strong></h4>
                            <p><span class="fa fa-envelope" style="color: #1270a2"></span> <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Contact Section -->
@endsection
