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
                            <li><p>1 Acre of Land – N250,000</p></li>
                        </ul>

                        <h5>How Does It Work?</h5>
                         <p>Investment per plot / acre covers land lease, clearing and land preparation /treatment, purchase and transportation of Cassava stem and fertilizers, planting, 1st, 2nd and 3rd weeding, harvesting, Processing and packaging of products, Marketing and Sales, and ensuring efficient farming practices that will guarantee maximum returns.
                             This investment is only valid for a period of one year.
                         After liquidation, you can still reinvest in any of your preferred packages again.</p>

                        <h5>EXPECTED RETURN ON INVESTMENT</h5>
                        <p>The return of investment is 5.83% monthly which culminates to 70% in 12 months.
                        To make Investment flexible, Payment can be made in 2 installments within the first two months of the investment cycle</p>

                        <h6>50,000 investment (per plot)</h6>
                        <ul>
                            <li>
                                <p>&#127811; 1st month 25,000 (1st deposit)</p>
                            </li>
                            <li>
                                <p>&#127811; 2nd month 25,000 (2nd deposit)</p>
                            </li>
                        </ul>

                        <h6>250,000 investment (per acre)</h6>
                        <ul>
                            <li>
                                <p>&#127811; 1st month 150,000 (1st deposit)</p>
                            </li>
                            <li>
                                <p>&#127811; 2nd month 100,000 (2nd deposit)</p>
                            </li>
                        </ul>

                        <p><b>Investment cycle: (9 to 12month)</b></p>
                        <p>We Sow you Reap!</p>
                        <div class="btn-more-box"><a class="btn-hover-corner" href="{{ url('register') }}">GET STARTED NOW</a></div>
                    </div>
                </div>
            </div>
        </div>

        <!--PRODUCTS END-->
    </section>
@endsection
