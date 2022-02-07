<!--Sidebar Side-->
<div class="sidebar-side col-xl-3 col-lg-4 col-md-12 col-sm-12">
    <aside class="sidebar services-sidebar">

        <!-- Category Widget -->
        <div class="sidebar-widget categories">
            <div class="widget-content">
                <!-- Services Category -->
                <ul class="services-categories">
                    <li class="{{ request()->is('kurumsal/hakkimizda') ? 'active' : '' }}"><a href="{{ route('site.about') }}">Hakkımızda</a></li>
                    <li class="{{ request()->is('kurumsal/misyon-vizyon') ? 'active' : '' }}"><a href="{{ route('site.mission.vision') }}">Misyon & Vizyon</a></li>
                    <li class="{{ request()->is('kurumsal/ortaklik-yapisi') ? 'active' : '' }}"><a href="{{ route('site.partners') }}">Ortaklık Yapısı</a></li>
                    <li class="{{ request()->is('kurumsal/yonetim-kurulu') ? 'active' : '' }}"><a href="{{ route('site.board.of.directors') }}">Yönetim Kurulu</a></li>
                    <li class="{{ request()->is('kurumsal/bashekimlik') ? 'active' : '' }}"><a href="{{ route('site.administrative.team') }}">Başhekimlik</a></li>
                    <li class="{{ request()->is('kurumsal/bashekimimizden') ? 'active' : '' }}"><a href="{{ route('site.chief.physician') }}">Başhekimimizden</a></li>
                    <li class="{{ request()->is('kurumsal/anlasmali-kurumlar') ? 'active' : '' }}"><a href="{{ route('site.contracted.institutions') }}">Anlaşmalı Kurumlar</a></li>
                    <li class="{{ request()->is('kurumsal/kalite-politikasi') ? 'active' : '' }}"><a href="{{ route('site.quality-policy.blade.php') }}">Kalite Yönetim Sistemi</a></li>
                    <li class="{{ request()->is('kurumsal/saglik-kosesi*') ? 'active' : '' }}"><a href="{{ route('site.health.corner') }}">Sağlık Köşesi</a></li>
                    <li class="{{ request()->is('kurumsal/haberler-ve-duyurular*') ? 'active' : '' }}"><a href="{{ route('site.news.announcements') }}">Haberler & Duyurular</a></li>
                    <li class="{{ request()->is('kurumsal/video-galeri') ? 'active' : '' }}"><a href="{{ route('site.video.gallery') }}">Galeri</a></li>
                    <li class="{{ request()->is('kurumsal/basinda-biz') ? 'active' : '' }}"><a href="{{ route('site.in.the.press') }}">Basında Biz</a></li>
                    <li class="{{ request()->is('kurumsal/saglik-rehberi') ? 'active' : '' }}"><a href="{{ route('site.health.guide') }}">Sağlık Rehberi</a></li>
                    <li class="{{ request()->is('kurumsal/refakatci-ve-ziyaretci-politikamiz') ? 'active' : '' }}"><a href="{{ route('site.companion.visitor.policy') }}">Refakatçi ve Ziyaretçi Politikamız</a></li>
                    <li class="{{ request()->is('kurumsal/hasta-haklari') ? 'active' : '' }}"><a href="{{ route('site.patient_right') }}">Hasta Hakları</a></li>


                    <li class="{{ request()->is('kurumsal/insan-kaynaklari/kariyer*') ? 'active' : '' }} {{ request()->is('kurumsal/insan-kaynaklari/is-basvurusu*') ? 'active' : '' }}">
                        <a href="{{ route('site.human.resources.career') }}">İnsan Kaynakları</a>
                    </li>


                   {{-- <li class="{{ request()->is('kurumsal/insan-kaynaklari/kariyer*') ? 'active' : '' }}"><a href="{{ route('site.human.resources.career') }}">Kariyer</a></li>
                    <li class="{{ request()->is('kurumsal/insan-kaynaklari/is-basvurusu*') ? 'active' : '' }}"><a href="{{ route('site.human.resources.job.application.get') }}">Açık Pozisyonlar</a></li>--}}
                    <li class="{{ request()->is('kurumsal/kvkk*') ? 'active' : '' }}"><a href="{{ route('site.kvkk') }}" target="_blank">Kişisel Verilerin Korunma Kanunu</a></li>
                </ul>
            </div>
        </div>
    </aside>
</div>
