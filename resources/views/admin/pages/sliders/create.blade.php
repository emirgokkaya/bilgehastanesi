@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Yeni Slayt Kaydı</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Kontrol Paneli</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.sliders') }}">Slaytlar</a></li>
                            <li class="breadcrumb-item active">Yeni Slayt Kaydı</li>
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
                                <h3 class="card-title">Yeni Kayıt</h3>
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

                                <form action="{{ route('admin.slider.store') }}" method="POST" class="form-group" enctype="multipart/form-data">
                                    @csrf
                                    {{-- Profile Photo --}}
                                    <div class="col-md-2 offset-5">
                                        <div class="picture-container">
                                            <label class="">Slayt Fotoğraf <span>*</span></label>
                                            <div class="picture">
                                                <img src="" class="picture-src" id="wizardPicturePreview" title="">
                                                <input type="file" name="image" id="wizard-picture" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    {{-- End Profile Photo --}}

                                    <label>Başlık <span>*</span></label>
                                    <input class="form-control" name="title" type="text" placeholder="Örnek: Lorem ipsum dolor sit amet">
                                    <br>

                                    <label>Span Title</label>
                                    <input class="form-control" name="span_title" type="text" placeholder="Örnek: Lorem ipsum dolor sit amet">
                                    <br>

                                    <label>İçerik</label>
                                    <input class="form-control" name="content" type="text" placeholder="Örnek: Lorem ipsum dolot sit amet, lorem ipsum dolor sit amet">
                                    <br>

                                    <label>Buton 1 Yazı</label>
                                    <input type="text" class="form-control" name="button_text1" placeholder="Örnek: Randevu">
                                    <br>

                                    <label>Link 1</label>
                                    <input type="text" class="form-control" name="link1" placeholder="{{env('APP_URL').'/link1'}}">
                                    <br>

                                    <label>Buton 2 Yazı</label>
                                    <input type="text" class="form-control" name="button_text2" placeholder="Örnek: Bölümler">
                                    <br>

                                    <label>Link 2</label>
                                    <input type="text" class="form-control" name="link2" placeholder="{{env('APP_URL').'/link2'}}">
                                    <br>

                                    <input type="checkbox" name="display" id="showhide"> <label for="showhide">Slayt Başlık ve İçeriğini Gizle</label>
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
