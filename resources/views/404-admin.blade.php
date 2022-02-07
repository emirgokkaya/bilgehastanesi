@extends('admin.layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>404 Hata Sayfası</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Anasayfa</a></li>
                        <li class="breadcrumb-item active">404 Hata Sayfası</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-warning"> 404</h2>

            <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Sayfa Bulunamadı.</h3>

                <p>
                    Aradığınız sayfa bulunamadı.
                   Yönetim paneline gitmek için <a href="{{ route('admin.dashboard') }}">tıklayınız.</a>
                </p>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
    <!-- /.content -->
@endsection
