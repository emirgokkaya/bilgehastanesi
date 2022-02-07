@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profil</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Kontrol Paneli</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.doctors') }}">Profil</a></li>
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
                                <h3 class="card-title">Profil Bilgileri</h3>
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

                                <form action="{{ route('admin.profile.update') }}" method="POST" class="form-group" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    {{-- Profile Photo --}}
                                    <div class="col-md-2 offset-5">
                                        <div class="picture-container">
                                            <label class="">Profil Fotoğrafı <span>*</span></label>
                                            <div class="picture">
                                                <img src="{{ asset('storage/images/users/'.auth()->user()->profile_photo) }}" class="picture-src" id="wizardPicturePreview" title="">

                                                <input type="file" name="profile_photo" value="{{ asset('storage/images/users/'.auth()->user()->profile_photo) }}" accept="png, .jpg, .jpeg" id="wizard-picture" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    {{-- End Profile Photo --}}

                                    <label>İsim - Soyisim <span>*</span></label>
                                    <input class="form-control" name="name" type="text" value="{{ auth()->user()->name }}" required>
                                    <br>

                                    <label>E-Posta <span>*</span></label>
                                    <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}">
                                    <br>

                                    <label>Yeni Şifre</label>
                                    <input class="form-control" name="password" type="password">
                                    <br>

                                    <label>Yeni Şifre Tekrar</label>
                                    <input class="form-control" name="repassword" type="password">
                                    <br>

                                    <button type="submit" class="btn" style="background-color: #1270a2; color: white;float: right">Güncelle</button>
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
