@extends('site.layouts.master')

@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image: url(@if(!isset($banner->image)) {{ asset('images/background/8.jpg') }} @else {{ asset('storage/images/banners/cropped_1920_500/' . $banner->image) }} @endif );">
        <div class="auto-container">
            <div class="title-outer" style="background-color: rgba(255, 255, 255, 0.8)">
                <h1>Görüş ve Önerileriniz</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.homepage') }}">Anasayfa</a></li>
                    <li>Görüş ve Önerileriniz</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- Contact Section -->
    <section class="contact-section" id="contact">
        <div class="small-container">
            <!-- Contact box -->
            <div class="contact-box">
                <!-- Form box -->
                <div class="form-box">
                    <div class="contact-form">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('site.write_us.post') }}" method="post" id="email-form">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <div class="response"></div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="username" placeholder="İsim - Soyisim *" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="email" name="email" class="email" placeholder="E-Posta Adresi *" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="phone" class="username" placeholder="GSM *" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="topic" class="username" placeholder="Konu *" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="message" style="height: 300px!important;" placeholder="Mesaj *" required></textarea>
                                    </div>

                                </div>

                                {{--KVKK Onay--}}
                                <div class="row text-left">
                                    <div class="col-12 ml-5">
                                        <input type="checkbox" name="kvkk_checkbox" id="kvkk_onay" class="form-check-input" required>
                                        <label for="kvkk_onay">
                                            Kişisel Verilere İlişkin Aydınlatma Metnine Ulaşmak için Burayı <a href="{{ route('site.kvkk') }}" target="_blank"> Tıklayınız.<span class="fa fa-external-link-alt"></span></a>  Okudum, Anladım, Kabul Ediyorum
                                        </label>
                                    </div>
                                </div>
                                <br>

                                <div class="form-group col-lg-12 text-center pt-3">
                                    <button class="theme-btn btn-style-one btn-block" type="submit" id="submit" name="submit-form"><span class="btn-title">GÖNDER</span></button>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>

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
            </div>
        </div>
    </section>
    <!--End Contact Section -->
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

    <script>
        $("#email-form").submit(function (e) {
           /*e.preventDefault();*/
           $("#submit").attr("disabled", true);
        });
    </script>
@endsection
