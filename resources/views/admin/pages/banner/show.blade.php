@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sayfa Kapak Resimleri Düzenle</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Kontrol Paneli</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.banners') }}">Sayfa Kapak Resimleri</a></li>
                            <li class="breadcrumb-item active">Sayfa Kapak Resimleri Düzenle</li>
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

                                <form action="{{ route('admin.banner.update', ['page' => $banner->page]) }}" method="POST" class="form-group" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    {{-- Profile Photo --}}
                                    <div class="col-md-2 offset-5">
                                        <div class="picture-container">
                                            <label class="">Kurum Fotoğrafı <span>*</span></label>
                                            <div class="picture">
                                                <img src="{{ asset('storage/images/banners/' . $banner->image) }}" class="picture-src" id="wizardPicturePreview" title="">
                                                <input type="file" name="image" id="wizard-picture" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    {{-- End Profile Photo --}}

                                    <label>Sayfa <span>*</span></label>
                                    <select class="form-control" name="page" data-placeholder="Resim hangi sayfaya eklenecek" autocomplete="off"
                                            style="width: 100%;" required>
                                        <option value="doktorlarimiz" @if($banner->page === "doktorlarimiz") selected="selected" @endif>Doktorlarımız</option>
                                        <option value="bolumlerimiz" @if($banner->page === "bolumlerimiz") selected="selected" @endif>Bölümlerimiz</option>
                                        <option value="hizmetlerimiz" @if($banner->page === "hizmetlerimiz") selected="selected" @endif>Hizmetlerimiz</option>
                                        <option value="diger-hizmetlerimiz" @if($banner->page === "diger-hizmetlerimiz") selected="selected" @endif>Diğer Hizmetlerimiz</option>
                                        <option value="iletisim" @if($banner->page === "iletisim") selected="selected" @endif>İletişim</option>
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
