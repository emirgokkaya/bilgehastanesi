@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Yeni Bilgilendirme Ekle</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Kontrol Paneli</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.summaries') }}">Bilgilendirme</a></li>
                            <li class="breadcrumb-item active">Yeni Bilgilendirme Kaydı</li>
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

                                <form action="{{ route('admin.other_service_summary.store') }}" method="POST" class="form-group" enctype="multipart/form-data">
                                    @csrf
                                    <label>Başlık <span>*</span></label>
                                    <input class="form-control" name="title" type="text" required>
                                    <br>

                                    <label>İçerik <span>*</span></label>
                                    <textarea name="description" id="" cols="30" rows="10"></textarea>
                                    <br>

                                    <label>Sağlık Hizmeti <span>*</span></label>
                                    <select class="select2bs4" name="other_service" data-placeholder="Bilgilendirme için Sağlık Hizmeti Seçin" autocomplete="off"
                                            style="width: 100%;" required>
                                        @forelse($other_services as $service)
                                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @empty
                                        @endforelse
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
