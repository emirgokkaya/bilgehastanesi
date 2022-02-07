@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kalite Politikası</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Kontrol Paneli</a></li>
                            <li class="breadcrumb-item active">Kalite Politikası</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div style="text-align: right">
                            <a href="{{ route('admin.quality_policy.create') }}" class="btn mb-2" style="background-color: #1270a2!important;color: white">Ekle</a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Başlık</th>
                                        {{--<th>Kalite Politikası Yazı</th>--}}
                                        <th>Dosya 1</th>
                                        <th>Dosya 2</th>
                                        <th>Organizasyon Şeması</th>
                                        {{--<th>Organizasyon Şeması Yazı</th>--}}
                                        <th>Düzenle</th>
                                        <th>Sil</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($quality_policies as $quality)
                                        <tr>
                                            <td>{{ $quality->title }}</td>
                                            {{--<td>@if($quality->text === null) <i class="fa fa-times"></i> @else {!! \Illuminate\Support\Str::limit($quality->text, 100) !!} @endif</td>--}}
                                            <td>@if($quality->file1 === null) <i class="fa fa-times"></i> @else <a href="{{ asset('storage/corporate/quality_policies/' . $quality->file1) }}" target="_blank"><i class="fa fa-file"></i></a> @endif</td>
                                            <td>@if($quality->file2 === null) <i class="fa fa-times"></i> @else <a href="{{ asset('storage/corporate/quality_policies/' . $quality->file2) }}" target="_blank"><i class="fa fa-file"></i></a> @endif</td>
                                            <td>@if($quality->image === null) <i class="fa fa-times"></i> @else <img
                                                    src="{{ asset('storage/corporate/quality_policies/images/' . $quality->image) }}" class="rounded-circle" width="100" height="100" alt=""> @endif</td>
                                            {{--<td>@if($quality->text2 === null) <i class="fa fa-times"></i> @else {!! \Illuminate\Support\Str::limit($quality->text2, 100) !!} @endif</td>--}}
                                            <td>
                                                <a href="{{ route('admin.quality_policy.show', ['slug' => $quality->slug]) }}" class="btn btn-info">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.quality_policy.delete', ['slug' => $quality->slug]) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" onclick="return confirm('Kalite Politikasını silmek istediğinize emin misiniz? (Bu işlem geri ALINAMAZ)')" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        Henüz bir kayıt bulunamadı
                                    @endforelse
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Başlık</th>
                                        {{--<th>Kalite Politikası Yazı</th>--}}
                                        <th>Dosya 1</th>
                                        <th>Dosya 2</th>
                                        <th>Organizasyon Şeması</th>
                                        {{--<th>Organizasyon Şeması Yazı</th>--}}
                                        <th>Düzenle</th>
                                        <th>Sil</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection


@section('customJS')
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script>
        @if (\Illuminate\Support\Facades\Session::has('message'))
        toastr.{{ \Illuminate\Support\Facades\Session::get("status") }}("{{ \Illuminate\Support\Facades\Session::get('message') }}")
        @endif
    </script>
@endsection

@section('customCSS')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection
