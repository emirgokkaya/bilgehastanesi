@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kariyer</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Kontrol Paneli</a></li>
                            <li class="breadcrumb-item active">Kariyer</li>
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
                                <h3 class="card-title">Kariyer</h3>
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

                            <form role="form" class="form-group" method="POST" action="@if(count($career) <= 0) {{ route('admin.human.resource.career.post') }} @else {{ route('admin.human.resource.career.put') }} @endif" enctype="multipart/form-data">
                                @if(count($career) > 0) @method('PUT') @else @method('POST') @endif
                                @csrf
                                {{-- Profile Photo --}}
                                <div class="col-md-2 offset-5">
                                    <div class="picture-container">
                                        <label class="">Kariyer Resmi <span>*</span></label>
                                        <div class="picture">
                                            <img src="@if(isset($career[0]->image)) {{ asset('storage/images/corporate/human_resource/career/' . $career[0]->image) }} @endif" class="picture-src" id="wizardPicturePreview" title="">
                                            <input type="file" name="image" id="wizard-picture" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                {{-- End Profile Photo --}}

                                <div class="card-body">
                                    <label>Başlık <span>*</span></label>
                                    <input type="text" name="title" class="form-control" value="{{ isset($career[0]->title) ? $career[0]->title : '' }}" required>
                                </div>

                                <div class="card-body">
                                    <label>İçerik</label>
                                    <textarea name="content" id="about" cols="30" rows="10">@if(isset($career[0]->title)) {!! $career[0]->title !!} @endif</textarea>
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
