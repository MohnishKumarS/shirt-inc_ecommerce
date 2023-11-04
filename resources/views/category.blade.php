@extends('layouts.userpage')

@section('title','Collections')

@section('content')

<section class="mt-5">
    <style>
        body{
            background: #222;
        }
    </style>
    <div class="container pb-5 ">
   
        <div class="all-collection-block">
            {{-- ---- title head --- --}}
            {{-- <div class="row mb-5 pb-3">
                <div class="col-lg-12 heading-section text-center">
                    <h1 class="big-title">collection</h1>
                    <h2 class="mb-4">our collections</h2>
                </div>
            </div> --}}
            <div class="title-show">
                <h1 class="glows">fashionable </h1>
            </div>

            {{-- ----- all coll list --- --}}
            <div class="collection-list">
                <div class="row gy-5">
                    @forelse ($all_category as $val)
                        
                    {{-- -- loop iteration -- --}}
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card">
                            <div class="imgBx">
                                <img src="{{asset('image/category/'.$val->image)}}" alt="collection-image" loading="lazy">
                            </div>
                            <div class="details">
                                <h2>{{$val->name}}</h2>
                                <div>
                                    <a class="btn-float" href="{{url('category/'.$val->slug)}}">Shop now</a>
                                </div>
                            </div>
                          </div>
                       </div>
                    @empty
                        
                    @endforelse
                
                  
               
                </div>
            </div>
        </div>

 <style>

  body{
      /* background: #212121;    */
      /* padding: 200px 0; */
  }
  /* .box{
    width: 1200px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    grid-gap: 15px;
    margin: 0 auto;
  } */
  .collection-list .btn-float{
    display: inline-block;
    padding: 4px 14px !important
  }
  .card{
    position: relative;
    width: 300px;
    height: 350px;
    background: #fff;
    margin: 0 auto;
    border-radius: 4px;
    box-shadow:0 2px 10px rgba(0,0,0,.2);
  }
  .card:before,
  .card:after
  {
    content:"";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 4px;
    background: #fff;
    transition: 0.5s;
    z-index:-1;
  }
  .card:hover:before{
  transform: rotate(20deg);
  box-shadow: 0 2px 20px rgba(0,0,0,.2);
  }
  .card:hover:after{
  transform: rotate(10deg);
  box-shadow: 0 2px 20px rgba(0,0,0,.2);
  }
  .card .imgBx{
  position: absolute;
  top: 10px;
  left: 10px;
  bottom: 10px;
  right: 10px;
  background: #222;
  transition: 0.5s;
  z-index: 1;
  }
  
  .card:hover .imgBx
  {
    bottom: 80px;
  }

  .card .imgBx img{
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
  }

  .card .details{
      position: absolute;
      left: 10px;
      right: 10px;
      bottom: 10px;
      height: 70px;
      text-align: center;
  }

  .card .details h2{
   margin: 0;
   padding: 0;
   margin-bottom:4px ;
   font-weight: 600;
   font-size: 20px;
   color: #777;
   text-transform: uppercase;
  } 

  .card .details h2 span{
  font-weight: 500;
  font-size: 16px;
  color: #f38695;
  display: block;
  margin-top: 5px;
   } 
 </style>
        
       
    
    
    </div>
</section>


@endsection
