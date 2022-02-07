@extends('site.layouts.master')

@section('content')
    <!--Page Title-->
    <section class="page-title text-left" style="background-color: rgba(18, 112, 162, 1)">
        <div class="auto-container">
            <div class="title-outer">
                <h1 style="color: white!important;">Kişisel Verileri Koruma Kanunu</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.homepage') }}" style="color: black">Anasayfa</a></li>
                    <li style="color: white;">KVKK</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Terms And Conditions -->
    <section class="terms-and-condition">
        <div class="auto-container">
            <div class="tnc-tabs tabs-box">
                <div class="row">
                    <div class="column col-12">
                        <!--Tabs Container-->
                        <div class="tabs-content">
                            @if(isset($corporate->kvkk))
                                {!! $corporate->kvkk !!}
                            @else
                                Henüz içerik mevcut değil
                            @endif
                        </div>
                        <div class="tabs-content">
                            @isset($corporate->application_form)<a href="{{ asset('storage/corporate/' . $corporate->application_form) }}" target="_blank">Başvuru Formu</a>@endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Terms And Conditions -->
@endsection
