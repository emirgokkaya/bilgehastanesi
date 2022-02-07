@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Galeri Düzenle</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Kontrol Paneli</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.galleries') }}">Galeri</a></li>
                            <li class="breadcrumb-item active">Galeri Kaydı Düzenle</li>
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

                                <form action="{{ route('admin.gallery.update', ['slug' => $gallery->slug]) }}" method="POST" class="form-group" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    {{-- Profile Photo --}}
                                    @if($gallery->type === "image")
                                    <div class="col-md-2 offset-5">
                                        <div class="picture-container">
                                            <label class="">Galeri <span>*</span></label>
                                            <div class="picture">
                                                <img src="{{ asset('storage/images/galleries/' . $gallery->source) }}" class="picture-src" id="wizardPicturePreview" title="">
                                                <input type="file" name="source" id="wizard-picture" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($gallery->type === "video")
                                        <div class="col-md-2 offset-5">
                                            <div class="picture-container">
                                                <label class="">Galeri <span>*</span></label>
                                                <div class="">
                                                    <video width="320" height="240" poster="{{ asset('storage/images/galleries/' . $gallery->source) }}" controls>
                                                        <source src="{{ asset('storage/images/galleries/' . $gallery->source) }}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                    <input type="file" name="source" id="wizard-picture" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <br>
                                    {{-- End Profile Photo --}}

                                    <label>Başlık <span>*</span></label>
                                    <input class="form-control" name="title" type="text" value="{{ $gallery->title }}" required>
                                    <br>

                                    <label>İçerik <span>*</span></label>
                                    <textarea name="description" id="" cols="30" rows="10">{{ $gallery->description }}</textarea>
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
