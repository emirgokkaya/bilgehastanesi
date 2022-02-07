@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Anasayfa Bilgilendirme Başlık</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Kontrol Paneli</a></li>
                            <li class="breadcrumb-item active">Anasayfa Bilgilendirme Başlık</li>
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
                                <h3 class="card-title">Kayıt</h3>
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

                                <form action="@if(count($homepage_information_title) <= 0) {{ route('admin.homepage_information_title.post') }} @else {{ route('admin.homepage_information_title.put') }} @endif" method="POST" class="form-group" enctype="multipart/form-data">
                                    @if(count($homepage_information_title) > 0) @method('PUT') @else @method('POST') @endif
                                    @csrf
                                    {{-- Profile Photo --}}
                                    <div class="col-md-2 offset-5">
                                        <div class="picture-container">
                                            <label class="">Fotoğraf <span>*</span></label>
                                            <div class="picture">
                                                <img src="@if(isset($homepage_information_title[0]->image)) {{ asset('storage/images/homepage_information_title/' . $homepage_information_title[0]->image) }} @endif" class="picture-src" id="wizardPicturePreview" title="">
                                                <input type="file" name="image" id="wizard-picture" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    {{-- End Profile Photo --}}

                                    <label>Başlık <span>*</span></label>
                                    <input class="form-control" name="title" type="text" @if(isset($homepage_information_title[0]->title)) value="{{ $homepage_information_title[0]->title }}" @endif>
                                    <br>

                                    <label>Üst Title</label>
                                    <input class="form-control" name="top_title" type="text" @if(isset($homepage_information_title[0]->top_title)) value="{{ $homepage_information_title[0]->top_title }}" @endif>
                                    <br>

                                    <label>İçerik <span>*</span></label>
                                    <input class="form-control" name="content" type="text" @if(isset($homepage_information_title[0]->content)) value="{{ $homepage_information_title[0]->content }}" @endif>
                                    <br>

                                    <label>İkon</label>
                                    <input type="text" class="form-control" name="icon" placeholder="flaticon-doctor" @if(isset($homepage_information_title[0]->icon)) value="{{ $homepage_information_title[0]->icon }}" @endif>
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
