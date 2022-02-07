@extends('site.layouts.master')

@section('content')
    <!--Page Title-->
    {{--<section class="page-title" style="background-image: url({{ asset('images/background/8.jpg') }});">
        <div class="auto-container">
            <div class="title-outer">
                <h1>E-bebek Sağlık Köşesi</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.homepage') }}">Anasayfa</a></li>
                    <li>E-bebek Sağlık Köşesi</li>
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
                        <div class="images-box">
                            <figure class="image wow fadeIn"><a href="{{ asset('images/resource/service-single.jpg') }}" class="lightbox-image" data-fancybox="services"><img src="{{ asset('images/resource/service-single.jpg') }}" alt=""></a></figure>
                        </div>

                        <div class="content-box">
                            <div class="title-box">
                                <h2>Departments Of Neurology</h2>
                                <span class="theme_color">ResoFus Alomar Treatment for Essential Tremor and Parkinson's Disease</span>
                            </div>
                            <p>Resofus combines MR imaging and focused ultrasound into MR guided Focused Ultrasound technology, and provides a transcranial, non-invasive image-guided personalized treatment modality with no incisions and with no ionizing radiation.</p>
                            <p>This combination of continuous MR imaging and very highly focused acoustic sound waves provides the ability to provide pinpoint precision treatment at the planned target, without causing damage to any of the normal surrounding tissue. This precise local lesioning stops the improper transfer of electrical signals that induce the tremor, and it stops.</p>
                            <!-- Two Column -->
                            <div class="two-column">
                                <div class="row">
                                    <div class="image-column col-xl-6 col-lg-12 col-md-12">
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
                                    </div>
                                </div>
                            </div>

                            <h3>Why Choose This Service</h3>

                            <p>Complete account of the systems and expound the actually teachings of the great explorer of the truth, the master-builder of human uts happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful anyone who loves or pursues.</p>

                            <!--Product Info Tabs-->
                            <div class="product-info-tabs">
                                <!--Product Tabs-->
                                <div class="prod-tabs tabs-box">
                                    <!--Tab Btns-->
                                    <ul class="tab-btns tab-buttons clearfix">
                                        <li data-tab="#prod-details" class="tab-btn active-btn">Precautions</li>
                                        <li data-tab="#prod-spec" class="tab-btn">Intelligence</li>
                                        <li data-tab="#prod-reviews" class="tab-btn">Specializations</li>
                                    </ul>

                                    <!--Tabs Container-->
                                    <div class="tabs-content">

                                        <!--Tab / Active Tab-->
                                        <div class="tab active-tab" id="prod-details">
                                            <div class="content">
                                                <p>Suspendisse laoreet at nulla id auctor. Maecenas in dui cursus, lacinia nisl non, blandit lorem. Aliquam vel risus hendrerit, faucibus nisl a, porta sapien. Etiam iaculis mattis quam, nec iaculis velit feugiat quis. Pellentesque sed feugiat dui, ac euismod leo.</p>
                                            </div>
                                        </div>

                                        <!--Tab -->
                                        <div class="tab" id="prod-spec">
                                            <div class="content">
                                                <p>Suspendisse laoreet at nulla id auctor. Maecenas in dui cursus, lacinia nisl non, blandit lorem. Aliquam vel risus hendrerit, faucibus nisl a, porta sapien. Etiam iaculis mattis quam, nec iaculis velit feugiat quis. Pellentesque sed feugiat dui, ac euismod leo.</p>
                                            </div>
                                        </div>

                                        <!--Tab-->
                                        <div class="tab" id="prod-reviews">
                                            <div class="content">
                                                <p>Suspendisse laoreet at nulla id auctor. Maecenas in dui cursus, lacinia nisl non, blandit lorem. Aliquam vel risus hendrerit, faucibus nisl a, porta sapien. Etiam iaculis mattis quam, nec iaculis velit feugiat quis. Pellentesque sed feugiat dui, ac euismod leo.</p>
                                            </div>
                                        </div>
                                    </div>
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
