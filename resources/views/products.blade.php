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
               <div class="col-lg-6">
                   <div class="product-info">
                       <h2>MAIZE</h2>
                       <p>Maize is the most important cereal grain in the world, providing nutrients for humans and animals and serving as a basic raw material for the production of starch, oil and protein, alcoholic beverages, food sweeteners and, more recently, fuel. </p>
                       <p> In 2018, Africa produced around 75 million tons of Maize, accounting for 7.5 percent of global maize production. </p>
                       <p>Maize accounts for approximately 24 percent of farmland in Africa with an average yield of about 2 tons/hectare/year. Nigeria is the largest African producer, with over 33 million tons. An IITA Nigeria Food Consumption and Nutrition Survey conducted in 2003 revealed that maize and its derivatives are consumed over four times a week, almost every day, which shows that it is a preferred staple food among households due to its availability and affordability. </p>
                       <p>Sweet maize kernels are composed of 76% water, 19% carbohydrates, 3% protein, and 1% fat.</p>
                       <div class="btn-more-box"><a class="btn-hover-corner" href="{{ url('our-products/maize') }}">LEARN MORE</a></div>
                   </div>
               </div>
               <div class="col-lg-6 space-break">
                   <div class="product-box-img">
                       <figure class="product-media"><img src="img/images/product1.jpg" alt=""></figure>
                   </div>
               </div>
           </div>
       </div>

       <div class="container">
           <div class="row">
               <div class="order-last order-md-6 col-lg-6  space-break">
                   <div class="product-box-img">
                       <figure class="product-media"><img src="img/images/product2.jpg" alt=""></figure>
                   </div>
               </div>
               <div class="order-first order-md-6 col-lg-6">
                   <div class="product-info">
                       <h2>CASSAVA</h2>
                       <p>Cassava is the third-largest source of food carbohydrates in the tropics, after rice and maize. </p>
                       <p> Cassava is a major staple food in the developing world, providing a basic diet for over half a billion people. It is one of the most drought-tolerant crops, capable of growing on marginal soils. Nigeria is the world's largest producer of cassava, and it is predominantly consumed in boiled form, but substantial quantities are used to extract cassava starch, which is used for food, animal feed, and industrial purposes. </p>
                       <p>Raw cassava is made up of 60% water, 38% carbohydrates, 1% protein, and has negligible fat.</p>
                       <div class="btn-more-box"><a class="btn-hover-corner" href="{{ url('our-products/cassava') }}">LEARN MORE</a></div>
                   </div>
               </div>
           </div>
       </div>

       <div class="container">
           <div class="row">
               <div class="col-lg-6">
                   <div class="product-info">
                       <h2>PALM OIL</h2>
                       <p>Palm oil is obtained from the fruit of the oil palm tree. As of 2018, Nigeria was the third-largest producer, with approximately 2.3 million hectares (5.7 million acres) under cultivation, both small- and large-scale producers participated in the industry. </p>
                       <p> The oil palm produces bunches containing many fruits with the fleshy mesocarp enclosing a kernel that is covered by a very hard shell. </p>
                       <p>Palm oil is naturally reddish in color because of a high beta-carotene content. Palm oil is a common cooking ingredient in the tropical belt of Africa, Southeast Asia and parts of Brazil. Its use in the commercial food industry is widespread because of its lower cost and the high oxidative stability (saturation). </p>
                       <p>Palm oil, like all fats, is composed of fatty acids, esterified with glycerol.</p>
                       <div class="btn-more-box"><a class="btn-hover-corner" href="{{ url('our-products/palm-oil') }}">LEARN MORE</a></div>
                   </div>
               </div>
               <div class="col-lg-6 space-break">
                   <div class="product-box-img">
                       <figure class="product-media"><img src="img/images/product3.jpg" alt=""></figure>
                   </div>
               </div>
           </div>
       </div>

       <!--PRODUCTS END-->
   </section>
@endsection
