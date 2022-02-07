@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Başhekimlik Kaydı Düzenle</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Kontrol Paneli</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.administrative_teams') }}">Başhekimlik Kaydı Düzenle</a></li>
                            <li class="breadcrumb-item active">Başhekimlik Kaydı Düzenle</li>
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

                                <form action="{{ route('admin.administrative_team.update', ['slug' => $team->slug]) }}" method="POST" class="form-group" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    {{-- Profile Photo --}}
                                    <div class="col-md-2 offset-5">
                                        <div class="picture-container">
                                            <label class="">Profil Fotoğrafı <span>*</span></label>
                                            <div class="picture">
                                                <img src="{{ asset('storage/images/corporate/teams/' . $team->profile_photo) }}" class="picture-src" id="wizardPicturePreview" title="">
                                                <input type="file" name="profile_photo" id="wizard-picture" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    {{-- End Profile Photo --}}

                                    <label>Ünvan <span>*</span></label>
                                    <input class="form-control" name="degree" value="{{ $team->degree }}" type="text" placeholder="Örnek: Dr. Prof." required>
                                    <br>

                                    <label>İsim <span>*</span></label>
                                    <input class="form-control" name="name" value="{{ $team->name }}" type="text" placeholder="Örnek: Mehmet" required>
                                    <br>

                                    <label>Soyisim <span>*</span></label>
                                    <input class="form-control" name="lastname" value="{{ $team->lastname }}" type="text" placeholder="Örnek: Öz" required>
                                    <br>

                                    <label>Görev <span>*</span></label>
                                    <input class="form-control" name="role" value="{{ $team->role }}" type="text" placeholder="Örnek: Hastane Müdürü" required>
                                    <br>

                                    <label>E-Posta <span>*</span></label>
                                    <input type="email" class="form-control" value="{{ $team->email }}" name="email" placeholder="example@gmail.com">
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
