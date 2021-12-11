@extends('layouts.base')

@section('title', 'Our Products')

@section('content')
    <x-banner page-title="Our product">
        OUR <br> <span>PRODUCTS</span>
    </x-banner>
   <section>
       <!--PRODUCTS START-->
       <div class="container">
           <div class="row">
               <div class="col-lg-3">
                   <div class="post-list">
                       <a href="#">
                           <figure class="post-preview">
                               <img src="img/images/garri.jpg" alt="">
                               <div class="post-overlay"></div>
                           </figure>
                       </a>
                       <div class="post-caption">
                           <h3>GARRI</h3>
                           <p>Currently in stock</p>
                           <br>
                           <h5><a href="{{url('contact-us')}}">PLACE ORDER NOW</a></h5>
                       </div>
                   </div>
               </div>
               <div class="col-lg-3">
                   <div class="post-list">
                       <a href="#">
                           <figure class="post-preview">
                               <img src="img/images/cassava-flour.jpg" alt="">
                               <div class="post-overlay"></div>
                           </figure>
                       </a>
                       <div class="post-caption">
                           <h3>CASSAVA FLOUR</h3>
                           <p>Currently in stock</p>
                           <br>
                           <h5><a href="{{url('contact-us')}}">PLACE ORDER NOW</a></h5>
                       </div>
                   </div>
               </div>
               <div class="col-lg-3">
                   <div class="post-list">
                       <a href="#">
                           <figure class="post-preview">
                               <img src="img/images/maize-cobs.jpg" alt="">
                               <div class="post-overlay"></div>
                           </figure>
                       </a>
                       <div class="post-caption">
                           <h3>MAIZE COB</h3>
                           <p>Currently in stock</p>
                           <br>
                           <h5><a href="{{url('contact-us')}}">PLACE ORDER NOW</a></h5>
                       </div>
                   </div>
               </div>
               <div class="col-lg-3">
                   <div class="post-list">
                       <a href="#">
                           <figure class="post-preview">
                               <img src="img/images/palm-oil.jpg" alt="">
                               <div class="post-overlay"></div>
                           </figure>
                       </a>
                       <div class="post-caption">
                           <h3>PALM OIL</h3>
                           <p>Currently in stock</p>
                           <br>
                           <h5><a href="{{url('contact-us')}}">PLACE ORDER NOW</a></h5>
                       </div>
                   </div>
               </div>
           </div>
           {{--            <div class="row justify-content-center">--}}
           {{--                <div class="btn-more-box">--}}
           {{--                    <a class="btn-hover-corner" href="{{ url('our-products') }}">LEARN MORE</a>--}}
           {{--                </div>--}}
           {{--            </div>--}}
       </div>
       <!--PRODUCTS END-->
   </section>
@endsection
