@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Haber ve Duyurular</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Kontrol Paneli</a></li>
                            <li class="breadcrumb-item active">Haber ve Duyurular</li>
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
                            <a href="{{ route('admin.news_announcement.create') }}" class="btn mb-2" style="background-color: #1270a2!important;color: white">Ekle</a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Haber-Duyuru Adı</th>
                                        {{--<th>Haber-Duyuru İçerik</th>--}}
                                        <th>Resim</th>
                                        <th>Düzenle</th>
                                        <th>Sil</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($news_announcements as $news)
                                        <tr>
                                            <td>{{ $news->title }}</td>
                                            {{--<td>{!! \Illuminate\Support\Str::limit($news->content, 30) !!}</td>--}}
                                            <td><img src="{{ asset('storage/images/news_announcements/' . $news->image) }}" alt="{{ $news->title }}" class="img img-circle" width="100" height="100"></td>
                                            <td>
                                                <a href="{{ route('admin.news_announcement.show', ['slug' => $news->slug]) }}" class="btn btn-info">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.news_announcement.delete', ['slug' => $news->slug]) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" onclick="return confirm('Haber-Duyuru kaydını silmek istediğinize emin misiniz? (Bu işlem geri ALINAMAZ)')" class="btn btn-danger">
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
                                        <th>Haber-Duyuru Adı</th>
                                        {{--<th>Haber-Duyuru İçerik</th>--}}
                                        <th>Resim</th>
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
