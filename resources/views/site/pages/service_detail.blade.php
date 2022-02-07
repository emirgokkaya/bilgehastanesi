@extends('site.layouts.master')

@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image: url(@if(!isset($banner->image)) {{ asset('images/background/8.jpg') }} @else {{ asset('storage/images/banners/cropped_1920_500/' . $banner->image) }} @endif );">
        <div class="auto-container">
            <div class="title-outer" style="background-color: rgba(255, 255, 255, 0.8)">
                <h1>Bölüm Hizmetlerimiz</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.homepage') }}">Anasayfa</a></li>
                    <li><a href="{{ route('site.services') }}">Bölüm Hizmetlerimiz</a></li>
                    <li>{{ $service->name }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side / Our Blog-->
                <div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12 order-2">
                    <div class="service-detail">
                        <div class="images-box">
                            <figure class="image wow fadeIn"><a href="{{ asset('storage/images/services/' . $service->image) }}" class="lightbox-image" data-fancybox="services"><img src="{{ asset('storage/images/services/' . $service->image) }}" style="width: 770px!important;height: 500px!important;" alt=""></a></figure>
                        </div>

                        <div class="content-box">
                            <div class="title-box">
                                <h2>{{ $service->name }}</h2>
                                <hr>
                            </div>
                        {!! $service->description !!}

                            @if(count($service->summaries) > 0)

                                <div class="accordion" id="accordionExample">
                                    @forelse($service->summaries as $summary)
                                        <div class="card">
                                            <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapse{{$summary->id}}" aria-expanded="true" aria-controls="collapseOne">

                                                <div class="card-header" id="headingOne{{$summary->id}}">
                                                    <b style="color: #1270a2!important;">{{ $summary->title }}</b>
                                                </div>
                                            </button>


                                            <div id="collapse{{$summary->id}}" class="collapse" aria-labelledby="heading{{$summary->id}}" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    {!! $summary->description !!}
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        Henüz Bir İçerik Mevcut Değil
                                    @endforelse
                                </div>



                                {{-- <div class="row">
                                     <div class="column col-lg-12 col-md-12 col-sm-12">
                                         <!--Accordian Box-->
                                         <ul class="accordion-box">
                                             @forelse($department->summaries as $summary)
                                                 <li class="accordion block">
                                                     <div class="acc-btn">{{ $summary->title }} <span class="icon fa fa-chevron-down"></span></div>
                                                     <div class="acc-content">
                                                         <div class="content">
                                                             <p>{!! $summary->description !!}</p>
                                                         </div>
                                                     </div>
                                                 </li>
                                             @empty
                                                 <li class="text-center"> Henüz İçerik Girilmedi </li>
                                             @endforelse
                                             <!--Block-->
                                         </ul>
                                     </div>
                                 </div>--}}
                                {{--<!--Product Info Tabs-->
                                <div class="product-info-tabs">
                                    <!--Product Tabs-->
                                    <div class="prod-tabs tabs-box">
                                        <!--Tab Btns-->
                                        <ul class="tab-btns tab-buttons clearfix">
                                            @forelse($department->summaries as $summary)
                                                <li data-tab="#prod-{{$summary->id}}" class="tab-btn @if($loop->first) active-btn @endif">{{ $summary->title }}</li>
                                            @empty
                                            @endforelse
                                        </ul>

                                        <!--Tabs Container-->
                                        <div class="tabs-content">

                                            @forelse($department->summaries as $summary)
                                            <!--Tab / Active Tab-->
                                            <div class="tab @if($loop->first) active-tab @endif" id="prod-{{ $summary->id }}">
                                                <div class="content">
                                                    <p>{!! $summary->description !!}</p>
                                                </div>
                                            </div>
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                </div>--}}
                            @endif
                        </div>


                    </div>

                </div>

                <!--Sidebar Side-->
                <div class="sidebar-side col-xl-3 col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar services-sidebar">

                    @if(count($doctors) > 0)
                        <!-- Category Widget -->
                            <div class="sidebar-widget categories">
                                <div class="widget-content">
                                    <!-- Services Category -->
                                    <ul class="services-categories">
                                        <h5>Bölüm Doktorlarımız</h5>
                                        <br>
                                        @forelse($doctors as $doctor)
                                            <li><a href="{{ route('site.doctor.detail', ['slug' => $doctor->slug]) }}">{{ $doctor->degree }} {{ $doctor->name }} {{ $doctor->lastname }}</a></li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                    @endif

                    @if(count($service->departments) > 0)
                        <!-- Category Widget -->
                            <div class="sidebar-widget categories">
                                <div class="widget-content">
                                    <!-- Services Category -->
                                    <ul class="services-categories">
                                        <h5>İlgili Bölümlerimiz</h5>
                                        <br>
                                        @forelse($service->departments as $department)
                                            <li><a href="{{ route('site.department.detail', ['slug' => $department->slug]) }}">{{ $department->name }}</a></li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        @endif


 		@if(count($related_services) > 0)
                        <!-- Category Widget -->
                            <div class="sidebar-widget categories">
                                <div class="widget-content">
                                    <!-- Services Category -->
                                    <ul class="services-categories">
                                        <h5>İlgili Hizmetlerimiz</h5>
                                        <br>
                                        @forelse($related_services as $service)
                                            <li><a href="{{ route('site.service.detail', ['slug' => $service->slug]) }}">{{ $service->name }}</a></li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        @endif

                    </aside>
                </div>
            </div>
        @if(count($otherServices) > 0)
            <!-- Services Section -->
                <section class="services-section-two">
                    <div class="auto-container">
                        <div class="carousel-outer">
                            <!-- Services Carousel -->
                            <h3 class="text-center">Diğer Hizmetlerimiz</h3>
                            <div class="services-carousel owl-carousel owl-theme default-dots">
                            @forelse($otherServices as $services)
                                <!-- service Block -->
                                    <div class="service-block-two">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image"><a href="{{ route('site.service.detail', ['slug' => $services->slug]) }}"><img src="{{ asset('storage/images/services/' . $services->image) }}" style="width: 370px!important;height: 270px!important;" alt=""></a></figure>
                                            </div>
                                            <div class="lower-content">
                                                <div class="title-box">
                                                    {{--<span class="icon flaticon-heart-2"></span>--}}
                                                    <h4><a href="{{ route('site.service.detail', ['slug' => $services->slug]) }}">{{ $services->name }}</a></h4>
                                                </div>
                                                {{--<span class="icon-right flaticon-heart-2"></span>--}}
                                            </div>
                                        </div>
                                    </div>
                                @empty

                                @endforelse

                            </div>
                        </div>
                    </div>
                </section>
        @endif
        <!-- End service Section -->

            <div class="appointment-form mt-5 default-form">
                <div class="sec-title">
                    <span class="sub-title">Online Randevu</span>
                    <h2>Randevu Al</h2>
                    <span class="divider"></span>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!--Comment Form-->
                <form action="{{ route('site.appointment.mail') }}" method="post" id="email-form">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-12">
                            <input type="text" name="name" placeholder="İsim - Soyisim *" required>
                        </div>

                        <div class="form-group col-lg-6 col-md-12">
                            <input type="text" name="phone" placeholder="GSM *" required>
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <input type="email" name="email" placeholder="E-Posta Adresi *" required>
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <textarea name="message" placeholder="Sormak istediğiniz konu hakkında bahsedin *" required></textarea>
                        </div>

                        <div class="form-group col-lg-12 col-md-12 ml-4">
                            <input type="checkbox" name="kvkk_checkbox" id="kvkk_onay" class="form-check-input" required>
                            <label for="kvkk_onay">Kişisel Verilere İlişkin Aydınlatma Metnine Ulaşmak için <a href="{{ route('site.kvkk') }}" target="_blank">Burayı Tıklayınız. <span class="fa fa-external-link-alt"></span></a> Okudum, Anladım, Kabul Ediyorum
                            </label>
                        </div>

                        <input type="text" value="{{ $service->name }}" name="source" hidden="hidden">

                        <div class="form-group col-lg-12 col-md-12">
                            <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="btn-title">Gönder</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Sidebar Page Container -->


@endsection

@section('customJS')
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <link href="{{ asset('plugins/toastr/toastr.min.css') }}" rel="stylesheet" />
    <script>
        @if (\Illuminate\Support\Facades\Session::has('message'))
        toastr.{{ \Illuminate\Support\Facades\Session::get("status") }}("{{ \Illuminate\Support\Facades\Session::get('message') }}")
        @endif

        @if ($errors->any())
            @foreach($errors->all() as $error)
                toastr.error('{{$error}}')
            @endforeach
        @endif
    </script>
@endsection
