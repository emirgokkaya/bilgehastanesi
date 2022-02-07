@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kalite Politikası Düzenle</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Kontrol Paneli</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.quality_policies') }}">Kalite Politikası</a></li>
                            <li class="breadcrumb-item active">Kalite Politikası Kaydı Düzenle</li>
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

                                <form action="{{ route('admin.quality_policy.update', ['slug' => $quality->slug]) }}" method="POST" class="form-group" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    {{-- Profile Photo --}}
                                    <div class="col-md-2 offset-5">
                                        <div class="picture-container">
                                            <label class="">Organizasyon Şeması</label>
                                            <div class="picture">
                                                <img src="@if($quality->image != null) {{ asset('storage/corporate/quality_policies/images/' . $quality->image) }} @endif" class="picture-src" id="wizardPicturePreview" title="">
                                                <input type="file" name="image" id="wizard-picture" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    {{-- End Profile Photo --}}

                                    <label>Başlık <span>*</span></label>
                                    <input class="form-control" name="title" type="text" @if($quality->title != null) value="{{ $quality->title }}" @endif required>
                                    <br>

                                    <hr>

                                    <label>Organizasyon Şeması Yazı</label>
                                    <textarea name="text2" id="" cols="30" rows="10">@if($quality->text2 != null) {!! $quality->text2 !!} @endif</textarea>
                                    <br>

                                    <label>Kalite Politikası Yazı</label>
                                    <textarea name="text" id="" cols="30" rows="10">@if($quality->text != null) {!! $quality->text !!} @endif</textarea>
                                    <br>

                                    <label>Dosya 1</label>
                                    <input type="file" name="file1" class="form-control"> @if($quality->file1 != null) {{ $quality->file1 }} @endif
                                    <br>

                                    <label>Dosya 2</label>
                                    <input type="file" name="file2" class="form-control"> @if($quality->file2 != null) {{ $quality->file2 }} @endif
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
