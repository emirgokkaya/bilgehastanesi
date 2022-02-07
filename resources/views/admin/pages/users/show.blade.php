@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kullanıcı Kaydı Düzenle</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Kontrol Paneli</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Kullanıcılar</a></li>
                            <li class="breadcrumb-item active">Kullanıcı Kaydı Düzenle</li>
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

                                <form action="{{ route('admin.user.update', ['email' => $user->email]) }}" method="POST" class="form-group" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    {{-- Profile Photo --}}
                                    <div class="col-md-2 offset-5">
                                        <div class="picture-container">
                                            <label class="">Profil Fotoğrafı </label>
                                            <div class="picture">
                                                <img src="@if(isset($user->profile_photo)) {{ asset('storage/images/users/' . $user->profile_photo) }} @else {{ asset('images/logo.svg') }} @endif" class="picture-src" id="wizardPicturePreview" title="">
                                                <input type="file" name="profile_photo" id="wizard-picture" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    {{-- End Profile Photo --}}

                                    <label>İsim - Soyisim <span>*</span></label>
                                    <input class="form-control" name="name" @if(isset($user->name)) value="{{ $user->name }}" @endif type="text" required>
                                    <br>

                                    <label>E-Posta <span>*</span></label>
                                    <input type="email" class="form-control" @if(isset($user->email)) value="{{ $user->email }}" @endif name="email" required>
                                    <br>

                                    <label>Şifre</label>
                                    <input type="password" class="form-control" name="password">
                                    <br>

                                    <label>Şifre Tekrar</label>
                                    <input type="password" class="form-control" name="repassword">
                                    <br>

                                    <label>Rol <span>*</span></label>
                                    <select name="role" class="form-control" id="role" data-placeholder="Kullanıcı rolünü seçin" autocomplete="off"
                                            style="width: 100%;" required>
                                        <option value="editor" @if($user->role === 'editor') selected @endif>Editör</option>
                                        <option value="admin" @if($user->role === 'admin') selected @endif>Yönetici</option>
                                    </select>
                                    <br>

                                    <label>Durum <span>*</span></label>
                                    <select name="status" class="form-control" data-placeholder="Kullanıcı Aktif/Pasif" autocomplete="off"
                                            style="width: 100%;" required>
                                        <option value="1" @if($user->status === 1) selected @endif>Aktif</option>
                                        <option value="0" @if($user->status === 0) selected @endif>Pasif</option>
                                    </select>
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
