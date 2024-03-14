@extends('layouts.userpage')

@section('title', 'Themes')

@section('content')

      {{-- ````````` THEMES SLIDER ```````````` --}}

      <section class="swiper-container js-swiper-slider slideshow full-width_padding swiper-number-pagination top_banners" data-settings='{
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": 1,
        "effect": "fade",
        "loop": true
      }'>
    <div class="swiper-wrapper">
        
  
        @foreach ($themePoster as $item)
        <div class="swiper-slide">
          <div class="overflow-hidden position-relative h-100">
              <div class="slideshow-bg">
                <a href="{{ url('themes/'.$item->slug) }}" title="{{$item->name}}" >
                  <img loading="lazy" src="{{ asset('image/themes/poster/' . $item->poster) }}" width="1783" height="800" alt="{{$item->slug}}" class="slideshow-bg__img object-fit-cover object-position-right">
                </a>
              </div>
         
          </div>
      </div>
        @endforeach
  
    </div>
  
    <div class="container">
        <div class="slideshow-pagination slideshow-number-pagination d-flex align-items-center position-absolute bottom-0 mb-5 position-xxl-right-center">
        </div>
    </div>
  </section>
      <div class="pt-1 pb-5"></div>

       
  <div class="mb-3 mb-md-4 mb-xl-5 pb-2 pt-1"></div>

  <section class="grid-banner container mb-3" id="section-grid-banner">
      <div class="row lookbook">
          <h2 class="page-title">Themes Collections</h2>
          
          @forelse ($themes as $item)
          <div class="col-lg-4">
            <a href="{{url('themes/'.$item->slug)}}">
              <div class="grid-banner__item position-relative mb-3">
                <img loading="lazy" class="w-100 h-auto" src="{{asset('image/themes/'.$item->image)}}" width="450" height="450" alt="{{$item->name}}">
            </div>
            </a>
        </div>
          @empty
              
          @endforelse
        
      </div>
  </section>
  


@endsection
