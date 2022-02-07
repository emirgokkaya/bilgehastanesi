@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Haber-Duyuru Düzenle({{ \Illuminate\Support\Str::limit($news->title, 15) }})</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Kontrol Paneli</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.news_announcements') }}">Haber-Duyuru</a></li>
                            <li class="breadcrumb-item active">Düzenle({{ \Illuminate\Support\Str::limit($news->title, 15) }})</li>
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

                                <form action="{{ route('admin.news_announcement.update', ['slug' => $news->slug]) }}" method="POST" class="form-group" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    {{-- Profile Photo --}}
                                    <div class="col-md-2 offset-5">
                                        <div class="picture-container">
                                            <label class="">Haber-Duyuru Fotoğrafı <span>*</span></label>
                                            <div class="picture">
                                                <img src="{{ asset('storage/images/news_announcements/'.$news->image) }}" class="picture-src" id="wizardPicturePreview" title="">
                                                <input type="file" name="image" value="{{ asset('storage/images/news_announcements/'.$news->image) }}" accept="png, .jpg, .jpeg" id="wizard-picture" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    {{-- End Profile Photo --}}

                                    <label>İsim <span>*</span></label>
                                    <input class="form-control" name="title" type="text" value="{{ $news->title }}" required>
                                    <br>

                                    <label>İçerik <span>*</span></label>
                                    <textarea name="content" id="" cols="30" rows="10">{!! $news->content !!}</textarea>
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
