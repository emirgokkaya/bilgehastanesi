@extends('admin.layouts.master')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Site Ayarları</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Kontrol Paneli</a></li>
                            <li class="breadcrumb-item active">Site Ayarları</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 offset-3">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Site Ayarları</h3>
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

                            <form role="form" class="form-group" method="POST" action="@if(count($corporate) <= 0) {{ route('admin.corporation.save') }} @else {{ route('admin.corporation.update') }} @endif" enctype="multipart/form-data">
                                @if(count($corporate) > 0) @method('PUT') @else @method('POST') @endif
                                @csrf
                                <div class="card-body">
                                    <label>E-Posta Adresi <span>*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" name="email" class="form-control" placeholder="E-Posta" @if(isset($corporate[0]->email)) value="{{ $corporate[0]->email }}" @endif required>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <label>Telefon 1 <span>*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" name="phone" pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$" class="form-control" @if(isset($corporate[0]->phone)) value="{{ $corporate[0]->phone }}" @endif placeholder="0850 455 95 78" data-inputmask='"mask": "(999) 999-9999"' data-mask required>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <label>Telefon 2</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" name="phone2" pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$" class="form-control" @if(isset($corporate[0]->phone2)) value="{{ $corporate[0]->phone2 }}" @endif placeholder="0850 455 95 78" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <label>Kuruluş Yılı</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                        <input type="number" name="year_of_foundation" class="form-control" @if(isset($corporate[0]->year_of_foundation)) value="{{ $corporate[0]->year_of_foundation }}" @endif placeholder="1980">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <label>Adres</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-road"></i></span>
                                            <textarea name="address" id="address" cols="30" rows="10">@if(isset($corporate[0]->address)) {!! $corporate[0]->address !!} @endif</textarea>
                                        </div>

                                    </div>
                                </div>

                                <div class="card-body">
                                    <label>Facebook</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                        </div>
                                        <input type="text" name="facebook" class="form-control" @if(isset($corporate[0]->facebook)) value="{{ $corporate[0]->facebook }}" @endif placeholder="https://facebook.com/bilge-hastanesi">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <label>Instagram</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                        </div>
                                        <input type="text" name="instagram" class="form-control" @if(isset($corporate[0]->instagram)) value="{{ $corporate[0]->instagram }}" @endif placeholder="https://instagram.com/bilge-hastanesi">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <label>Twitter</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                        </div>
                                        <input type="text" name="twitter" class="form-control" @if(isset($corporate[0]->twitter)) value="{{ $corporate[0]->twitter }}" @endif placeholder="https://twitter.com/bilge-hastanesi">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <label>Youtube</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                                        </div>
                                        <input type="text" name="youtube" class="form-control" @if(isset($corporate[0]->youtube)) value="{{ $corporate[0]->youtube }}" @endif placeholder="https://youtube.com/bilge-hastanesi">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <label>Linkedin</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                                        </div>
                                        <input type="text" name="linkedin" class="form-control" @if(isset($corporate[0]->linkedin)) value="{{ $corporate[0]->linkedin }}" @endif placeholder="https://linkedin.com/bilge-hastanesi">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <label>Whatsapp</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                                        </div>
                                        <input type="text" name="whatsapp" class="form-control" @if(isset($corporate[0]->whatsapp)) value="{{ $corporate[0]->whatsapp }}" @endif placeholder="https://whatsapp.com/bilge-hastanesi">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Sağlık Politikası</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="health_policy" @if(isset($corporate[0]->health_policy)) value="{{ $corporate[0]->health_policy }}" @endif class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">@if(isset($corporate[0]->health_policy)) {{ $corporate[0]->health_policy }} @else Dosya Seç @endif</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Uluslar Arası Sağlık Turizmi Yetki Belgesi</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="international_health_tourism_authorization_certificate" @if(isset($corporate[0]->international_health_tourism_authorization_certificate)) value="{{ $corporate[0]->international_health_tourism_authorization_certificate }}" @endif class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">@if(isset($corporate[0]->international_health_tourism_authorization_certificate)) {{ $corporate[0]->international_health_tourism_authorization_certificate }} @else Dosya Seç @endif</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Başvuru Formu</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="application_form" @if(isset($corporate[0]->application_form)) value="{{ $corporate[0]->application_form }}" @endif class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">@if(isset($corporate[0]->application_form)) {{ $corporate[0]->application_form }} @else Dosya Seç @endif</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <label>KVKK</label>
                                    <textarea name="kvkk" id="kvkk" cols="30" rows="10">@if(isset($corporate[0]->kvkk)) {!! $corporate[0]->kvkk !!} @endif</textarea>
                                </div>

                                <div class="card-body">
                                    <label>Footer Yazı</label>
                                    <textarea name="footer_content" id="footer_content" cols="30" rows="10">@if(isset($corporate[0]->footer_content)) {!! $corporate[0]->footer_content !!} @endif</textarea>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@include('admin.partials.create.script')


@include('admin.partials.create.style')

