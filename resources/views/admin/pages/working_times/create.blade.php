@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Yeni Çalışma Saati Ekle</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Kontrol Paneli</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.working_times') }}">Çalışma Saatleri</a></li>
                            <li class="breadcrumb-item active">Yeni Çalışma Saati</li>
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

                                <form action="{{ route('admin.working_time.store') }}" method="POST" class="form-group">
                                    @csrf
                                    <label>Doktor Seç</label>
                                    <select class="select2bs4 form-control" name="doctor" data-placeholder="Doktorun Bölümlerini Seçin" autocomplete="off"
                                            style="width: 100%;" required>
                                        <option value="" disabled selected>Doktor Seçin</option>
                                    @forelse($doctors as $doctor)
                                            <option value="{{ $doctor->id }}">{{ $doctor->degree.' '.$doctor->name.' '.$doctor->lastname }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    <br>

                                    <label>Gün</label>
                                    <select name="day" class="form-control" autocomplete="off" id="" required>
                                        <option value="" disabled selected>Gün Seçin</option>
                                        <option value="Pazartesi">Pazartesi</option>
                                        <option value="Salı">Salı</option>
                                        <option value="Çarşamba">Çarşamba</option>
                                        <option value="Perşembe">Perşembe</option>
                                        <option value="Cuma">Cuma</option>
                                        <option value="Cumartesi">Cumartesi</option>
                                        <option value="Pazar">Pazar</option>
                                    </select>
                                    <br>

                                    <div id="time-working">
                                        <div id="start-time">
                                            <label>Başlangıç Saati</label>
                                            <input class="form-control" name="start" type="time" placeholder="08:00" required>
                                            <br>
                                        </div>

                                        <div id="finish-time">
                                            <label>Bitiş Saati</label>
                                            <input class="form-control" name="finish" type="time" placeholder="19:00" required>
                                            <br>
                                        </div>
                                    </div>


                                    <input type="checkbox" id="izinli"> <label for="izinli">Doktor İzinli</label>

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

@section('customJS')
    <script>
        var izinli = $("#izinli").val();
        var tag = $("<div id='start-time'>" +
            "<label>Başlangıç Saati</label>" +
            "<input class='form-control' name='start' type='time' required>" +
            "<br>" +
            "</div>" +
            "<div id='finish-time'>" +
            "<label>Bitiş Saati</label>" +
            "<input class='form-control' name='finsih' type='time' required>" +
            "<br>" +
            "</div>");


        $( '#izinli').click(function() {
            if($("#izinli").is(':checked')) {
                $("#start-time").remove();
                $("#finish-time").remove();
            } else {
                $("#time-working").html(tag);
            }
        });
    </script>
@endsection


@include('admin.partials.create.script')


@include('admin.partials.create.style')
