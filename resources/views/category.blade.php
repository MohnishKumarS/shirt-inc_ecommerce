@extends('layouts.userpage')

@section('title', 'Collections')

@section('content')

    {{-- ````````` CATEGORY SLIDER ```````````` --}}
    @if (count($categoryPoster) > 0)
        <section class="swiper-container js-swiper-slider slideshow full-width_padding swiper-number-pagination top_banners"
            data-settings='{
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": 1,
        "effect": "fade",
        "loop": true
      }'>
            <div class="swiper-wrapper">

                @foreach ($categoryPoster as $item)
                    <div class="swiper-slide">
                        <div class="overflow-hidden position-relative h-100">
                            <div class="slideshow-bg">
                                <a href="{{ url('category/' . $item->slug) }}" title="{{ $item->name }}">
                                    <img loading="lazy" src="{{ asset('image/category/poster/' . $item->poster) }}"
                                        width="1783" height="800" alt="{{ $item->slug }}"
                                        class="slideshow-bg__img object-fit-cover object-position-right">
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

            <div class="container d-none d-md-block">
                <div
                    class="slideshow-pagination slideshow-number-pagination d-flex align-items-center position-absolute bottom-0  position-xxl-right-center">
                </div>
            </div>
        </section>
    @endif

    <div class="pt-1 pb-5"></div>


    <div class="mb-4 pb-4"></div>
    <section class="lookbook container">
        <h2 class="page-title">COLLECTION LOOKBOOK</h2>
        <section class="lookbook-collection">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex flex-column">
                        @if (count($all_category) > 0)
                            <a href="{{ url('category/' . $all_category[0]->slug) }}"
                                class="lookbook-collection__item position-relative flex-grow-1 mb-4 effect border-plus">
                                <div class="lookbook-collection__item-image">
                                    <img loading="lazy" src="{{ asset('image/category/' . $all_category[0]->image) }}"
                                        width="690" height="399" alt="{{$all_category[0]->image}}">
                                </div>
                                <div class="content_abs content_bottom content_left content_bottom-md content_left-md">
                                    {{-- <p class="text-uppercase mb-1 white-color">STARTING AT Rs19</p> --}}
                                    {{-- <h3 class="white-color text-uppercase">{{ $all_category[0]->name }}</h3> --}}
                                </div>
                            </a>
                        @endif
                        @if (count($all_category) > 1)
                            <a href="{{ url('category/' . $all_category[1]->slug) }}"
                                class="lookbook-collection__item position-relative flex-grow-1 mb-4 effect border-plus">
                                <div class="lookbook-collection__item-image">
                                    <img loading="lazy" src="{{ asset('image/category/' . $all_category[1]->image) }}"
                                        width="690" height="399" alt="{{$all_category[1]->image}}">
                                </div>
                                <div class="content_abs content_bottom content_left content_bottom-md content_left-md">
                                    {{-- <p class="text-uppercase mb-1 white-color">STARTING AT Rs19</p> --}}
                                    {{-- <h3 class="white-color text-uppercase">{{ $all_category[1]->name }}</h3> --}}
                                </div>
                            </a>
                        @endif

                    </div>
                    <div class="col-lg-6">
                        @if (count($all_category) > 2)
                            <a href="{{ url('category/' . $all_category[2]->slug) }}"
                                class="lookbook-collection__item size-lg position-relative mb-4 effect border-plus">
                                <div class="lookbook-collection__item-image">
                                    <img loading="lazy" src="{{ asset('image/category/' . $all_category[2]->image) }}"
                                        width="690" height="826" alt="{{$all_category[2]->image}}">
                                </div>
                                <div class="content_abs content_bottom content_left content_bottom-md content_left-md">
                                    {{-- <p class="text-uppercase mb-1">STARTİNG AT Rs.39</p> --}}
                                    {{-- <h3 class="white-color text-uppercase">{{ $all_category[2]->name }}</h3> --}}
                                </div>
                            </a>
                        @endif

                    </div><!-- /.col-md-6 -->

                    <div class="col-lg-6">
                        @if (count($all_category) > 3)
                            <a href="{{ url('category/' . $all_category[3]->slug) }}"
                                class="lookbook-collection__item size-lg position-relative mt-1 mb-4 effect border-plus">
                                <div class="lookbook-collection__item-image">
                                    <img loading="lazy" src="{{ asset('image/category/' . $all_category[3]->image) }}"
                                        width="690" height="826" alt="{{$all_category[3]->image}}">
                                </div>
                                <div class="content_abs content_bottom content_left content_bottom-md content_left-md">
                                    {{-- <p class="text-uppercase mb-1">STARTİNG AT Rs.39</p> --}}
                                    {{-- <h3 class="white-color text-uppercase">{{ $all_category[3]->name }}</h3> --}}
                                </div>
                            </a>
                        @endif

                    </div><!-- /.col-md-6 -->
                    <div class="col-lg-6 d-flex flex-column">
                        @if (count($all_category) > 4)
                            <a href="{{ url('category/' . $all_category[4]->slug) }}"
                                class="lookbook-collection__item position-relative flex-grow-1 mt-1 mb-4 effect border-plus">
                                <div class="lookbook-collection__item-image">
                                    <img loading="lazy" src="{{ asset('image/category/' . $all_category[4]->image) }}"
                                        width="690" height="399" alt="{{$all_category[4]->image}}">
                                </div>
                                <div class="content_abs content_bottom content_left content_bottom-md content_left-md">
                                    {{-- <p class="text-uppercase mb-1">STARTING AT Rs.19</p> --}}
                                    {{-- <h3 class="white-color text-uppercase">{{ $all_category[4]->name }}</h3> --}}
                                </div>
                            </a>
                        @endif
                        @if (count($all_category) > 5)
                            <a href="{{ url('category/' . $all_category[5]->slug) }}"
                                class="lookbook-collection__item position-relative flex-grow-1 mt-1 mb-4 effect border-plus">
                                <div class="lookbook-collection__item-image">
                                    <img loading="lazy" src="{{ asset('image/category/' . $all_category[5]->image) }}"
                                        width="690" height="399" alt="{{$all_category[5]->image}}">
                                </div>
                                <div class="content_abs content_bottom content_left content_bottom-md content_left-md">
                                    {{-- <p class="text-uppercase mb-1">STARTING AT Rs.21</p> --}}
                                    {{-- <h3 class="white-color text-uppercase">{{ $all_category[5]->name }}</h3> --}}
                                </div>
                            </a>
                        @endif

                    </div>
                    <div class="col-lg-12 d-flex flex-column">
                        @if (count($all_category) > 6)
                            <a href="{{ url('category/' . $all_category[6]->slug) }}"
                                class="lookbook-collection__item position-relative flex-grow-1 mt-1 mb-4 effect border-plus">
                                <div class="lookbook-collection__item-image">
                                    <img loading="lazy" src="{{ asset('image/category/' . $all_category[6]->image) }}"
                                        width="690" height="399" alt="{{$all_category[6]->image}}">
                                </div>
                                <div class="content_abs content_bottom content_left content_bottom-md content_left-md">
                                    {{-- <p class="text-uppercase mb-1">STARTING AT Rs19</p> --}}
                                    {{-- <h3 class="white-color text-uppercase">{{ $all_category[6]->name }}</h3> --}}
                                </div>
                            </a>
                        @endif

                    </div>
                </div>
            </div>
        </section>
    </section>


@endsection
