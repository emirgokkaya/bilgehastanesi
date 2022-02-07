@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Slaytlar</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Kontrol Paneli</a></li>
                            <li class="breadcrumb-item active">Slaytlar</li>
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
                            <a href="{{ route('admin.slider.create') }}" class="btn mb-2" style="background-color: #1270a2!important;color: white">Ekle</a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Resim</th>
                                        <th>Başlık</th>
                                        <th>Span Başlık</th>
                                        {{--<th>İçerik</th>--}}
                                        <th>Buton 1</th>
                                        <th>Link 1</th>
                                        <th>Buton 2</th>
                                        <th>Link 2</th>
                                        <th>Düzenle</th>
                                        <th>Sil</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($sliders as $slider)
                                        <tr>
                                            <td><img src="{{ asset('storage/images/sliders/'.$slider->image) }}" class="img img-circle" width="100" height="100" alt=""></td>
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ $slider->span_title }}</td>
                                            {{--<td>{{ $slider->content }}</td>--}}
                                            <td>{{ $slider->button_text1 }}</td>
                                            <td>{{ $slider->link1 }}</td>
                                            <td>{{ $slider->button_text2 }}</td>
                                            <td>{{ $slider->link2 }}</td>
                                            <td>
                                                <a href="{{ route('admin.slider.show', ['slug' => $slider->slug]) }}" class="btn btn-info">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.slider.delete', ['slug' => $slider->slug]) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" onclick="return confirm('Silmek istediğinize emin misiniz? Bu işlem geri alınamaz !')" class="btn btn-danger">
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
                                        <th>Resim</th>
                                        <th>Başlık</th>
                                        <th>Span Başlık</th>
                                        {{--<th>İçerik</th>--}}
                                        <th>Buton 1</th>
                                        <th>Link 1</th>
                                        <th>Buton 2</th>
                                        <th>Link 2</th>
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
