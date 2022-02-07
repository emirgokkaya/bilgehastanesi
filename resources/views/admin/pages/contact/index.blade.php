@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>İletişim Bilgileri</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Kontrol Paneli</a></li>
                            <li class="breadcrumb-item">İletişim Bilgileri</li>
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

                                <form action="@if(isset($contact)) {{ route('admin.contact.put') }} @else {{ route('admin.contact.post') }} @endif" method="POST" class="form-group" enctype="multipart/form-data">
                                    @if(isset($contact)) @method('PUT') @else @method('POST') @endif
                                    @csrf
                                    {{-- Profile Photo --}}
                                    <div class="col-md-2 offset-5">
                                        <div class="picture-container">
                                            <label class="">Görsel Harita</label>
                                            <div class="picture">
                                                <img src="@if(isset($contact)) {{ asset('storage/images/contact/' . $contact->image) }} @endif" class="picture-src" id="wizardPicturePreview" title="">
                                                <input type="file" name="image" id="wizard-picture" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    {{-- End Profile Photo --}}

                                    <label>E-Posta <span>*</span></label>
                                    <input class="form-control" name="email" value="@if(isset($contact)) {{ $contact->email }} @endif" type="email" placeholder="example@bilgehastanesi.com" required>
                                    <br>

                                    <label>Telefon <span>*</span></label>
                                    <input class="form-control" name="phone" @if(isset($contact))@if($contact->phone != "")value="{{ $contact->phone }}"@endif @endif type="text" pattern="^(0(\d{3}) (\d{3}) (\d{2}) (\d{2}))$" placeholder="0850 460 95 75" required>
                                    <br>

                                    <label>Whatsapp</label>
                                    <input class="form-control" name="whatsapp" @if(isset($contact))@if($contact->whatsapp != "")value="{{ $contact->whatsapp }}"@endif @endif type="text" pattern="^(0(\d{3}) (\d{3}) (\d{2}) (\d{2}))$" placeholder="0549 302 01 12">
                                    <br>

                                    <label>Fax</label>
                                    <input class="form-control" name="fax" type="text" @if(isset($contact))@if($contact->fax != "")value="{{ $contact->fax }}"@endif @endif pattern="^(0(\d{3}) (\d{3}) (\d{2}) (\d{2}))$" placeholder="0212 617 57 98">
                                    <br>



                                    <label>Google Maps URL</label>
                                    <input class="form-control" name="map" type="text" value="@if(isset($contact)) {{ $contact->map_url }} @endif" placeholder='<iframe src="..." width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>'>
                                    <br>

                                    <label>Adres <span>*</span></label>
                                    <textarea name="address" id="" cols="30" rows="10">@if(isset($contact)) {{ $contact->address }} @endif</textarea>
                                    <br>

                                    <label>Nasıl Giderim ? </label>
                                    <textarea name="how_can_i_go" id="" cols="30" rows="10">@if(isset($contact)) {{ $contact->how_can_i_go }} @endif</textarea>
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
