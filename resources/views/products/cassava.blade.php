@extends('layouts.base')

@section('title', 'Cassava Investment')

@section('content')
    <x-banner page-title="cassava investment">
        CASSAVA <br> <span>INVESTMENT</span>
    </x-banner>
    <section>

        <!--PRODUCTS START-->

        <div class="container">
            <div class="row">

                <div class="order-first order-md-12 col-lg-12">
                    <div class="product-info">
                        <h2>CASSAVA</h2>
                        <p>Our Cassava investment package is classified into two (2) categories in relation to the number of plots of farmland you intend to purchase.</p>
                        <ul>
                            <li><p>1 Plot of Land – N50,000</p></li>
                            <li><p>1 Arce of Land – N250,000</p></li>
                        </ul>

                        <h5>How Does It Work?</h5>
                         <p>Upon payment for the preferred category of Cassava investment package, Oasis Agro Enterprise would be in charge of the total management of all farming activities on the piece of land over the stipulated duration of one (1) year. Over that time, we’d provide you with daily/weekly/monthly reports of your farm’s progress to aid transparency and improve your knowledge on your investment. After harvesting, farm produce sales, marketing and distribution will be effectively carried out by Us, then a 70% ROI will be sent to you after we must have taken out 30% of the total profit to cover all our management procedures over the duration of the investment. We would be mandated to vacate you from the farmland after your ROI has be sent to you unless you wish to reinvest in your preferred package again. You are free to take a tour of your farmland at any point in time you choose while your investment package is active. With our Cassava investment package, we relieve you of the labour that comes with managing, marketing, selling and distribution of your cassava crops, and ensure efficient farming practices that will guarantee maximum returns.</p>

                        <h5>Your Investment covers;</h5>
                        <ul>
                            <li><p>	Lease of farmland for a farming cycle.</p></li>
                            <li><p>	Clearing of farmland.</p></li>
                            <li><p>	Planting.</p></li>
                            <li><p>	Management.</p></li>
                            <li><p>	Logistics.</p></li>
                            <li><p>	Insurance.</p></li>
                            <li><p>	Sale of products.</p></li>
                        </ul>
                        <div class="btn-more-box"><a class="btn-hover-corner" href="{{ url('register') }}">GET STARTED NOW</a></div>
                    </div>
                </div>
            </div>
        </div>

        <!--PRODUCTS END-->
    </section>
@endsection
