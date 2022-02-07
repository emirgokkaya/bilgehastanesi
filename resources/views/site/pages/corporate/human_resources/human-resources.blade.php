@extends('site.layouts.master')

@section('content')
    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side / Our Blog-->
                <!--Product Info Tabs-->
                <div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12 order-2">
                    <div class="service-detail">
                        <div class="content-box">
                            <div class="two-column">
                                <div class="row">
                                    <!-- Tabs -->
                                    <div class="column col-12">
                                        <div class="default-tabs tabs-box">
                                            <!--Tabs Box-->
                                            <ul class="tab-buttons clearfix">
                                                <li class="tab-btn active-btn" data-tab="#tab2">İş Başvurusu</li>
                                                <li class="tab-btn" data-tab="#tab1">Kariyer</li>
                                            </ul>

                                            <div class="tabs-content">
                                                <!--Tab-->
                                                <div class="tab" id="tab1">
                                                    <div class="row">
                                                        <!--Content Side / Our Blog-->
                                                        <div class="content-side col-xl-12 col-lg-12 col-md-12 col-sm-12 order-2">
                                                            @if(isset($career))
                                                                <div class="service-detail">
                                                                    <div class="images-box">
                                                                        <figure class="image wow fadeIn">
                                                                            <a href="{{ asset('storage/images/corporate/human_resource/career/' . $career->image) }}" class="lightbox-image" data-fancybox="services">
                                                                                <img src="{{ asset('storage/images/corporate/human_resource/career/' . $career->image) }}" style="width: 770px!important;height: 500px!important;" alt="">
                                                                            </a>
                                                                        </figure>
                                                                    </div>

                                                                    <div class="content-box">
                                                                        <div class="title-box">
                                                                            <h2 class="text-center">{{ $career->title }}</h2>
                                                                        </div>
                                                                        {!! $career->content !!}
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="service-detail text-center">
                                                                    <div class="content-box">
                                                                        <p>Henüz içerik kaydı mevcut değil</p>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--Tab-->
                                                <div class="tab active-tab" id="tab2">
                                                    <div class="row">
                                                        <!--Content Side / Our Blog-->
                                                        <div class="content-side col-xl-12 col-lg-12 col-md-12 col-sm-12 order-2">
                                                            <div class="service-detail">
                                                                <div class="images-box text-center">
                                                                    <h3>Bizimle Çalışmak İster Misiniz ?</h3>
                                                                    <br>

                                                                    @if ($errors->any())
                                                                        <div class="alert alert-danger">
                                                                            <ul>
                                                                                @foreach ($errors->all() as $error)
                                                                                    <li>{{ $error }}</li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    @endif

                                                                    <form action="{{ route('site.human.resources.job.application.post') }}" id="email-form" method="POST" class="form-group" enctype="multipart/form-data">
                                                                        @csrf
                                                                        {{--Başvuru Bilgileri--}}
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                Başvuru Bilgileri
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="row text-left">
                                                                                    <div class="col-4">
                                                                                        <label>* Başvurmak İstediğiniz Pozisyon</label>
                                                                                    </div>
                                                                                    <div class="col-8">
                                                                                        <input type="text" class="form-control" name="is_adi" required>
                                                                                    </div>
                                                                                </div>
                                                                                <br>

                                                                                <div class="row text-left">
                                                                                    <div class="col-4">
                                                                                        <label>* Daha önce hastanede çalıştınız mı?</label>
                                                                                    </div>
                                                                                    <div class="col-8">
                                                                                        <input class="form-check-input" type="radio" name="daha_once" id="worked_us_yes" value="Evet"  required>
                                                                                        <label class="form-check-label mr-5" for="worked_us_yes">
                                                                                            Evet
                                                                                        </label>

                                                                                        <input class="form-check-input" type="radio" name="daha_once" id="worked_us_no" value="Hayır"  required>
                                                                                        <label class="form-check-label" for="worked_us_no">
                                                                                            Hayır
                                                                                        </label>
                                                                                    </div>
                                                                                </div>


                                                                                <div class="row text-left">
                                                                                    <div class="col-4">
                                                                                        <label>*Şu anda mevcut durumunuz?</label>
                                                                                    </div>
                                                                                    <div class="col-8">
                                                                                        <input class="form-check-input" type="radio" name="is_durumu" id="state_working" value="Çalışıyor"  required>
                                                                                        <label class="form-check-label mr-5" for="state_working">
                                                                                            Çalışıyor
                                                                                        </label>

                                                                                        <input class="form-check-input" type="radio" name="is_durumu" id="state_not_working" value="Çalışmıyor"  required>
                                                                                        <label class="form-check-label mr-5" for="state_not_working">
                                                                                            Çalışmıyor
                                                                                        </label>

                                                                                        <input class="form-check-input" type="radio" name="is_durumu" id="state_retired" value="Emekli"  required>
                                                                                        <label class="form-check-label" for="state_retired">
                                                                                            Emekli
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                            </div>
                                                                        </div>
                                                                        <br>

                                                                        {{--Kişisel Bilgiler--}}
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                Kişisel Bilgiler
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="row text-left">
                                                                                    <div class="col-4">
                                                                                        <label>* Adı Soyadı</label>
                                                                                    </div>
                                                                                    <div class="col-8">
                                                                                        <input type="text" class="form-control" name="ad_soyad" required>
                                                                                    </div>
                                                                                </div>
                                                                                <br>

                                                                                <div class="row text-left">
                                                                                    <div class="col-4">
                                                                                        <label>* Doğum Yeri ve Tarihi</label>
                                                                                    </div>
                                                                                    <div class="col-4">
                                                                                        <input class="form-control" type="text" name="dogum_yeri" required>
                                                                                    </div>
                                                                                    <div class="col-4">
                                                                                        <input class="form-control" type="date" name="dogum_tarihi" required>
                                                                                    </div>
                                                                                </div>
                                                                                <br>

                                                                                <div class="row text-left">
                                                                                    <div class="col-4">
                                                                                        <label>* Cinsiyet</label>
                                                                                    </div>
                                                                                    <div class="col-8">
                                                                                        <input class="form-check-input" type="radio" name="cinsiyet" id="gender_woman" value="Kadın" required>
                                                                                        <label class="form-check-label mr-5" for="gender_woman">
                                                                                            Kadın
                                                                                        </label>

                                                                                        <input class="form-check-input" type="radio" name="cinsiyet" id="gender_man" value="Erkek" required>
                                                                                        <label class="form-check-label mr-5" for="gender_man">
                                                                                            Erkek
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <br>

                                                                                <div class="row text-left">
                                                                                    <div class="col-4">
                                                                                        <label>* Uyruk</label>
                                                                                    </div>
                                                                                    <div class="col-8">
                                                                                        <input class="form-check-input" type="radio" name="uyruk" id="nationality_tc" value="TC" required>
                                                                                        <label class="form-check-label mr-5" for="nationality_tc">
                                                                                            TC
                                                                                        </label>

                                                                                        <input class="form-check-input" type="radio" name="uyruk" id="nationality_other" value="Diğer" required>
                                                                                        <label class="form-check-label mr-5" for="nationality_other">
                                                                                            Diğer
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <br>

                                                                                <div class="row text-left">
                                                                                    <div class="col-4">
                                                                                        <label>* Medeni Durum</label>
                                                                                    </div>
                                                                                    <div class="col-8">
                                                                                        <input class="form-check-input" type="radio" name="iliski_durumu" id="marital_status_married" value="Evli" required>
                                                                                        <label class="form-check-label mr-5" for="marital_status_married">
                                                                                            Evli
                                                                                        </label>

                                                                                        <input class="form-check-input" type="radio" name="iliski_durumu" id="marital_status_single" value="Bekar" required>
                                                                                        <label class="form-check-label mr-5" for="marital_status_single">
                                                                                            Bekar
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                            </div>
                                                                        </div>
                                                                        <br>

                                                                        {{--İletişim Bilgileri--}}
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                İletişim Bilgileri
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="row text-left">
                                                                                    <div class="col-4">
                                                                                        <label>* Ev Adresi</label>
                                                                                    </div>
                                                                                    <div class="col-8">
                                                                                        <textarea class="form-control" name="ev_adresi" id="" cols="30" rows="10" required></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <br>

                                                                                <div class="row text-left">
                                                                                    <div class="col-4">
                                                                                        <label>* Cep Telefonu</label>
                                                                                    </div>
                                                                                    <div class="col-8">
                                                                                        <input pattern='/^(?:(?:\+90|0090|0)[ ]?)?(?:(?<ac>21[26]|22[2468]|23[26]|24[268]|25[268]|26[246]|27[246]|28[2468]|31[28]|32[2468]|33[28]|34[2468]|35[2468]|36[2468]|37[02468]|38[02468]|392|41[246]|42[2468]|43[2468]|44[26]|45[2468]|46[246]47[2468]|48[2468]|50[1567]|51[02]|52[27]|5[34]\d|55[1234569]|56[124]|59[246]|800|811|822|850|8[89]8|900)|\((?P<ac>\g<ac>)\))[ -]*(?<sn1>\d{3})[ -]*(?<sn2>\d{2})[ -]*(?<sn3>\d{2})$/J' class="form-control" type="text" name="telefon1" required>
                                                                                    </div>
                                                                                </div>
                                                                                <br>

                                                                                <div class="row text-left">
                                                                                    <div class="col-4">
                                                                                        <label>İkinci Telefon</label>
                                                                                    </div>
                                                                                    <div class="col-8">
                                                                                        <input pattern='/^(?:(?:\+90|0090|0)[ ]?)?(?:(?<ac>21[26]|22[2468]|23[26]|24[268]|25[268]|26[246]|27[246]|28[2468]|31[28]|32[2468]|33[28]|34[2468]|35[2468]|36[2468]|37[02468]|38[02468]|392|41[246]|42[2468]|43[2468]|44[26]|45[2468]|46[246]47[2468]|48[2468]|50[1567]|51[02]|52[27]|5[34]\d|55[1234569]|56[124]|59[246]|800|811|822|850|8[89]8|900)|\((?P<ac>\g<ac>)\))[ -]*(?<sn1>\d{3})[ -]*(?<sn2>\d{2})[ -]*(?<sn3>\d{2})$/J' class="form-control" type="text" name="telefon2">
                                                                                    </div>
                                                                                </div>
                                                                                <br>

                                                                                <div class="row text-left">
                                                                                    <div class="col-4">
                                                                                        <label>* E-Posta Adresi</label>
                                                                                    </div>
                                                                                    <div class="col-8">
                                                                                        <input class="form-control" type="email" name="eposta" required>
                                                                                    </div>
                                                                                </div>
                                                                                <br>



                                                                            </div>
                                                                        </div>
                                                                        <br>


                                                                        {{-- CV Ekle --}}
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                Özgeçmiş Ekle (*)
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="row text-left">
                                                                                    <div class="col-12">
                                                                                        <input type="file" accept=".pdf" name="cv" id="customFile" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>

                                                                        {{-- --}}{{--Tamamlayıcı Bilgiler--}}{{--
                                                                         <div class="card">
                                                                             <div class="card-header">
                                                                                 Tamamlayıcı Bilgiler
                                                                             </div>
                                                                             <div class="card-body">
                                                                                 <div class="row text-left">
                                                                                     <div class="col-4">
                                                                                         <label>* Sürücü ehliyetiniz var mı ?</label>
                                                                                     </div>
                                                                                     <div class="col-8">
                                                                                         <input class="form-check-input" type="radio" name="surucu_belgesi" id="driving_license_yes" value="Evet" required>
                                                                                         <label class="form-check-label mr-5" for="driving_license_yes">
                                                                                             Evet
                                                                                         </label>

                                                                                         <input class="form-check-input" type="radio" name="surucu_belgesi" id="driving_license_no" value="Hayır" required>
                                                                                         <label class="form-check-label mr-5" for="driving_license_no">
                                                                                             Hayır
                                                                                         </label>
                                                                                     </div>
                                                                                 </div>
                                                                                 <br>

                                                                                 <div class="row text-left">
                                                                                     <div class="col-4">
                                                                                         <label>* Herhangi bir sağlık probleminiz var mı?</label>
                                                                                     </div>
                                                                                     <div class="col-8">
                                                                                         <input class="form-check-input" type="radio" name="hastalik" id="ill_yes" value="Evet" required>
                                                                                         <label class="form-check-label mr-5" for="ill_yes">
                                                                                             Evet
                                                                                         </label>

                                                                                         <input class="form-check-input" type="radio" name="hastalik" id="ill_no" value="Hayır" required>
                                                                                         <label class="form-check-label mr-5" for="ill_no">
                                                                                             Hayır
                                                                                         </label>
                                                                                     </div>
                                                                                 </div>
                                                                                 <br>

                                                                                 <div class="row text-left">
                                                                                     <div class="col-4">
                                                                                         <label>* Adli sicil kaydınız var mı ?</label>
                                                                                     </div>
                                                                                     <div class="col-8">
                                                                                         <input class="form-check-input" type="radio" name="adli_sicil" id="criminal_record_yes" value="Evet" required>
                                                                                         <label class="form-check-label mr-5" for="criminal_record_yes">
                                                                                             Evet
                                                                                         </label>

                                                                                         <input class="form-check-input" type="radio" name="adli_sicil" id="criminal_record_no" value="Hayır" required>
                                                                                         <label class="form-check-label mr-5" for="criminal_record_no">
                                                                                             Hayır
                                                                                         </label>
                                                                                     </div>
                                                                                 </div>
                                                                                 <br>

                                                                                 <div class="row text-left">
                                                                                     <div class="col-4">
                                                                                         <label>* Vardiyalı çalışabilir misiniz?</label>
                                                                                     </div>
                                                                                     <div class="col-8">
                                                                                         <input class="form-check-input" type="radio" name="vardiya" id="shift_yes" value="Evet" required>
                                                                                         <label class="form-check-label mr-5" for="shift_yes">
                                                                                             Evet
                                                                                         </label>

                                                                                         <input class="form-check-input" type="radio" name="vardiya" id="shift_no" value="Hayır" required>
                                                                                         <label class="form-check-label mr-5" for="shift_no">
                                                                                             Hayır
                                                                                         </label>
                                                                                     </div>
                                                                                 </div>
                                                                                 <br>

                                                                                 <div class="row text-left">
                                                                                     <div class="col-4 input-group input-group-sm">
                                                                                         <label>* Sigara kullanıyor musunuz ?</label>
                                                                                     </div>
                                                                                     <div class="col-8">
                                                                                         <input class="form-check-input" type="radio" name="sigara" id="smoke_yes" value="Evet" required>
                                                                                         <label class="form-check-label mr-5" for="smoke_yes">
                                                                                             Evet
                                                                                         </label>

                                                                                         <input class="form-check-input" type="radio" name="sigara" id="smoke_no" value="Hayır" required>
                                                                                         <label class="form-check-label mr-5" for="smoke_no">
                                                                                             Hayır
                                                                                         </label>
                                                                                     </div>
                                                                                 </div>
                                                                                 <br>

                                                                                 <div class="row text-left">
                                                                                     <div class="col-4">
                                                                                         <label>* Ücret beklentiniz nedir ?</label>
                                                                                     </div>
                                                                                     <div class="col-8">
                                                                                         <div class="row">
                                                                                             <div class="col-5 input-group input-group-sm">
                                                                                                 <input class="form-control" type="number" step="500" name="maas_min" id="salary_min" required>
                                                                                             </div>
                                                                                             <div class="col-2 text-center">/</div>
                                                                                             <div class="col-5 input-group input-group-sm">
                                                                                                 <input class="form-control" type="number" step="500" name="maas_max" id="salary_max" required>
                                                                                             </div>
                                                                                         </div>
                                                                                     </div>
                                                                                 </div>
                                                                                 <br>
                                                                             </div>
                                                                         </div>
                                                                         <br>--}}

                                                                        {{--Eğitim Bilgileri--}}{{--
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                Eğitim Bilgileri
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="row text-left">
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        Okul Adı
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        Bölüm
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        Mezuniyet Yılı
                                                                                    </div>
                                                                                </div>

                                                                                <br>

                                                                                <div class="row text-left">
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        Lise
                                                                                    </div>

                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="lise_ad">
                                                                                    </div>

                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="lise_bolum">
                                                                                    </div>

                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="lise_mezuniyet">
                                                                                    </div>
                                                                                </div>

                                                                                <br>

                                                                                <div class="row text-left">
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        Yüksekokul
                                                                                    </div>

                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="yuksekokul_ad">
                                                                                    </div>

                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="yuksekokul_bolum">
                                                                                    </div>

                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="yuksekokul_mezuniyet">
                                                                                    </div>
                                                                                </div>

                                                                                <br>

                                                                                <div class="row text-left">
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        Üniversite
                                                                                    </div>

                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="universite_ad">
                                                                                    </div>

                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="universite_bolum">
                                                                                    </div>

                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="universite_mezuniyet">
                                                                                    </div>
                                                                                </div>

                                                                                <br>

                                                                                <div class="row text-left">
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        Yüksek lisans
                                                                                    </div>

                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="yukseklisans_ad">
                                                                                    </div>

                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="yukseklisans_bolum">
                                                                                    </div>

                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="yukseklisans_mezuniyet">
                                                                                    </div>
                                                                                </div>

                                                                                <br>

                                                                                <div class="row text-left">
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        Diğer
                                                                                    </div>

                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="diger_ad">
                                                                                    </div>

                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="diger_bolum">
                                                                                    </div>

                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="diger_mezuniyet">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>

                                                                        --}}{{--İş ve Staj Tecrübeleri--}}{{--
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                İş ve Staj Tecrübeleri
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="row text-left">
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        Şirket Adı
                                                                                    </div>
                                                                                    <div class="col-2 input-group input-group-sm">
                                                                                        Departman ve Ünvan
                                                                                    </div>
                                                                                    <div class="col-2 input-group input-group-sm">
                                                                                        Başlangıç Tarihi
                                                                                    </div>
                                                                                    <div class="col-2 input-group input-group-sm">
                                                                                        Ayrılma Tarihi
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        Ayrılma Nedeni
                                                                                    </div>
                                                                                </div>

                                                                                <br>

                                                                                <div class="row text-left">
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" name="sirket1_ad" class="form-control">
                                                                                    </div>
                                                                                    <div class="col-2 input-group input-group-sm">
                                                                                        <input type="text" name="sirket1_bolum" class="form-control">
                                                                                    </div>
                                                                                    <div class="col-2 input-group input-group-sm">
                                                                                        <input type="date" name="sirket1_baslangic" class="form-control">
                                                                                    </div>
                                                                                    <div class="col-2 input-group input-group-sm">
                                                                                        <input type="date" name="sirket1_cikis" class="form-control">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" name="sirket1_neden" class="form-control">
                                                                                    </div>
                                                                                </div>

                                                                                <br>

                                                                                <div class="row text-left">
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" name="sirket2_ad" class="form-control">
                                                                                    </div>
                                                                                    <div class="col-2 input-group input-group-sm">
                                                                                        <input type="text" name="sirket2_bolum" class="form-control">
                                                                                    </div>
                                                                                    <div class="col-2 input-group input-group-sm">
                                                                                        <input type="date" name="sirket2_baslangic" class="form-control">
                                                                                    </div>
                                                                                    <div class="col-2 input-group input-group-sm">
                                                                                        <input type="date" name="sirket2_cikis" class="form-control">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" name="sirket2_neden" class="form-control">
                                                                                    </div>
                                                                                </div>

                                                                                <br>

                                                                                <div class="row text-left">
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" name="sirket3_ad" class="form-control">
                                                                                    </div>
                                                                                    <div class="col-2 input-group input-group-sm">
                                                                                        <input type="text" name="sirket3_bolum" class="form-control">
                                                                                    </div>
                                                                                    <div class="col-2 input-group input-group-sm">
                                                                                        <input type="date" name="sirket3_baslangic" class="form-control">
                                                                                    </div>
                                                                                    <div class="col-2 input-group input-group-sm">
                                                                                        <input type="date" name="sirket3_cikis" class="form-control">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" name="sirket3_neden" class="form-control">
                                                                                    </div>
                                                                                </div>

                                                                                <br>

                                                                                <div class="row text-left">
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" name="sirket4_ad" class="form-control">
                                                                                    </div>
                                                                                    <div class="col-2 input-group input-group-sm">
                                                                                        <input type="text" name="sirket4_bolum" class="form-control">
                                                                                    </div>
                                                                                    <div class="col-2 input-group input-group-sm">
                                                                                        <input type="date" name="sirket4_baslangic" class="form-control">
                                                                                    </div>
                                                                                    <div class="col-2 input-group input-group-sm">
                                                                                        <input type="date" name="sirket4_cikis" class="form-control">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" name="sirket4_neden" class="form-control">
                                                                                    </div>
                                                                                </div>

                                                                                <br>

                                                                                <div class="row text-left">
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" name="sirket5_ad" class="form-control">
                                                                                    </div>
                                                                                    <div class="col-2 input-group input-group-sm">
                                                                                        <input type="text" name="sirket5_bolum" class="form-control">
                                                                                    </div>
                                                                                    <div class="col-2 input-group input-group-sm">
                                                                                        <input type="date" name="sirket5_baslangic" class="form-control">
                                                                                    </div>
                                                                                    <div class="col-2 input-group input-group-sm">
                                                                                        <input type="date" name="sirket5_cikis" class="form-control">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" name="sirket5_neden" class="form-control">
                                                                                    </div>
                                                                                </div>

                                                                                <br>

                                                                                <div class="row text-left">
                                                                                    <div class="col-4">
                                                                                        <label>
                                                                                            En son aldığınız ücret nedir ?
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="input-group input-group-sm col-8">
                                                                                        <input type="number" name="son_aldigi_ucret" class="form-control">
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <br>

                                                                        --}}{{--Yabancı Dil Bilgisi--}}{{--
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                Yabancı Dil Bilgisi
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-3">
                                                                                        Yabancı Dil
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        Okuma Seviye
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        Yazma Seviye
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        Konuşma Seviye
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="dil1_ad">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="dil1_okuma">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="dil1_yazma">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="dil1_konusma">
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                                <div class="row">
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="dil2_ad">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="dil2_okuma">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="dil2_yazma">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="dil2_konusma">
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                                <div class="row">
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="dil3_ad">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="dil3_okuma">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="dil3_yazma">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="dil3_konusma">
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                                <div class="row">
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="dil4_ad">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="dil4_okuma">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="dil4_yazma">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="dil4_konusma">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>

                                                                        --}}{{--Bilgisayar Bilgisi--}}{{--
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                Bilgisayar Bilgisi
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-3">
                                                                                        Program Adı
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        İyi
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        Orta
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        Zayıf
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="program1_ad">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="radio" class="form-control" name="program1_deneyim" value="İyi">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="radio" class="form-control" name="program1_deneyim" value="Orta">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="radio" class="form-control" name="program1_deneyim" value="Zayıf">
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                                <div class="row">
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="program2_ad">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="radio" class="form-control" name="program2_deneyim" value="İyi">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="radio" class="form-control" name="program2_deneyim" value="Orta">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="radio" class="form-control" name="program2_deneyim" value="Zayıf">
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                                <div class="row">
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="program3_ad">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="radio" class="form-control" name="program3_deneyim" value="İyi">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="radio" class="form-control" name="program3_deneyim" value="Orta">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="radio" class="form-control" name="program3_deneyim" value="Zayıf">
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                                <div class="row">
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="program4_ad">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="radio" class="form-control" name="program4_deneyim" value="İyi">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="radio" class="form-control" name="program4_deneyim" value="Orta">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="radio" class="form-control" name="program4_deneyim" value="Zayıf">
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                            </div>
                                                                        </div>
                                                                        <br>

                                                                        --}}{{--Sertifika Bilgileri--}}{{--
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                Sertifika Bilgileri
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-3">
                                                                                        Kurum Adı
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        Konu
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        Süre
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        Tarih
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="sertifika1_kurum">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="sertifika1_konu">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="sertifika1_sure">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="sertifika1_tarih">
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                                <div class="row">
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="sertifika2_kurum">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="sertifika2_konu">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="sertifika2_sure">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="sertifika2_tarih">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>

                                                                        --}}{{--Referanslar--}}{{--
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                Referanslar
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-3">
                                                                                        Ad Soyad
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        Şirket
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        Ünvan
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        Telefon Numarası
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="referans1_ad">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="referans1_sirket">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="referans1_unvan">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="referans1_telefon">
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                                <div class="row">
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="referans2_ad">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="referans2_sirket">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="referans2_unvan">
                                                                                    </div>
                                                                                    <div class="col-3 input-group input-group-sm">
                                                                                        <input type="text" class="form-control" name="referans2_telefon">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>

                                                                        --}}{{--Ek Notlar--}}{{--
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                Ek Notlar
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        Bu alana belirtmek istediğiniz diğer bilgileri ekleyiniz
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-12 input-group input-group-sm">
                                                                                        <textarea name="ekbilgiler" class="form-control" cols="30" rows="10"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>--}}

                                                                        {{--KVKK Onay--}}
                                                                        <div class="row text-left">
                                                                            <div class="col-12">
                                                                                <input type="checkbox" name="kvkk_checkbox" id="kvkk_onay" class="form-check-input" required>
                                                                                <label for="kvkk_onay">Bu İş Başvuru Formu’ndaki bilgiler 6698 sayılı Kişisel Verilerin Korunması Kanunu’nda yer alan veri işleme ilke ve şartlarına uygun olarak toplanmaktadır. Bu konu hakkında ADAY ÇALIŞANLAR İÇİN KİŞİSEL VERİLERİN KORUNMASI POLİTİKASI nın bir örneğini okudum ve açıkça rızam vardır. Verdiğim bilgilerin tam ve doğru olduğunu, zamanla değişecek bilgilerimi en geç on gün içerisinde yazılı olarak bildireceğimi, gerçek dışı beyanımla işe alınmam halinde bu durumun anlaşılmasıyla herhangi bir ihbar ve tazminata gerek olmadan işime son verileceğini ve bundan dolayı herhangi bir talep ve iddiada bulunmayacağımı ve bu nedenle işverenin uğrayacağı zarar ve ziyanı tazmin edeceğimi kabul ve beyan ederim.
                                                                                    <a href="{{ route('site.kvkk') }}" target="_blank">Aday Çalışanlar İçin Kişisel Verilerin Korunması Politikası <span class="fa fa-external-link-alt"></span></a>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <hr>

                                                                        {{--Doğrulama Kodu--}}
                                                                        <div class="row">

                                                                        </div>

                                                                        <div class="row text-left">
                                                                            <div class="col-4">
                                                                                * Zorunlu Alanlar
                                                                            </div>
                                                                            <div class="col-8">
                                                                                <button type="submit" id="submit" class="theme-btn btn-style-one large btn-block" style="background-color: #1270a2;"><span class="btn-title">GÖNDER</span></button>
                                                                            </div>
                                                                        </div>



                                                                    </form>
                                                                </div>

                                                                <div class="content-box">
                                                                    <div class="title-box text-center">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Tabs -->
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

@section('customJS')
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <link href="{{ asset('plugins/toastr/toastr.min.css') }}" rel="stylesheet" />
    <script>
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        toastr.error('{{$error}}')
        @endforeach
        @endif

        @if (\Illuminate\Support\Facades\Session::has('message'))
        toastr.{{ \Illuminate\Support\Facades\Session::get("status") }}("{{ \Illuminate\Support\Facades\Session::get('message') }}")
        @endif
    </script>

    <script>
        $("#email-form").submit(function (e) {
           /*e.preventDefault();*/
           $("#submit").attr("disabled", true);
        });
    </script>
@endsection
