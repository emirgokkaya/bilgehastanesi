@extends('site.layouts.master')

@section('content')
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side / Our Blog-->
                <div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12 order-2">
                    <div class="service-detail">
                        <div class="images-box">
                            <figure class="image wow fadeIn"><a href="{{ asset('storage/images/news_announcements/' . $new->image) }}" class="lightbox-image" data-fancybox="services"><img src="{{ asset('storage/images/news_announcements/' . $new->image) }}" width="600" height="400" alt=""></a></figure>
                        </div>

                        <div class="content-box">
                            <div class="title-box">
                                <h2 class="text-center">{{ $new->title }}</h2>
                            </div>
                            <p>Resofus combines MR imaging and focused ultrasound into MR guided Focused Ultrasound technology, and provides a transcranial, non-invasive image-guided personalized treatment modality with no incisions and with no ionizing radiation.</p>
                            <p>This combination of continuous MR imaging and very highly focused acoustic sound waves provides the ability to provide pinpoint precision treatment at the planned target, without causing damage to any of the normal surrounding tissue. This precise local lesioning stops the improper transfer of electrical signals that induce the tremor, and it stops.</p>
                        </div>
                        <div>
                            <i class="fa fa-calendar" style="color: #1270a2"></i> {{ $new->created_at->format('d/m/Y') }}
                        </div>
                    </div>
                </div>

                @include('site.pages.corporate.partials.sidebar')
            </div>
        </div>
    </div>
    <!-- End Sidebar Page Container -->
@endsection
