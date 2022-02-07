@extends('site.layouts.master')

@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image: url(@if(!isset($banner->image)) {{ asset('images/background/8.jpg') }} @else {{ asset('storage/images/banners/cropped_1920_500/' . $banner->image) }} @endif );">
        <div class="auto-container">
            <div class="title-outer" style="background-color: rgba(255, 255, 255, 0.8)">
                <h1>Tıbbi Bölümlerimiz</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('site.homepage') }}">Anasayfa</a></li>
                    <li>Tıbbi Bölümlerimiz</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Services Section -->
    <section class="services-section-two">
        <div class="auto-container">

            {{----}}

            <div class="carousel-outer">

                <div class="row ml-2 mr-2">
                    <div class="col-md-12 col-sm-12">
                        <div class="row mb-5">
                            <div class="col-12">
                                <form action="{{ route('site.department.detail.search') }}" method="GET" class="form-group">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <select name="search" id="search-department-select" class="form-control">
                                                <option value="" selected>Tıbbi Birim Seçiniz ...</option>
                                                @forelse($departments_list as $department)
                                                    <option value="{{ $department->slug }}">{{ $department->name }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                        {{--<div class="col-md-2 col-sm-12">
                                            <button type="submit" class="btn btn-block" style="color: white; background-color: #1270a2"><i class="fa fa-search"></i></button>
                                        </div>--}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="row mb-5">
                            <div class="col-12">
                                <form action="{{ route('site.department.search') }}" method="GET" class="form-group">
                                    <div class="row">
                                        <div class="col-md-10 col-sm-12">
                                            <input type="text" name="department" class="form-control" placeholder="Ara ...">
                                        </div>
                                        <div class="col-md-2 col-sm-2">
                                            <button type="submit" class="btn btn-block" style="color: white; background-color: #1270a2"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="row">
                    <!-- service Block -->
                    @forelse($departments as $department)
                        <div class="service-block-two col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href="{{ route('site.department.detail', ['slug' => $department->slug]) }}"><img src="{{ asset('storage/images/departments/' . $department->image) }}" width="370" height="270" alt=""></a></figure>
                                </div>
                                <div class="lower-content">
                                    <div class="title-box">
                                        {{--<span class="icon flaticon-heart-2"></span>--}}
                                        <h4><a href="{{ route('site.department.detail', ['slug' => $department->slug]) }}">{{ $department->name }}</a></h4>
                                    </div>
                                    <div class="text">{!! \Illuminate\Support\Str::limit($department->content, 80) !!}</div>
                                    {{--<span class="icon-right flaticon-heart-2"></span>--}}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="service-block-two col-lg-12 col-md-12 col-sm-12 text-center">
                            <h5>Tıbbi Bölüm Bulunamadı</h5>
                        </div>
                    @endforelse
                </div>

                {{--{{ $departments->links('site.partials.pagination') }}--}}
                {{ $departments->appends(request()->except('page'))->links('site.partials.pagination') }}
            </div>
        </div>
    </section>
    <!-- End service Section -->
@endsection

@section('customJS')
    <script>
        $('#search-department-select').on('change', function() {
            $.ajax({
                type: 'GET',
                url: '{{config("APP_NAME")}}/bolum-ara?search=' + this.value,
                success: () => {
                    window.location.href = '{{config("APP_NAME")}}/bolum-ara?search=' + this.value;
                }
            })
        });
    </script>
@endsection
