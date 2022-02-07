@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Başhekimimizden</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Kontrol Paneli</a></li>
                            <li class="breadcrumb-item active">Başhekimimizden</li>
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
                                <h3 class="card-title">Başhekimimizden</h3>
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

                            <form role="form" class="form-group" method="POST" action="@if(count($chief_physician) <= 0) {{ route('admin.corporate.chief_physician.post') }} @else {{ route('admin.corporate.chief_physician.put') }} @endif" enctype="multipart/form-data">
                                @if(count($chief_physician) > 0) @method('PUT') @else @method('POST') @endif
                                @csrf

                                {{-- Profile Photo --}}
                                <div class="col-md-2 offset-5">
                                    <div class="picture-container">
                                        <label class="">Doktor Fotoğrafı <span>*</span></label>
                                        <div class="picture">
                                            <img src="@if(isset($chief_physician[0]->profile_image)) {{ asset('storage/images/corporate/chief_physician/' . $chief_physician[0]->profile_image) }} @endif" class="picture-src" id="wizardPicturePreview" title="">
                                            <input type="file" name="profile_image" id="wizard-picture" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                {{-- End Profile Photo --}}

                                <div class="card-body">
                                    <label>Doktor İsmi <span>*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ isset($chief_physician[0]->name) ? $chief_physician[0]->name : '' }}" placeholder="Örnek: (Doç. Dr. Mehmet Öz)" required>
                                </div>

                                <div class="card-body">
                                    <label>İçerik <span>*</span></label>
                                    <textarea name="content" id="content" cols="30" rows="10">@if(isset($chief_physician[0]->content)) {!! $chief_physician[0]->content !!} @endif</textarea>
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
