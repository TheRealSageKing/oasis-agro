@extends('layouts.base')

@section('title', 'Frequently Asked Questions')

@section('content')
    <x-banner page-title="Frequently Asked Questions">
        Questions <br> <span>FAQ</span>
    </x-banner>

    <section>
        <div class="container">
            <div class="row">
                <!--ACCORDION START-->
                <div class="col-lg-8 accordion-side">
                    <ul class="accordion">
                        <li>
                            <a>1. Who is Oasis Agro Enterprise?</a>
                            <p>Oasis Agro Enterprise is a fast growing Agro business and farm that specialize in growing food crops and also provides the platform for people to invest in Agro business with ease. Oasis Agro enterprise do all the heavy jobs on the farm while investors enjoy the benefits</p>
                        </li>
                        <li>
                            <a>2. What are the Investment packages?</a>
                            <p>
                                Cassava Plot Investment - N50,000 per year (ROI: 70%)<br>
                                Cassava Acre Investment - N250,000 per year (ROI: 70%)<br>
                                Palm Oil Storage Investment - Flexible Capital (ROI: 70%)
                            </p>
                        </li>
                        <li>
                            <a>3. How do I invest?</a>
                            <p>Agro investment has never been easier. On the website you will see the investment packages, choose the preferred package you will like to invest in, then click on invest now.</p>
                        </li>
                        <li>
                            <a>4. Is the ROI fixed or does is change with time?</a>
                            <p>The ROI for every Investment Package is fixed throughout the farm cycle.</p>
                        </li>
                        <li>
                            <a>5. Who can invest?</a>
                            <p>Our Investment opportunity is open to all Nigerians living in Nigeria and those living in Diaspora, as well as non-Nigerians. Employed or not, it doesn’t matter you are eligible.</p>
                        </li>
                        <li>
                            <a>6. How many Investment packages can I subscribe to?</a>
                            <p>You can invest in as much as you are able to. You can invest in one or more packages and still get your possible ROI on each of the investment made.</p>
                        </li>
                        <li>
                            <a>7. At what point do I start getting my ROI?</a>
                            <p>The ROI is gotten at the end of each farming cycle usually 9 to 12 months. All payments are made to investors when the farming cycle is complete. Updates on the farming progress and investment can be viewed from investors account and will also be sent to Investors from time to time to enable them track their investment.</p>
                        </li>
                        <li>
                            <a>8. How much ROI should I expect?</a>
                            <p>The ROI depends on the amount and number of packages invested in. The investor gets back his/her initial amount invested plus the ROI on the investment package subscribed to.</p>
                        </li>
                        <li>
                            <a>9. Will I get regular updates on my Investment?</a>
                            <p>Yes. Investors start to get update immediately farming/procurement begins through their investment account via the investment portal.</p>
                        </li>
                        <li>
                            <a>10. Will I get to see the farmland or is it just paper works?</a>
                            <p>Yes. Investors are welcomed for site inspection. They are free to visit the farm land. All you have to do is book a site inspection prior to the day you intend to visit.</p>
                        </li>
                        <li>
                            <a>11. I have a question that is not answered here, how do I go about it?</a>
                            <p>For more questions and enquires you can connect with us on Instagram @oasisagroenterprise or on our Facebook page @ Oasis Agro Enterprise
                                Forward your emails to info@oasisagroenterprise.com <br>
                                You can also call us on<br>
                                +2347063049118<br>
                                +2348101466715<br>
                                or use our contact form on this website to leave your message<br>
                                We would love to talk to you.
                            </p>
                        </li>
                    </ul> <!-- / accordion -->
                </div>
                <!--ACCORDION END-->

                <div class="col-lg-4 aside-right">
                    <!--SIDEBAR START-->
                    <aside>
{{--                        <h3>Categories</h3>--}}
{{--                        <div class="aside-list-group">--}}
{{--                            <ul class="list-group list-group-flush">--}}
{{--                                <li class="list-group-item"><a href="#">Agriculture</a>--}}
{{--                                    <span class="badge badge-primary badge-pill">12</span>--}}
{{--                                </li>--}}
{{--                                <li class="list-group-item"><a href="#">Organic</a>--}}
{{--                                    <span class="badge badge-primary badge-pill">16</span>--}}
{{--                                </li>--}}
{{--                                <li class="list-group-item"><a href="#">Vegetables</a>--}}
{{--                                    <span class="badge badge-primary badge-pill">13</span>--}}
{{--                                </li>--}}
{{--                                <li class="list-group-item"><a href="#">Natural Food</a>--}}
{{--                                    <span class="badge badge-primary badge-pill">10</span>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                        <h3>Learn about our products</h3>
                        <div class="aside-related-posts">
                            <div class="media-list">
                                <figure class="media-thumb"><a href="#"><img src="img/images/media-thumb1.jpg" alt=""></a></figure>
                                <div class="media-post">
                                    <h4><a href="{{ url('our-products#maize') }}">Maize</a></h4>
                                </div>
                            </div>
                            <div class="media-list">
                                <figure class="media-thumb"><a href="#"><img src="img/images/media-thumb2.jpg" alt=""></a></figure>
                                <div class="media-post">
                                    <h4><a href="{{ url('our-products#cassava') }}">Cassava</a></h4>
                                </div>
                            </div>
                            <div class="media-list">
                                <figure class="media-thumb"><a href="#"><img src="img/images/media-thumb3.jpg" alt=""></a></figure>
                                <div class="media-post">
                                    <h4><a href="{{url('our-products#palm-oil')}}">Oil Palm</a></h4>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <!--SIDEBAR START-->
                </div>
            </div>
        </div>

        <!--CONTACT US START-->
        <div class="container-fluid home-contact">
            <div class="row">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="contact-info">
                        <p>Get In Touch</p>
                        <h2>Contact Us</h2>
                        <div class="block-address">
                            <figure class="address-icon"><img src="img/master/map.png" alt=""></figure>
                            <div class="inner-info">
                                <h4>ADDRESS</h4>
                                <p>8273 NW 56th ST Miami, 33195 US</p>
                            </div>
                        </div>
                        <div class="block-phone d-flex">
                            <figure class="phone-icon"><img src="img/master/phone.png" alt=""></figure>
                            <div class="inner-info">
                                <h4>OFFICE PHONE</h4>
                                <p>+234 70 6304 9118</p>
                                <p>+234 70 6836 0519</p>
                            </div>
                        </div>
                        <div class="block-email">
                            <figure class="phone-icon"><img src="img/master/mail.png" alt=""></figure>
                            <div class="inner-info">
                                <h4>EMAIL</h4>
                                <p>info@oasisagroenterprise.com</p>
                            </div>
                        </div>
                        <div class="social-networks">
                            <div class="networks-list"><a href="#"><i class="fab fa-facebook-f"></i></a></div>
                            <div class="networks-list"><a href="#"><i class="fab fa-twitter"></i></a></div>
                            <div class="networks-list"><a href="#"><i class="fab fa-instagram"></i></a></div>
                            <div class="networks-list"><a href="#"><i class="fab fa-linkedin-in"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 custom-map" data-aos="fade-left">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167616.99483399244!2d-74.08279002518668!3d40.67646407501496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a560db693e3%3A0xb05e8b0bdf854b54!2sGowanus%2C+Brooklyn%2C+Nueva+York%2C+EE.+UU.!5e0!3m2!1ses-419!2sdo!4v1560863423970!5m2!1ses-419!2sdo" class="map-iframe"></iframe>
                </div>
            </div>
            <div class="form-box">
                <form id="dope-contact-form" method="post">
                    @csrf
                    <div class="messages"></div>
                    <div class="controls">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input id="form_name" type="text" name="name" class="form-control customize" placeholder="Name" required="required" data-error="Firstname is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input id="form_email" type="email" name="email" class="form-control customize" placeholder="Email address" required="required" data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input id="form_phone" type="tel" name="phone_number" class="form-control customize" placeholder="Please enter your phone">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea id="form_message" name="message" class="form-control customize" placeholder="Your message" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><button type="submit" class="btn btn-custom" id="submit-btn">Send message</button></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--CONTACT US END-->
    </section>


@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).on('submit', '#dope-contact-form', function(e){
            e.preventDefault();

            let form = $(this);
            let data = form.serialize();
            let submitBtn = $('#submit-btn');
            let oldVal = submitBtn.html();

            submitBtn.html("<span class='fa fa-spin fa-spinner'></span> Sending Message...").prop('disabled', true);
            $.ajax({
                url:'{{route('submit-contact-us')}}',
                data:data,
                type: 'POST',
                success: function(data){
                    if (data.success)
                    {
                        toastr.success('Thank you for writing to us we will get back to you as soon as possible');
                        document.getElementById("dope-contact-form").reset();
                    }else{
                        toastr.error(data.message);
                    }

                    submitBtn.html(oldVal).prop('disabled', false);
                },
                error: function(err)
                {
                    let response = JSON.parse(err.responseText);
                    toastr.error(response.message);
                    submitBtn.html(oldVal).prop('disabled', false);
                }
            })
        });
    </script>
@endsection
