@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Misyon & Vizyon</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Kontrol Paneli</a></li>
                            <li class="breadcrumb-item active">Misyon & Vizyon</li>
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
                                <h3 class="card-title">Misyon & Vizyon</h3>
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

                            <form role="form" class="form-group" method="POST" action="@if(count($mission_vision) <= 0) {{ route('admin.corporate.mission_vision.post') }} @else {{ route('admin.corporate.mission_vision.put') }} @endif">
                                @if(count($mission_vision) > 0) @method('PUT') @else @method('POST') @endif
                                @csrf

                                <div class="card-body">
                                    <label>Misyon & Vizyon</label>
                                    <textarea name="mission_vision" id="about" cols="30" rows="10">@if(isset($mission_vision[0]->mission_vision)) {!! $mission_vision[0]->mission_vision !!} @endif</textarea>
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
