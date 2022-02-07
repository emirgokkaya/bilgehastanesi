@extends('site.layouts.master')

@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image: url(@if(!isset($banner->image)) {{ asset('images/background/8.jpg') }} @else {{ asset('storage/images/banners/cropped_1920_500/' . $banner->image) }} @endif );">
        <div class="auto-container">
            <div class="title-outer" style="background-color: rgba(255, 255, 255, 0.8)">
                <h1>Doktorlarımız</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.homepage') }}">Anasayfa</a></li>
                    <li>Doktorlarımız</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Team Section Two -->
    <section class="team-section-two alternate alternate2">
        <div class="auto-container">

            <form action="{{ route('site.department.doctors') }}" method="GET" class="form-group">
                <div class="row">
                    <div class="col-md-10 col-xs-12">
                        <select name="department" id="" class="form-control">
                            <option value="">Doktor Seçiniz ...</option>
                            @forelse($departments as $department)
                                <option value="{{ $department->slug }}" @if($department_doctor != null && $department->slug === $department_doctor) selected @endif>{{ $department->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="col-md-2 col-xs-12">
                        <button class="btn btn-block" style="background-color: #1270a2!important;color: white!important;" type="submit"><i class="fa fa-search"></i> Ara</button>
                    </div>
                </div>
            </form>

            <div class="row">
                <!-- Team Block -->
                @forelse($doctors as $doctor)
                    <div class="team-block-two col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="{{ route('site.doctor.detail', ['slug' => $doctor->slug]) }}"><img src="{{ asset('storage/images/doctors/cropped_370_470').'/'.$doctor->profile_photo }}" alt=""></a></figure>
                                <ul class="social-links">
                                    @if($doctor->whatsapp)
                                        <li><a href="https://wa.me/{{$doctor->whatsapp}}" target="_blank"><span class="fab fa-whatsapp"></span></a></li>
                                    @endif

                                    @if($doctor->facebook)
                                        <li><a href="https://facebook.com/{{ $doctor->facebook }}" target="_blank"><span class="fab fa-facebook-f"></span></a></li>
                                    @endif

                                    @if($doctor->instagram)
                                        <li><a href="https://instagram.com/{{ $doctor->instagram }}" target="_blank"><span class="fab fa-instagram"></span></a></li>
                                    @endif

                                    @if($doctor->twitter)
                                        <li><a href="https://twitter.com/{{ $doctor->twitter }}" target="_blank"><span class="fab fa-twitter"></span></a></li>
                                    @endif

                                    @if($doctor->linkedin)
                                        <li><a href="https://likedin.com/{{$doctor->linkedin}}" target="_blank"><span class="fab fa-linkedin-in"></span></a></li>
                                    @endif

                                    @if($doctor->website)
                                        <li><a href="{{ $doctor->website }}" target="_blank"><span class="fas fa-link"></span></a></li>
                                    @endif
                                </ul>
                            </div>
                            <div class="info-box">
                                <p class="name" style="font-size: 20px!important;"><a href="{{ route('site.doctor.detail', ['slug' => $doctor->slug]) }}">{{ $doctor->degree }}
                                        <br> {{ $doctor->name }} {{ $doctor->lastname }}</a></p>
                                <br>
                                <span class="designation">
                                    @if(count($doctor->departments) === 0)
                                        Henüz bölüm kaydı yapılmadı
                                    @else
                                        @forelse($doctor->departments as $department)
                                            <ul class="list-group">
                                                <li style="height: 80px!important;">
                                                    <a href="{{ route('site.department.detail', ['slug' => $department->slug]) }}" class="list-group-item list-group-item-action" style="color: #1270a2; font-size: 14px!important;">{{ $department->name }}</a>
                                                </li>
                                            </ul>
                                        @empty
                                        @endforelse
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="team-block-two col-lg-12 col-md-12 col-sm-12 wow fadeInUp text-center">
                        <p style="font-size: 20px" class="p-3 mb-2 bg-secondary text-white">Henüz bir doktor kaydı bulunmamaktadır.</p>
                    </div>
                @endforelse
            </div>

            {{ $doctors->appends(request()->except('page'))->links('site.partials.pagination') }}

	    {{--<div class="sec-bottom-text">Don’t hesitate, contact us for better help and services. <a href="#">Explore all Dr. Team</a></div>--}}
        </div>
    </section>
    <!--End Team Section -->
@endsection
