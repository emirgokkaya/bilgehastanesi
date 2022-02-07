@extends('site.layouts.master')

@section('content')
    <!--Page Title-->
    {{-- <section class="page-title" style="background-image: url({{ asset('images/background/8.jpg') }});">
         <div class="auto-container">
             <div class="title-outer">
                 <h1>Refakatçi ve Ziyaretçi Politikamız</h1>
                 <ul class="page-breadcrumb">
                     <li><a href="{{ route('site.homepage') }}">Anasayfa</a></li>
                     <li>Refakatçi ve Ziyaretçi Politikamız</li>
                 </ul>
             </div>
         </div>
     </section>--}}
    <!--End Page Title-->

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side / Our Blog-->
                <div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12 order-2">
                    @if(isset($patient_right))
                        <div class="service-detail">
                            <div class="content-box">
                                {!! $patient_right->content !!}
                            </div>
                        </div>
                    @else
                        <div class="col-12 text-center">
                            <p>Henüz içerik kaydı mevcut değil</p>
                        </div>
                    @endif
                </div>


                @include('site.pages.corporate.partials.sidebar')
            </div>
        </div>
    </div>
    <!-- End Sidebar Page Container -->
@endsection
