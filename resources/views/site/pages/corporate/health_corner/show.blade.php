@extends('site.layouts.master')

@section('content')
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side / Our Blog-->
                <div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12 order-2">
                    <div class="service-detail">
                        <div class="images-box">
                            <figure class="image wow fadeIn"><a href="{{ asset('storage/images/health_corners/' . $corner->image) }}" class="lightbox-image" data-fancybox="services"><img src="{{ asset('storage/images/health_corners/' . $corner->image) }}" width="600" height="400" alt=""></a></figure>
                        </div>

                        <div class="content-box">
                            <div class="title-box">
                                <h2 class="text-center">{{ $corner->title }}</h2>
                            </div>
                            <p>{!! $corner->content !!}</p>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <ul class="list-group">
                                    @if(count($corner->doctors) > 0)
                                        <h5>İlgili Doktorlarımız</h5>
                                        <br>
                                    @endif
                                    @forelse($corner->doctors as $doctor)
                                        <a href="{{ route('site.doctor.detail', ['slug' => $doctor->slug]) }}">
                                            <li class="list-group-item list-group-item-action">
                                                {{ $doctor->degree . ' ' . $doctor->name . ' ' . $doctor->lastname }}
                                            </li>
                                        </a>

                                        <p>Görevli Olduğu Bölümler</p>
                                        @forelse($doctor->departments as $department)
                                            @if(!$loop->last)
                                                <a href="{{ route('site.department.detail', ['slug' => $department->slug]) }}"><span>{{ $department->name }},</span></a>
                                            @else
                                                <a href="{{ route('site.department.detail', ['slug' => $department->slug]) }}"><span>{{ $department->name }}</span></a>
                                            @endif
                                        @empty
                                        @endforelse
                                        <br>
                                    @empty
                                    @endforelse
                                </ul>
                                <i class="fa fa-calendar" style="color: #1270a2!important;"></i> {{ $corner->created_at->format('d/m/Y') }}
                            </div>
                        </div>


                    </div>
                </div>

                @include('site.pages.corporate.partials.sidebar')
            </div>
        </div>
    </div>
    <!-- End Sidebar Page Container -->
@endsection
