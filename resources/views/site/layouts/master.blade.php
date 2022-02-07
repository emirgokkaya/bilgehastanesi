<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    {{--<title>{{ env('APP_NAME') }}</title>--}}
    {!! \Artesaos\SEOTools\Facades\SEOTools::generate() !!}

    <!-- Stylesheets -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/revolution/css/settings.css') }}" rel="stylesheet" type="text/css"><!-- REVOLUTION SETTINGS STYLES -->
    <link href="{{ asset('plugins/revolution/css/layers.css') }}" rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES -->
    <link href="{{ asset('plugins/revolution/css/navigation.css') }}" rel="stylesheet" type="text/css"><!-- REVOLUTION NAVIGATION STYLES -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

    <!--Color Themes-->
    <link id="theme-color-file" href="{{ asset('css/color-themes/default-theme.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('images/logofav.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/logofav.png') }}" type="image/x-icon">

    {{-- Footer address area color change --}}
    <style>
         #address_corporate_master > p  {
            font-size: 15px;
            line-height: 26px;
            color: #ffffff;
            font-weight: 400;
            margin: 0;
        }
    </style>

    @yield('customCSS')

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="{{ asset('js/respond.js') }}"></script><![endif]-->
</head>

<body>

<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Main Header-->
    <header class="main-header header-style-one">
        <!-- Header top -->
        <div class="header-top">
            <div class="auto-container">
                <div class="inner-container">
                    @if(isset($corporate->address))
                    <div class="top-left" style="width: 500px!important;">
                        <ul class="contact-list clearfix">
                            <li style="width: 500px!important;"><i class="flaticon-hospital-1"></i>{!! $corporate->address !!}</li>
                            <li><i class="flaticon-back-in-time"></i>7/24 Kaliteli Hizmet</li>
                        </ul>
                    </div>
                    @endif
                    <div class="top-right">
                        <ul class="social-icon-one">
                            @if(isset($corporate->instagram) and $corporate->instagram != "" and $corporate->instagram != null)
                                <li>
                                    <a href="{{ $corporate->instagram }}" target="_blank"><span class="fab fa-instagram"></span></a>
                                </li>
                            @endif

                            @if(isset($corporate->whatsapp) and $corporate->whatsapp != "" and $corporate->whatsapp != null)
                                <li>
                                    <a href="{{ $corporate->whatsapp }}" target="_blank"><span class="fab fa-whatsapp"></span></a>
                                </li>
                            @endif

                            @if(isset($corporate->facebook) and $corporate->facebook != "" and $corporate->facebook != null)
                                <li>
                                    <a href="{{ $corporate->facebook }}" target="_blank"><span class="fab fa-facebook-f"></span></a>
                                </li>
                            @endif

                            @if(isset($corporate->twitter) and $corporate->twitter != "" and $corporate->twitter != null)
                                <li>
                                    <a href="{{ $corporate->twitter }}" target="_blank"><span class="fab fa-twitter"></span></a>
                                </li>
                            @endif

                            @if(isset($corporate->youtube) and $corporate->youtube != "" and $corporate->youtube != null)
                                <li>
                                    <a href="{{ $corporate->youtube }}" target="_blank"><span class="fab fa-youtube"></span></a>
                                </li>
                            @endif

                            @if(isset($corporate->linkedin) and $corporate->linkedin != "" and $corporate->linkedin != null)
                                <li>
                                    <a href="{{ $corporate->linkedin }}" target="_blank"><span class="fab fa-linkedin-in"></span></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top -->

        <!-- Header Lower -->
        <div class="header-lower">
            <div class="auto-container">
                <!-- Main box -->
                <div class="main-box">
                    <div class="logo-box">
                        <div class="logo"><a href="{{ route('site.homepage') }}"><img src="{{ asset('images/logo.svg') }}{{--{{ asset('images/logo.png') }}--}}" alt="" width="180" height="150" title=""></a></div>
                    </div>

                    <!--Nav Box-->
                    <div class="nav-outer">
                        <nav class="nav main-menu">
                            <ul class="navigation" id="navbar">
                                <li class="{{ request()->is('/') ? 'current' : '' }}">
                                    <a href="{{ route('site.homepage') }}">ANASAYFA</a>
                                </li>

                                <li class="dropdown {{ request()->is('kurumsal*') ? 'current' : '' }}">
                                    <span>KURUMSAL</span>
                                    <ul>
                                        <li class="{{ request()->is('kurumsal/hakkimizda*') ? 'current' : '' }}"><a href="{{ route('site.about') }}">Hakkımızda</a></li>
                                        <li class="{{ request()->is('kurumsal/misyon-vizyon*') ? 'current' : '' }}"><a href="{{ route('site.mission.vision') }}">Misyon & Vizyon</a></li>

                                        @if(\Illuminate\Support\Facades\DB::table('partners')->count() != 0)
                                            <li class="{{ request()->is('kurumsal/ortaklik-yapisi*') ? 'current' : '' }}"><a href="{{ route('site.partners') }}">Ortaklık Yapısı</a></li>
                                        @else

                                        @endif

                                        <li class="{{ request()->is('kurumsal/yonetim-kurulu*') ? 'current' : '' }}"><a href="{{ route('site.board.of.directors') }}">Yönetim Kurulu</a></li>
                                        <li class="{{ request()->is('kurumsal/bashekimlik*') ? 'current' : '' }}"><a href="{{ route('site.administrative.team') }}">Başhekimlik</a></li>
                                        <li class="{{ request()->is('kurumsal/bashekimimizden*') ? 'current' : '' }}"><a href="{{ route('site.chief.physician') }}">Başhekimimizden</a></li>
                                        <li class="{{ request()->is('kurumsal/anlasmali-kurumlar*') ? 'current' : '' }}"><a href="{{ route('site.contracted.institutions') }}">Anlaşmalı Kurumlar</a></li>
                                        <li class="{{ request()->is('kurumsal/kalite-politikasi') ? 'current' : '' }}"><a href="{{ route('site.quality-policy.blade.php') }}">Kalite Yönetim Sistemi</a></li>
                                        <li class="{{ request()->is('kurumsal/saglik-kosesi*') ? 'current' : '' }}"><a href="{{ route('site.health.corner') }}">Sağlık Köşesi</a></li>
                                        <li class="{{ request()->is('kurumsal/haberler-ve-duyurular*') ? 'current' : '' }}"><a href="{{ route('site.news.announcements') }}">Haberler & Duyurular</a></li>
                                        <li class="{{ request()->is('kurumsal/video-galeri*') ? 'current' : '' }}"><a href="{{ route('site.video.gallery') }}">Galeri</a></li>
                                        <li class="{{ request()->is('kurumsal/basinda-biz*') ? 'current' : '' }}"><a href="{{ route('site.in.the.press') }}">Basında Biz</a></li>
                                        {{--<li><a href="{{ route('site.ebebek.health.corner') }}">E-Bebek Sağlık Köşesi</a></li>--}}
                                        <li class="{{ request()->is('kurumsal/saglik-rehberi*') ? 'current' : '' }}"><a href="{{ route('site.health.guide') }}">Sağlık Rehberi</a></li>
                                        <li class="{{ request()->is('kurumsal/refakatci-ve-ziyaretci-politikamiz*') ? 'current' : '' }}"><a href="{{ route('site.companion.visitor.policy') }}">Refakatçi ve Ziyaretçi Politikamız</a></li>
                                        <li class="{{ request()->is('kurumsal/hasta-haklari*') ? 'current' : '' }}"><a href="{{ route('site.patient_right') }}">Hasta Hakları</a></li>
                                        <li class="{{ request()->is('kurumsal/insan-kaynaklari*') ? 'current' : ''  }}">
                                            <a href="{{ route('site.human.resources.career') }}">İnsan Kaynakları</a>
                                        </li>
                                        <li class="{{ request()->is('kurumsal/kvkk') ? 'current' : '' }}"><a href="{{ route('site.kvkk') }}" target="_blank">Kişisel Verilerin Korunma Kanunu</a></li>
                                    </ul>
                                </li>

                                <li class="{{ request()->is('bolum*') ? 'current' : '' }}">
                                    <a href="{{ route('site.departments') }}" style="">TIBBİ BÖLÜMLERİMİZ</a>
                                </li>

                                <li class="{{ request()->is('diger-hizmetler*') ? 'current' : '' }}">
                                    <a href="{{ route('site.oservices') }}">HİZMETLERİMİZ</a>
                                </li>

                                <li class="{{ request()->is('doktor*') ? 'current' : '' }}">
                                    <a href="{{ route('site.doctors') }}">DOKTORLARIMIZ</a>
                                </li>

                                <li class="dropdown">
                                    <span>ONLINE İŞLEMLER</span>
                                    <ul>
                                        <li><a href="{{ route('site.online.appointment.get') }}">Online Randevu</a></li>
                                        {{--<li><a href="{{ route('site.write_us.get') }}">Bize Danışın</a></li>--}}
                                        {{--<li><a href="#">Randevu İptali</a></li>
                                        <li><a href="#">Tahlil Sonuçları</a></li>--}}
                                    </ul>
                                </li>
                                <li class="dropdown {{ request()->is('iletisim*') ? 'current' : '' }}">
                                    <span>İLETİŞİM</span>
                                    <ul>
                                        <li class="{{ request()->is('iletisim/iletisim-bilgileri*') ? 'current' : '' }}"><a href="{{ route('site.contact') }}">İletişim Bilgileri</a></li>
                                        <li class="{{ request()->is('iletisim/nasil-giderim*') ? 'current' : '' }}"><a href="{{ route('site.how_can_i_go') }}">Nasıl Giderim?</a></li>
                                        <li class="{{ request()->is('iletisim/gorus-ve-oneri*') ? 'current' : '' }}"><a href="{{ route('site.write_us.get') }}">Görüş ve Önerileriniz</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <!-- Main Menu End-->

                        <div class="outer-box" style="margin-right: 20px">
                            <button class="search-btn"><span class="fa fa-search"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="auto-container">

                <div class="main-box">
                    <div class="logo-box">
                        <div class="logo"><a href="{{ route('site.homepage') }}"><img src="{{ asset('images/logo.svg') }}" alt="" title="" width="180" height="150"></a></div>
                    </div>

                    <!--Keep This Empty / Menu will come through Javascript-->
                </div>
            </div>
        </div><!-- End Sticky Menu -->

        <!-- Mobile Header -->
        <div class="mobile-header">
            <div class="logo"><a href="{{ route('site.homepage') }}"><img src="{{ asset('images/logo.svg') }}" alt="" title="" width="180" height="150"></a></div>

            <!--Nav Box-->
            <div class="nav-outer clearfix">

                <div class="outer-box">
                    <!-- Search Btn -->
                    <div class="search-box">
                        <button class="search-btn mobile-search-btn"><i class="flaticon-magnifying-glass"></i></button>
                    </div>

                    <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span class="fa fa-bars"></span></a>
                </div>
            </div>
        </div>

        <!-- Mobile Nav -->
        <div id="nav-mobile"></div>
        {{--End Mobile Nav--}}

        <!-- Header Search -->
        <div class="search-popup">
            <span class="search-back-drop"></span>
            <button class="close-search"><span class="fa fa-times"></span></button>

            <div class="search-inner">
                <form method="post" action="{{ route('site.search.post') }}">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <input type="search" name="keyword" value="" placeholder="Ara ..." required="">
                        <button type="submit"><i class="flaticon-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Header Search -->
    </header>
    <!--End Main Header -->
    @yield('content')
    <!-- Clients Section -->
    <section class="clients-section">
        <div class="auto-container">

            <!-- Sponsors Outer -->
            <div class="sponsors-outer">
                <!--clients carousel-->
                <ul class="clients-carousel owl-carousel owl-theme">
                    @forelse($fuses as $fuse)
                        <li class="slide-item"> <a href="{{ route('site.contracted.institutions') }}"><img src="{{ asset('storage/images/fuses/' . $fuse->image) }}" alt="" width="170" height="100"></a> </li>
                    @empty
                        <li class="slide-item" style="color: #1270a2"> Henüz Anlaşmalı Kurum eklenmedi </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </section>
    <!--End Clients Section -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!--Widgets Section-->
        <div class="widgets-section"{{-- style="background-image: url({{ asset('images/logo.svg') }});"--}}>
            <div class="auto-container">
                <div class="row">
                    <!--Big Column-->
                    <div class="big-column col-xl-6 col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <!--Footer Column-->
                            <div class="footer-column col-xl-7 col-lg-6 col-md-6 col-sm-12 @if(!isset($corporate->footer_content)) align-self-center @endif">
                                <div class="footer-widget about-widget">
                                    <div class="logo">
                                        <a href="{{ route('site.homepage') }}"><img src="{{ asset('images/logo-negative.svg') }}" alt="" width="280" height="280" /></a>
                                    </div>
                                    @if(isset($corporate->footer_content))
                                        <div class="text">
                                            {!! $corporate->footer_content !!}
                                        </div>
                                    @endif
                                    <ul class="social-icon-three">
                                        @if(isset($corporate->facebook))
                                            <li><a href="{{ $corporate->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                        @endif

                                        @if(isset($corporate->instagram))
                                            <li><a href="{{ $corporate->instagram }}"><i class="fab fa-instagram"></i></a></li>
                                        @endif

                                        @if(isset($corporate->twitter))
                                            <li><a href="{{ $corporate->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                        @endif

                                        @if(isset($corporate->whatsapp))
                                            <li><a href="{{ $corporate->whatsapp }}"><i class="fab fa-whatsapp"></i></a></li>
                                        @endif

                                        @if(isset($corporate->youtube))
                                            <li><a href="{{ $corporate->youtube }}"><i class="fab fa-youtube"></i></a></li>
                                        @endif

                                        @if(isset($corporate->linkedin))
                                            <li><a href="{{ $corporate->linkedin }}"><i class="fab fa-linkedin-in"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            <!--Footer Column-->
                            <div class="footer-column col-xl-5 col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget">
                                    <h2 class="widget-title">Site Haritası</h2>
                                    <ul class="user-links">
                                        {{--@forelse($deps as $department)
                                            <li><a href="{{ route('site.department.detail', ['slug' => $department->slug]) }}">{{ $department->name }}</a></li>
                                        @empty
                                            <li>Henüz bölüm kaydı yok</li>
                                        @endforelse--}}

                                        <li><a href="{{ route('site.health.corner') }}">Sağlık Köşesi</a></li>
                                        <li><a href="{{ route('site.contracted.institutions') }}">Anlaşmalı Kurumlar</a></li>
                                        <li><a href="{{ route('site.about') }}">Hakkımızda</a></li>
                                        <li><a href="{{ route('site.mission.vision') }}">Misyon & Vizyon</a></li>
                                        {{--<li><a href="{{ route('site.board.of.directors') }}">Yönetim Kurulu</a></li>--}}
                                        {{--<li><a href="{{ route('site.contracted.institutions') }}">Anlaşmalı Kurumlar</a></li>--}}
                                        <li><a href="{{ route('site.departments') }}">Tıbbi Bölümlerimiz</a></li>
                                        <li><a href="{{ route('site.doctors') }}">Doktorlarımız</a></li>
                                        <li><a href="{{ route('site.health.guide') }}">Sağlık Rehberi</a></li>
                                        {{--<li><a href="{{ route('site.patient_right') }}">Hasta Hakları</a></li>--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Big Column-->
                    <div class="big-column col-xl-6 col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <!--Footer Column-->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <!--Footer Column-->
                                <div class="footer-widget recent-posts">
                                    <h2 class="widget-title">Son Haberler</h2>
                                    <!--Footer Column-->
                                    <div class="widget-content">
                                        @forelse($news_annos as $news)
                                            <div class="post">
                                                <div class="thumb"><a href="{{ route('site.news.announcements.show', ['slug' => $news->slug]) }}"><img src="{{ asset('storage/images/news_announcements/' . $news->image) }}" width="370" height="270" alt=""></a></div>
                                                <h4><a href="{{ route('site.news.announcements.show', ['slug' => $news->slug]) }}">{{ \Illuminate\Support\Str::limit($news->title, 30) }}</a></h4>
                                                <span class="date">{{ $news->created_at->format('d/m/Y') }}</span>
                                            </div>
                                        @empty
                                            <div class="post">
                                                <h4><a href="#">Henüz haber kaydı yok</a></h4>
                                            </div>
                                        @endforelse

                                    </div>
                                </div>
                            </div>

                            <!--Footer Column-->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <!--Footer Column-->
                                <div class="footer-widget contact-widget">
                                    <h2 class="widget-title">İletişim</h2>
                                    <!--Footer Column-->
                                    <div class="widget-content">
                                        <ul class="contact-list">
                                            @if(isset($corporate->address))
                                            <li>
                                                <span class="icon flaticon-placeholder"></span>
                                                <div id="address_corporate_master" class="text">{!! $corporate->address !!}</div>
                                            </li>
                                            @endif

                                            @if(isset($corporate->phone))
                                            <li>
                                                <span class="icon flaticon-call-1"></span>
                                                <a href="tel:{{ $corporate->phone }}"><strong>{{ $corporate->phone }}</strong></a>
                                            </li>
                                            @endif

                                            @if(isset($corporate->phone2))
                                                <li>
                                                    <span class="icon flaticon-call-1"></span>
                                                    <a href="tel:{{ $corporate->phone2 }}"><strong>{{ $corporate->phone2 }}</strong></a>
                                                </li>
                                            @endif

                                            @if(isset($corporate->email))
                                            <li>
                                                <span class="icon flaticon-email"></span>
                                                <a href="mailto:{{ $corporate->email }}"><strong>{{ $corporate->email }}</strong></a>
                                            </li>
                                            @endif

                                            <li>
                                                <span class="icon flaticon-back-in-time"></span>
                                                    <strong>7 / 24 Hizmet Vermekteyiz</strong>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Footer Bottom-->
        <div class="footer-bottom">
            <!-- Scroll To Top -->
            <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

            <div class="auto-container">
                <div class="inner-container clearfix">
                    <div class="footer-nav">
                        <ul class="clearfix">
                            @if(isset($corporate->kvkk) and $corporate->kvkk != null and $corporate->kvkk != "")
                                <li><a href="{{ route('site.kvkk') }}" target="_blank">KVKK</a></li>
                            @endif

                            @if(isset($corporate->health_policy) and $corporate->health_policy != null and $corporate->health_policy != "")
                                <li><a href="{{ asset('storage/corporate/' . $corporate->health_policy) }}" target="_blank">Sağlık Politikası</a></li>
                            @endif

                            @if(isset($corporate->international_health_tourism_authorization_certificate) and $corporate->international_health_tourism_authorization_certificate != null and $corporate->international_health_tourism_authorization_certificate != "")
                                    <li><a href="{{ asset('storage/corporate/' . $corporate->international_health_tourism_authorization_certificate) }}" target="_blank">Uluslararası Sağlık Turizmi Yetki Belgesi</a></li>
                            @endif
                        </ul>
                    </div>

                    <div class="copyright-text">
                        <p>Copyright © @if(isset($corporate->year_of_foundation) and $corporate->year_of_foundation != null and $corporate->year_of_foundation != "") {{ $corporate->year_of_foundation }} - @endif {{ date('Y') }} | Tüm Hakları Saklıdır.</p>
                    </div>
                    <div class="copyright-text">
                        <p style="font-size: 12px">
                            Sadece bilgilendirme amaçlıdır. Doktor tavsiyesi yerine kullanılamaz. Bilge Hastanesi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--End Main Footer -->

</div><!-- End Page Wrapper -->

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<!--Revolution Slider-->
<script src="{{ asset('plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
<script src="{{ asset('js/main-slider-script.js') }}"></script>
<!--Revolution Slider-->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('js/mmenu.polyfills.js') }}"></script>
<script src="{{ asset('js/jquery.modal.min.js') }}"></script>
<script src="{{ asset('js/mmenu.js') }}"></script>
<script src="{{ asset('js/appear.js') }}"></script>
<script src="{{ asset('js/mixitup.js') }}"></script>
<script src="{{ asset('js/owl.js') }}"></script>
<script src="{{ asset('js/wow.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

@yield('customJS')
</body>
</html>


