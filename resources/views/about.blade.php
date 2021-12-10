@extends('layouts.base')

@section('title', 'About us')

@section('content')
    <x-banner page-title="About us">
        About <br> <span>OASIS AGRO</span>
    </x-banner>

    <section>
        <!--ABOUT US SECTION START-->
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-front">
                        <h5>About oasis agro enterprise</h5>
                        <h2>Who are we?</h2>
                        <p>Oasis Agro Enterprise is a rapidly expanding Agro business and farm in Nigeria that specializes in cultivating nutritious food crops, manufacturing and packing food products in the most sanitary conditions, and storing and supplying them to consumers, clients, and business owners for consumption.</p>
                        <p>Oasis Agro Enterprise has been offering exceptional agricultural services for the past two years, without sacrificing the quality of our services or products. We intend to expand and increase production while also investing in the most cutting-edge agricultural technologies.</p>
                    </div>
                </div>
                <div class="col-lg-6 space-break">
                    <figure class="about-pic"><img src="img/images/img1.jpg" alt=""></figure>
                </div>
            </div>
            <hr class="divider">

            <div class="services-bar space-break">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="inner-service-bar d-flex">
                            <div class="flex-grow-lg-1">
                            <figure class="about-service-icon"><img src="img/master/seeding.png" alt=""></figure>
                            </div>
                            <div class="caption">
                                <h3>Agro Investments</h3>
                                <p>We discover gold mines in agriculture and use the initiative to benefit our investors.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="inner-service-bar mobil-breakpoint d-flex">
                            <div class="flex-grow-lg-1">
                            <figure class="about-service-icon"><img src="img/master/wheat.png" alt=""></figure>
                            </div>
                            <div class="caption">
                                <h3>Crop Production & Exportation</h3>
                                <p>We specialize in growing healthy crops, process, package and export to consumers and businesses</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="inner-service-bar tablet-breakpoint d-flex">
                            <div class="flex-grow-lg-1">
                            <figure class="about-service-icon"><img src="img/master/truck.png" alt=""></figure>
                            </div>
                            <div class="caption">
                                <h3>Sustainable Development</h3>
                                <p>Provide sustainable employment for nigerians.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="inner-service-bar tablet-breakpoint d-flex">
                            <div class="flex-grow-lg-1">
                                <figure class="about-service-icon"><img src="img/master/cow.png" alt=""></figure>
                            </div>
                            <div class="caption">
                                <h3>Livestocks</h3>
                                <p>We offer complete lifestock production, processing, and distribution to consumers.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--ABOUT US SECTION END-->

        <!--TEAM START-->
{{--        <div class="container-fluid inner-color">--}}
{{--            <div class="container">--}}
{{--                <div class="section-title">--}}
{{--                    <h2>Our <span>Team</span></h2>--}}
{{--                    <p>We specialise in intelligent & effective Search and believes in the power of partnerships to grow business.</p>--}}
{{--                </div>--}}
{{--                <div class="team-carousel slider hover-effects image-hover">--}}
{{--                    <div class="slide" data-aos="fade-up">--}}
{{--                        <div class="team-thumb">--}}
{{--                            <figure class="member-headshot"><img src="img/images/farmer1.jpg" alt=""></figure>--}}
{{--                            <div class="member-social">--}}
{{--                                <div class="social-items"><a href="#"><div class="icon-fa"><i class="fab fa-linkedin-in"></i></div></a></div>--}}
{{--                                <div class="social-items"><a href="#"><div class="icon-fa"><i class="fab fa-facebook-f"></i></div></a></div>--}}
{{--                                <div class="social-items"><a href="#"><div class="icon-fa"><i class="fab fa-twitter"></i></div></a></div>--}}
{{--                            </div>--}}
{{--                            <div class="team-caption">--}}
{{--                                <h3>Bryan Smith</h3>--}}
{{--                                <p>Stocker</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="slide" data-aos="fade-up">--}}
{{--                        <div class="team-thumb">--}}
{{--                            <figure class="member-headshot"><img src="img/images/farmer2.jpg" alt=""></figure>--}}
{{--                            <div class="member-social">--}}
{{--                                <div class="social-items"><a href="#"><div class="icon-fa"><i class="fab fa-linkedin-in"></i></div></a></div>--}}
{{--                                <div class="social-items"><a href="#"><div class="icon-fa"><i class="fab fa-facebook-f"></i></div></a></div>--}}
{{--                                <div class="social-items"><a href="#"><div class="icon-fa"><i class="fab fa-twitter"></i></div></a></div>--}}
{{--                            </div>--}}
{{--                            <div class="team-caption">--}}
{{--                                <h3>Sara Jones</h3>--}}
{{--                                <p>Food Production</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="slide" data-aos="fade-up">--}}
{{--                        <div class="team-thumb">--}}
{{--                            <figure class="member-headshot"><img src="img/images/farmer3.jpg" alt=""></figure>--}}
{{--                            <div class="member-social">--}}
{{--                                <div class="social-items"><a href="#"><div class="icon-fa"><i class="fab fa-linkedin-in"></i></div></a></div>--}}
{{--                                <div class="social-items"><a href="#"><div class="icon-fa"><i class="fab fa-facebook-f"></i></div></a></div>--}}
{{--                                <div class="social-items"><a href="#"><div class="icon-fa"><i class="fab fa-twitter"></i></div></a></div>--}}
{{--                            </div>--}}
{{--                            <div class="team-caption">--}}
{{--                                <h3>Tim Douglas</h3>--}}
{{--                                <p>Laborer</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="slide" data-aos="fade-up">--}}
{{--                        <div class="team-thumb">--}}
{{--                            <figure class="member-headshot"><img src="img/images/farmer4.jpg" alt=""></figure>--}}
{{--                            <div class="member-social">--}}
{{--                                <div class="social-items"><a href="#"><div class="icon-fa"><i class="fab fa-linkedin-in"></i></div></a></div>--}}
{{--                                <div class="social-items"><a href="#"><div class="icon-fa"><i class="fab fa-facebook-f"></i></div></a></div>--}}
{{--                                <div class="social-items"><a href="#"><div class="icon-fa"><i class="fab fa-twitter"></i></div></a></div>--}}
{{--                            </div>--}}
{{--                            <div class="team-caption">--}}
{{--                                <h3>Robert Thomson</h3>--}}
{{--                                <p>Warehouse</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!--TEAM END-->

        <!--WHY US START-->
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="about-company">
                        {{--                        <h5>Why Choose Us</h5>--}}
                        <h2>Why Choose Us</h2>
                        <p>For over two years, we have been investigating, identifying, controlling, and implementing appropriate farming practices to enhance agro development and sustain food production. </p>
                        <p>Choosing us means partnering with a group of highly devoted and experienced specialists whose primary goal is to grow, produce, and supply healthy food crops for human consumption. </p>
                        <p>We are completely committed to raising your level of living through our products and providing enormous value to you through our investment packages. We are committed to ensuring that our clients and partners are satisfied with our services, and we are passionate about our mission statement.</p>

                    </div>
                </div>
                <div class="col-lg-4 space-break">
                    <div class="about-col">
                        <figure class="mission-thumb"><img src="img/images/img2.jpg" alt=""></figure>
                        <div class="caption">
                            <h3>Our Mission</h3>
                            <p>Our mission is to actively contribute to the sustainable development of food production in Nigeria by reducing food imports and increasing food exports.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 space-break">
                    <div class="about-col">
                        <figure class="vision-thumb"><img src="img/images/img3.jpg" alt=""></figure>
                        <div class="caption">
                            <h3>Our Vision</h3>
                            <p>Our vision is to actively actively engage Nigerian youths in embracing agriculture as a golden opportunity in the fight against poverty.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--WHY US END-->

        <!--CLIENTS START-->
        <div class="container">
            <div class="section-title">
                <h2>Our <span>Partners</span></h2>
                <p>We specialise in intelligent & effective Search and believes in the power of partnerships to grow business.</p>
            </div>
            <div class="row">
                <div class="col-6 col-sm-6 col-md-4 col-lg-2 tablet-view">
                    <figure class="partners-logo"><img src="img/images/client-1.png" alt=""></figure>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg-2 tablet-view">
                    <figure class="partners-logo"><img src="img/images/client-5.png" alt=""></figure>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg-2 tablet-view">
                    <figure class="partners-logo"><img src="img/images/client-3.png" alt=""></figure>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg-2">
                    <figure class="partners-logo"><img src="img/images/client-7.png" alt=""></figure>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg-2">
                    <figure class="partners-logo"><img src="img/images/client-2.png" alt=""></figure>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg-2">
                    <figure class="partners-logo"><img src="img/images/client-6.png" alt=""></figure>
                </div>
            </div>
        </div>
        <!--CLIENTS END-->

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
