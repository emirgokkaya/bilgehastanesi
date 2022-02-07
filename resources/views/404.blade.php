@extends('site.layouts.master')

@section('content')
    <!--Error Section-->
    <section class="error-section">
        <div class="auto-container">
            <div class="content-box">
                <figure class="error-image"><img src="{{ asset('images/icons/error.png') }}" alt=""></figure>
                <h2>Sayfa bulunamadı</h2>
                <div class="text">Aradığınız sayfa taşındı, kaldırıldı, yeniden adlandırıldı veya hiç var olmadı. Lütfen URL li kontrol edin</div>
                <a href="{{ route('site.homepage') }}" class="theme-btn btn-style-one"><span class="btn-title">Anasayfa</span></a>
            </div>
        </div>
    </section>
    <!--Error Section-->
@endsection
