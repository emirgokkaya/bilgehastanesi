@extends('site.layouts.master')

@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image: url(@if(!isset($banner->image)) {{ asset('images/background/8.jpg') }} @else {{ asset('storage/images/banners/cropped_1920_500/' . $banner->image) }} @endif );">
        <div class="auto-container">
            <div class="title-outer" style="background-color: rgba(255, 255, 255, 0.8)">
                <h1>Doktor Detayı</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.homepage') }}">Anasayfa</a></li>
                    <li><a href="{{ route('site.doctors') }}">Doktorlarımız</a></li>
                    <li>{{ $doctor->degree }} {{ $doctor->name }} {{$doctor->lastname}}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    <!-- Doctor Detail Section -->
    <section class="doctor-detail-section">
        <div class="auto-container">
            <div class="row">
                <!-- Content Side -->
                <div class="content-side col-lg-8 col-md-12 col-sm-12 order-2">
                    <div class="docter-detail">
                        <h3 class="name">{{ $doctor->degree }} {{ $doctor->name }} {{ $doctor->lastname }}</h3>
                        @if(count($doctor->departments) != 0)
                            <p>Görevli Olduğu Bölümler</p>
                            @foreach($doctor->departments as $department)
                                @if($loop->last)
                                    <a href="{{ route('site.department.detail', ['slug' => $department->slug]) }}" style="display: inline-block"><span class="designation">{{ $department->name }}</span></a>
                                @else
                                    <a href="{{ route('site.department.detail', ['slug' => $department->slug]) }}" style="display: inline-block"><span class="designation">{{ $department->name }}|</span></a>
                                @endif
                            @endforeach
                        @endif

                        <hr>

                        @if($doctor->date_of_birth or $doctor->foreign_language)
                        <div class="row" style="margin-bottom: 20px!important;">
                            @if($doctor->date_of_birth)
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <strong>Doğum Tarihi</strong>
                                <br>
                                {{ date('Y', strtotime($doctor->date_of_birth)) }}
                            </div>
                            @endif
                            @if($doctor->foreign_language)
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <strong>Yabancı Dil</strong>
                                <br>
                                {!! $doctor->foreign_language !!}
                            </div>
                            @endif
                        </div>
                        <br>
                        @endif

                        <ul class="">
                            @if($doctor->speciality)
                            <li>
                                <strong>Uzmanlık</strong>
                                <p>{!! $doctor->speciality !!}</p>
                            </li>
                            <br>
                            @endif

                            @if($doctor->education)
                            <li>
                                <strong>Eğitim</strong>
                                <p>{!! $doctor->education !!}</p>
                            </li>
                            <br>
                            @endif

                            @if($doctor->certificate)
                                <li>
                                    <strong>Katıldığı Eğitimler ve Aldığı Sertifikalar</strong>
                                    <p>{!! $doctor->certificate !!}</p>
                                </li>
                                <br>
                            @endif

                            @if($doctor->experience)
                            <li>
                                <strong>Deneyim</strong>
                                <p>{!! $doctor->experience !!}</p>
                            </li>
                            <br>
                            @endif
                           {{-- <li>
                                <strong>Timing</strong>
                                <p>Monday - Friday 08:00 - 20:00 <br> Saturday&nbsp; 09:00 - 18:00 <br> Sunday &nbsp; &nbsp; 09:00 - 18:00</p>
                            </li>--}}

                            @if($doctor->website)
                            <li>
                                <strong>Website</strong>
                                <p><a href="{{ $doctor->website }}" target="_blank">{{ $doctor->website }}</a></p>
                            </li>
                            @endif
                        </ul>
                    </div>
                    <br>
                    {{--Üye Olduğu Mesleki Dernekler--}}
                    @if(isset($doctor->biography))
                        <strong>Üye Olduğu Mesleki Dernekler</strong>
                        <div class="text">{!! $doctor->biography !!}</div>
                    @endif
                    {{--End Üye Olduğu Mesleki Dernekler--}}

                    <br>

                    {{--Email Adresi--}}
                    {{--@if($doctor->email)
                        <li>
                            <strong>E-Posta</strong>
                            <p><a href="mailto:{{ $doctor->email }}">{{ $doctor->email }}</a></p>
                        </li>
                    @endif--}}

                    <div class="appointment-form default-form">
                        <div class="sec-title">
                            <h2>Doktora Sorun</h2>
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

                                <input type="text" value="{{ $doctor->degree . ' ' . $doctor->name . ' ' . $doctor->lastanme }}" name="source" hidden="hidden">

                                <div class="form-group col-lg-12 col-md-12">
                                    <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="btn-title">Gönder</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Sidebar Side -->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <div class="sidebar">
                        <!-- Team Block -->
                        <div class="team-block wow fadeInUp">
                            <div class="inner-box">
                                <figure class="image"><img src="{{ asset('storage/images/doctors/cropped_270_500'.'/'.$doctor->profile_photo) }}" alt=""></figure>
                                <ul class="social-links">
                                    @if($doctor->whatsapp)
                                        <li><a href="{{$doctor->whatsapp}}" target="_blank"><span class="fab fa-whatsapp"></span></a></li>
                                    @endif

                                    @if($doctor->facebook)
                                        <li><a href="{{ $doctor->facebook }}" target="_blank"><span class="fab fa-facebook-f"></span></a></li>
                                    @endif

                                    @if($doctor->instagram)
                                        <li><a href="{{ $doctor->instagram }}" target="_blank"><span class="fab fa-instagram"></span></a></li>
                                    @endif

                                    @if($doctor->twitter)
                                        <li><a href="{{ $doctor->twitter }}" target="_blank"><span class="fab fa-twitter"></span></a></li>
                                    @endif

                                    @if($doctor->linkedin)
                                        <li><a href="{{$doctor->linkedin}}" target="_blank"><span class="fab fa-linkedin-in"></span></a></li>
                                    @endif

                                    {{--@if($doctor->website)
                                        <li><a href="{{ $doctor->website }}" target="_blank"><span class="fas fa-link"></span></a></li>
                                    @endif--}}
                                </ul>
                            </div>
                        </div>

                        <!-- Doctor Availability -->
                        <div class="docter-availability">
                            <div class="inner">
                                <div class="sec-title">
                                    <h2 class="text-center">Randevu Saatleri</h2>
                                    <br>
                                    <div class="text-center">
                                        <img src="{{ asset('images/logo.svg') }}" width="200" height="200" alt="">
                                    </div>
                                    {{--<span class="divider"></span>--}}
                                </div>
                                <ul class="timing-list-two">
                                    @forelse($doctor->working_times as $time)
                                        <li>{{$time->day}} <span>@if(!isset($time->start) and !isset($time->finish)) Detaylı Bilgi İçin Arayınız @else @if(isset($time->start)) {{$time->start}} @else Belirtilmedi @endif - @if(isset($time->finish)) {{$time->finish}} @else Belirtilmedi @endif @endif</span></li>
                                    @empty
                                        <li>Henüz bir bilgi paylaşılmadı</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Doctor Detail Section -->

    <!-- Team Section -->
    <section class="team-section">
        <div class="auto-container">
            <div class="row">
                @forelse($otherDoctors as $doctor)
                <!-- Team Block -->
                <div class="team-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-box">
                        <figure class="image"><img src="{{ asset('storage/images/doctors/cropped_270_500'.'/'.$doctor->profile_photo) }}" alt=""></figure>
                        <ul class="social-links">
                            @if($doctor->whatsapp)
                                <li><a href="{{$doctor->whatsapp}}" target="_blank"><span class="fab fa-whatsapp"></span></a></li>
                            @endif

                            @if($doctor->facebook)
                                <li><a href="{{ $doctor->facebook }}" target="_blank"><span class="fab fa-facebook-f"></span></a></li>
                            @endif

                            @if($doctor->instagram)
                                <li><a href="{{ $doctor->instagram }}" target="_blank"><span class="fab fa-instagram"></span></a></li>
                            @endif

                            @if($doctor->twitter)
                                <li><a href="{{ $doctor->twitter }}" target="_blank"><span class="fab fa-twitter"></span></a></li>
                            @endif

                            @if($doctor->linkedin)
                                <li><a href="{{$doctor->linkedin}}" target="_blank"><span class="fab fa-linkedin-in"></span></a></li>
                            @endif

                            {{--@if($doctor->website)
                                <li><a href="{{ $doctor->website }}" target="_blank"><span class="fas fa-link"></span></a></li>
                            @endif--}}
                        </ul>
                        <div class="info-box">
                            <h4 class="name"><a href="{{ route('site.doctor.detail', ['slug' => $doctor->slug]) }}">{{ $doctor->degree }} {{ $doctor->name }} {{ $doctor->lastname }}</a></h4>
                            {{--<span class="designation">Senior Dr. at Delmont</span>--}}
                        </div>
                    </div>
                </div>
                @empty

                @endforelse
            </div>
        </div>
    </section>
    <!-- End Team Section -->
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
