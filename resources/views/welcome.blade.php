
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bilge Hastanesi | Çok Yakında</title>
    <!-- Stylesheets -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <!--Color Themes-->
    <link id="theme-color-file" href="{{ asset('css/color-themes/default-theme.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('images/logo.svg') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/logo.svg') }}" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    {{--<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->--}}
    <!--[if lt IE 9]><script src="{{ asset('js/respond.js') }}"></script><![endif]-->
    <style id="clock-animations"></style>
</head>

<body class="hidden-bar-wrapper">

<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Coming Soon -->
    <section class="coming-soon" style="background-image: url({{ asset('images/background/9.jpg') }});">
        <div class="">
            <div class="row">
                <div class="content-column col-lg-7 offset-6 col-md-12 order-2">
                    <div class="content">
                        <div class="content-inner">
                            <div class="logo"><img src="{{ asset('images/logo.svg') }}" width="250" alt="" /></div>
                            <h2>Çok Yakında</h2>
                            <h4>Site henüz bakım aşamasında !</h4>
                            <div class="time-counter">
                                <!-- Time Countdown -->
                                {{--<div class="time-countdown clearfix" data-countdown="2021/11/1"></div>--}}
                            </div>

                            <!--Emailed Form-->
                            <div class="emailed-form">
                                <div class="text">Sağlıklı Günler Dileriz ...</div>
                            </div>
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
                <div class="image-column col-lg-5 col-md-12">
                    <div class="bg-shape"></div>
                    <figure class="image"><img src="{{ asset('images/host.jpg') }}" alt=""></figure>
                </div>
            </div>
        </div>
    </section>
    <!-- End Coming Soon -->

</div>
<!--End pagewrapper-->


<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>


<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.countdown.js') }}"></script>
<script src="{{ asset('js/wow.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
