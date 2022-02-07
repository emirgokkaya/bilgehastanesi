@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Anasayfa Bilgilendirme Düzenle({{$info->title}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Kontrol Paneli</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.homepage_informations') }}">Anasayfa Bigilendirme</a></li>
                            <li class="breadcrumb-item active">Düzenle({{ \Illuminate\Support\Str::limit($info->itlte, 20) }})</li>
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

                                <form action="{{ route('admin.homepage_information.update', ['slug' => $info->slug]) }}" method="POST" class="form-group">
                                    @method('PUT')
                                    @csrf
                                    <label>Başlık <span>*</span></label>
                                    <input class="form-control" name="title" type="text" value="{{ $info->title }}" required>
                                    <br>

                                    <label>İkon</label>
                                    <input type="text" class="form-control" name="icon" placeholder="fa fa-user" @if($info->icon != null) value="{{ $info->icon }}" @endif>
                                    <br>

                                    <label>İçerik <span>*</span></label>
                                    <textarea class="form-control" name="content" rows="10" required>{!! $info->content !!}</textarea>
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
