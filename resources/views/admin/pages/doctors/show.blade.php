@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Doktor Düzenle({{$doctor->degree}} {{$doctor->name}} {{$doctor->lastname}})</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Kontrol Paneli</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.doctors') }}">Doktorlar</a></li>
                            <li class="breadcrumb-item active">Düzenle({{$doctor->degree}} {{$doctor->name}} {{$doctor->lastname}})</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <!-- Form Element sizes -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Kayıt Düzenle</h3>
                            </div>
                            <div class="card-body">

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('admin.doctor.update', ['slug' => $doctor->slug]) }}" method="POST" class="form-group" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    {{-- Profile Photo --}}
                                    <div class="col-md-2 offset-5">
                                        <div class="picture-container">
                                            <label class="">Profil Fotoğrafı <span>*</span></label>
                                            <div class="picture">
                                                <img src="{{ asset('storage/images/doctors/'.$doctor->profile_photo) }}" class="picture-src" id="wizardPicturePreview" title="">
                                                <input type="file" name="profile_photo" value="{{ asset('storage/images/doctors/'.$doctor->profile_photo) }}" accept="png, .jpg, .jpeg" id="wizard-picture" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    {{-- End Profile Photo --}}

                                    <label>Ünvan <span>*</span></label>
                                    <input class="form-control" name="degree" type="text" value="{{ $doctor->degree }}" placeholder="Örnek: Dr. Prof." required>
                                    <br>

                                    <label>İsim <span>*</span></label>
                                    <input class="form-control" name="name" type="text" value="{{ $doctor->name }}" placeholder="Örnek: Mehmet" required>
                                    <br>

                                    <label>Soyisim <span>*</span></label>
                                    <input class="form-control" name="lastname" type="text" value="{{ $doctor->lastname }}" placeholder="Örnek: Öz" required>
                                    <br>

                                    <label>E-Posta <span>*</span></label>
                                    <input type="email" class="form-control" name="email" value="{{ $doctor->email }}" placeholder="example@gmail.com">
                                    <br>

                                    <label>Doğum Tarihi <span>*</span></label>
                                    <input class="form-control" name="date_of_birth" type="date" value="{{ $doctor->date_of_birth->format('Y-m-d') }}" id="example-date-input">
                                    <br>

                                    <label>Bölümler <span>*</span></label>
                                    <select class="select2bs4" id="departments" name="departments[]" multiple="multiple" data-placeholder="Doktorun Bölümlerini Seçin" autocomplete="off"
                                            style="width: 100%;" required>
                                        @forelse($departments as $department)
                                            <option value="{{ $department->id }}"
                                                    @forelse($doctor->departments as $dd)
                                                        @if($dd->id === $department->id) selected @endif
                                                    @empty
                                                    @endforelse>{{ $department->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    <br>

                                    <label>Facebook</label>
                                    <input type="text" class="form-control" name="facebook" value="{{ $doctor->facebook }}" placeholder="https://facebook.com/mehmet-oz">
                                    <br>

                                    <label>Instagram</label>
                                    <input type="text" class="form-control" name="instagram" value="{{ $doctor->instagram }}" placeholder="https://instagram.com/mehmet-oz">
                                    <br>

                                    <label>Twitter</label>
                                    <input type="text" class="form-control" name="twitter" value="{{ $doctor->twitter }}" placeholder="https://twitter.com/mehmet-oz">
                                    <br>

                                    <label>Linkedin</label>
                                    <input type="text" class="form-control" name="linkedin" value="{{ $doctor->linkedin }}" placeholder="httsp://linkedin.com/mehmet-oz">
                                    <br>

                                    <label>Whatsapp</label>
                                    <input type="text" class="form-control" name="whatsapp" value="{{ $doctor->whatsapp }}" placeholder="+905435432121">
                                    <br>

                                    <label>Üye Olduğu Mesleki Dernekler</label>
                                    <textarea class="form-control" name="biography" rows="10" placeholder="Üye Olduğu Mesleki Dernekler">{!! $doctor->biography !!}</textarea>
                                    <br>

                                    <label>Uzmanlık</label>
                                    <textarea class="form-control" name="speciality" rows="10" placeholder="Uzmanlık">{!! $doctor->speciality !!}</textarea>
                                    <br>

                                    <label>Eğitim</label>
                                    <textarea class="form-control" name="education" rows="10" placeholder="Eğitim">{!! $doctor->education !!}</textarea>
                                    <br>

                                    <label>Katıldığı Eğitimler ve Sertifikalar</label>
                                    <textarea class="form-control" name="certificate" rows="10" placeholder="Katıldığı Eğitimler ve Sertifikalar">{!! $doctor->certificate !!}</textarea>
                                    <br>

                                    <label>Deneyim</label>
                                    <textarea class="form-control" name="experience" rows="10" placeholder="Deneyim">{!! $doctor->experience !!}</textarea>
                                    <br>

                                    <label>Yabancı Dil</label>
                                    <textarea class="form-control" name="foreign_language" rows="10" placeholder="Yabancı Dil">{!! $doctor->foreign_language !!}</textarea>
                                    <br>

                                    <button type="submit" class="btn" style="background-color: #1270a2; color: white;float: right">Kaydet</button>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection



@include('admin.partials.create.script')


@include('admin.partials.create.style')
