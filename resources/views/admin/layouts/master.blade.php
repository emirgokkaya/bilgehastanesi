<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ env('APP_NAME') }} | Yönetim</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="{{ asset('css/font-source-sans-pro.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('images/logofav.png') }}" type="image/x-icon">


    @yield('customCSS')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" target="_blank" href="{{ route('site.homepage') }}" role="button">
                    Siteye Git <i class="fa fa-angle-double-right"></i>
                </a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->

            @if(auth()->user()->role === "admin")
            <li class="nav-item mr-5">
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="power" class="custom-control-input" onchange="powerStatus('customSwitch1')" id="customSwitch1" @isset($site_status) @if($site_status->site_status) checked @else @endif @endisset>
                        <label class="custom-control-label" for="customSwitch1">Siteyi Yayına Aç/Kapat</label>
                    </div>
                </div>
            </li>
            @endif

            <li class="nav-item">
                <form action="{{ route('logout.post') }}" method="POST">
                    @csrf
                    <button class="btn btn-block" style="background-color: #1270a2!important; color: white" type="submit">Çıkış</button>
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('admin.dashboard') }}" class="brand-link">
            <img src="{{ asset('images/logo.svg') }}" alt="Bilge Hastanesi" class="brand-image" width="500" height="150">
            <span class="brand-text font-weight-light">Yönetim Paneli</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex p-3 @if(request()->is('yonetim-paneli/profil*')) bg-primary rounded @endif">
                <div class="image">
                    <img src="
                        @if(auth()->user()->profile_photo === null or auth()->user()->profile_photo === "")
                            {{ asset('images/default-user.png') }}
                        @else
                            {{ asset('storage/images/users/' . auth()->user()->profile_photo) }}
                        @endif
                    " class="rounded" alt="User Image">
                </div>
                <div class="info text-center">
                    <a href="{{ route('admin.profil') }}" class="d-block">{{ auth()->user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('yonetim-paneli') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Kontrol Paneli
                            </p>
                        </a>
                    </li>

                    @if(auth()->user()->role === "admin")
                    <li class="nav-item has-treeview">
                        <a href="{{ route('admin.users') }}" class="nav-link {{ request()->is('yonetim-paneli/kullanicilar*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Kullanıcılar
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="{{ route('admin.banners') }}" class="nav-link {{ request()->is('yonetim-paneli/sayfa-kapagi*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-image"></i>
                            <p>
                                Sayfa Kapak Resimleri
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.top_features') }}" class="nav-link {{ request()->is('yonetim-paneli/top-feature*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-sort-amount-up-alt"></i>
                            <p>
                                Top Feature
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="{{ route('admin.sliders') }}" class="nav-link {{ request()->is('yonetim-paneli/slaytlar*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Slayt
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="{{ route('admin.homepage_information_title.get') }}" class="nav-link {{ request()->is('yonetim-paneli/bilgi-anasayfa-baslik*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-info"></i>
                            <p>
                                Bilgilendirme Başlık
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="{{ route('admin.homepage_informations') }}" class="nav-link {{ request()->is('yonetim-paneli/anasayfa-bilgilendirme*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-info"></i>
                            <p>
                                Bilgilendirme
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.departments') }}" class="nav-link {{ request()->is('yonetim-paneli/bolumler*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Bölümler
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.summaries') }}" class="nav-link {{ request()->is('yonetim-paneli/bilgilendirme*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-sort-amount-up-alt"></i>
                            <p>
                                Bölüm Ek İçerikler
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.services') }}" class="nav-link {{ request()->is('yonetim-paneli/hizmetler*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-concierge-bell"></i>
                            <p>
                                Hizmetler
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.service_summaries') }}" class="nav-link {{ request()->is('yonetim-paneli/hizmet-bilgilendirme*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-sort-amount-up-alt"></i>
                            <p>
                                Hizmet Ek İçerikler
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.oservices') }}" class="nav-link {{ request()->is('yonetim-paneli/diger-hizmetler*') ? 'active' : '' }}">
                            <i class="nav-icon fab fa-creative-commons-nd"></i>
                            <p>
                                Sağlık Hizmetleri
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.other_service_summaries') }}" class="nav-link {{ request()->is('yonetim-paneli/diger-hizmet-bilgilendirme*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-sort-amount-up-alt"></i>
                            <p>
                                Sağlık Hizmeti Ek İçerikler
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="{{ route('admin.doctors') }}" class="nav-link {{ request()->is('yonetim-paneli/doktorlar*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-user-md"></i>
                            <p>
                                Doktorlar
                            </p>
                        </a>
                    </li>


                    {{-- <li class="nav-item has-treeview">
                         <a href="{{ route('admin.fuses') }}" class="nav-link {{ request()->is('yonetim-paneli/anlasmali-kurumlar*') ? 'active' : '' }}">
                             <i class="nav-icon fas fa-business-time"></i>
                             <p>
                                 Anlaşmalı Kurumlar
                             </p>
                         </a>
                     </li>--}}

                    <li class="nav-item has-treeview">
                        <a href="{{ route('admin.working_times') }}" class="nav-link {{ request()->is('yonetim-paneli/calisma-saatleri*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-clock"></i>
                            <p>
                                Çalışma Saatleri
                            </p>
                        </a>
                    </li>

                    {{--<li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-calendar-alt"></i>
                            <p>
                                Online İşlemler
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Online Randevu</p>
                                </a>
                            </li>
                           --}}{{-- <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Randevu İptali</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tahlil Sonuçları</p>
                                </a>
                            </li>--}}{{--
                        </ul>
                    </li>--}}
                    @endif

                    <li class="nav-item has-treeview @if (request()->is('yonetim-paneli/kurumsal*')) menu-open @endif">
                        <a href="#" class="nav-link @if (request()->is('yonetim-paneli/kurumsal*')) active @endif">
                            <i class="nav-icon fa fa-building"></i>
                            <p>
                                Kurumsal
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" @if (request()->is('yonetim-paneli/kurumsal*')) style="display: block" @else style="display: none" @endif>
                            @if(auth()->user()->role === "admin")
                            <li class="nav-item">
                                <a href="{{ route('admin.corporate.about.get') }}" class="nav-link @if(request()->is('yonetim-paneli/kurumsal/hakkimizda*')) active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Hakkımızda</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.corporate.mission_vision.get') }}" class="nav-link @if(request()->is('yonetim-paneli/kurumsal/misyon-vizyon*')) active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Misyon & Vizyon</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.partners') }}" class="nav-link @if(request()->is('yonetim-paneli/kurumsal/ortaklik-paylari*')) active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ortaklık Payı</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.board_of_directors') }}" class="nav-link {{ request()->is('yonetim-paneli/kurumsal/yonetim-kurulu*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Yönetim Kurulu</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.administrative_teams') }}" class="nav-link {{ request()->is('yonetim-paneli/kurumsal/bashekimlik*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Başhekimlik</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.corporate.chief_physician.get') }}" class="nav-link {{ request()->is('yonetim-paneli/kurumsal/bashekimimizden*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Başhekimimizden</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.fuses') }}" class="nav-link {{ request()->is('yonetim-paneli/kurumsal/anlasmali-kurumlar*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Anlaşmalı Kurumlar</p>
                                </a>
                            </li>



                            <li class="nav-item">
                                <a href="{{ route('admin.quality_policies') }}" class="nav-link {{ request()->is('yonetim-paneli/kurumsal/kalite-politikalari*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kalite Politikası</p>
                                </a>
                            </li>



                            <li class="nav-item">
                                <a href="{{ route('admin.galleries') }}" class="nav-link {{ request()->is('yonetim-paneli/kurumsal/galeri*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Galeri</p>
                                </a>
                            </li>

                            <li class="nav-item has-treeview @if (request()->is('yonetim-paneli/kurumsal/insan-kaynaklari*')) menu-open @endif">
                                <a href="#" class="nav-link {{ request()->is('yonetim-paneli/kurumsal/insan-kaynaklari*') ? 'bg-secondary' : '' }}">
                                    <i class="nav-icon fas fa-circle"></i>
                                    <p>
                                        İnsan Kaynakları
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" @if (request()->is('yonetim-paneli/kurumsal/insan-kaynaklari*')) style="display: block" @else style="display: none" @endif>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.human.resource.career.get') }}" class="nav-link {{ request()->is('yonetim-paneli/kurumsal/insan-kaynaklari/kariyer*') ? 'active' : '' }}">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Kariyer</p>
                                        </a>
                                    </li>
                                    {{--<li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>İş Başvurusu</p>
                                        </a>
                                    </li>--}}
                                </ul>
                            </li>
                            @endif
                            @if(auth()->user()->role === "admin")
                            <li class="nav-item">
                                <a href="{{ route('admin.news_announcements') }}" class="nav-link {{ request()->is('yonetim-paneli/kurumsal/haberler-duyurular*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Haberler & Duyurular</p>
                                </a>
                            </li>
                            @endif
                            @if(auth()->user()->role === "admin")
                            <li class="nav-item">
                                <a href="{{ route('admin.in_the_press') }}" class="nav-link {{ request()->is('yonetim-paneli/kurumsal/basinda-biz*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Basında Biz</p>
                                </a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a href="{{ route('admin.health_corners') }}" class="nav-link {{ request()->is('yonetim-paneli/kurumsal/saglik-kosesi*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sağlık Köşesi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.health_guides') }}" class="nav-link {{ request()->is('yonetim-paneli/kurumsal/saglik-rehberi*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sağlık Rehberi</p>
                                </a>
                            </li>
                            @if(auth()->user()->role === "admin")
                                <li class="nav-item">
                                    <a href="{{ route('admin.corporate.patient_rights.get') }}" class="nav-link {{ request()->is('yonetim-paneli/kurumsal/hasta-haklari*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Hasta Hakları</p>
                                    </a>
                                </li>
                            @endif

                            @if(auth()->user()->role === "admin")
                            <li class="nav-item">
                                <a href="{{ route('admin.corporate.companion_visitor_policy.get') }}" class="nav-link {{ request()->is('yonetim-paneli/kurumsal/refakatci-ve-ziyaretci-politikamiz*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Refakatçi ve Ziyaretçi Politikamız</p>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>

                    @if(auth()->user()->role === "admin")
                    <li class="nav-item has-treeview @if (request()->is('yonetim-paneli/iletisim*')) menu-open @endif">
                        <a href="#" class="nav-link @if(request()->is('yonetim-paneli/iletisim*')) active @endif">
                            <i class="nav-icon fa fa-phone-alt"></i>
                            <p>
                                İletişim
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.contact') }}" class="nav-link @if(request()->is('yonetim-paneli/iletisim/iletisim-bilgileri*')) active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>İletişim Bilgileri</p>
                                </a>
                            </li>
                            {{--<li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nasıl Giderim ?</p>
                                </a>
                            </li>--}}
                           {{-- <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Görüş ve Önerileriniz</p>
                                </a>
                            </li>--}}
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.corporation.index') }}" class="nav-link {{ (request()->is('yonetim-paneli    /ayarlar*')) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-cog"></i>
                            <p>Ayarlar</p>
                        </a>
                    </li>

                    @endif


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

   @yield('content')

    <footer class="main-footer">
        <strong>Copyright &copy; 2000-{{ date('Y') }} <a href="{{ route('site.homepage') }}">Bilge Hastanesi</a>.</strong>
        Tüm Hakları Saklıdır.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

<script>
    function powerStatus(clickedid) {
        var accept = confirm("Bu değişikliği onaylıyor musunuz ?");
        if (accept === false) {
            document.getElementById(clickedid).checked = !document.getElementById(clickedid).checked
        }
        if (accept === true) {
            $.ajax({
                type: "GET",
                url: '{{ env('APP_URL') }}' + '/yonetim-paneli/site-aktif-pasif',
                success: function (response) {
                    console.log(response)
                }
            })
        }
    }
</script>

@yield('customJS')

</body>
</html>
