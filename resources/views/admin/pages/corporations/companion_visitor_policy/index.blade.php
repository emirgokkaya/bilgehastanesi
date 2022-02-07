@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Refakatçi ve Ziyaretçi Politikamız</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Kontrol Paneli</a></li>
                            <li class="breadcrumb-item active">Refakatçi ve Ziyaretçi Politikamız</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 offset-3">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Refakatçi ve Ziyaretçi Politikamız</h3>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form role="form" class="form-group" method="POST" action="@if(count($companion_visitor_policy) <= 0) {{ route('admin.corporate.companion_visitor_policy.post') }} @else {{ route('admin.corporate.companion_visitor_policy.put') }} @endif">
                                @if(count($companion_visitor_policy) > 0) @method('PUT') @else @method('POST') @endif
                                @csrf

                                <div class="card-body">
                                    <label>İçerik</label>
                                    <textarea name="content" id="copanion_visitor_policy" cols="30" rows="10">@if(isset($companion_visitor_policy[0]->content)) {!! $companion_visitor_policy[0]->content !!} @endif</textarea>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@include('admin.partials.create.script')
@include('admin.partials.create.style')
