@extends('layouts.userpage')

@section('title', 'Themes')

@section('content')

<main>
       
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
  
</main>

@endsection
