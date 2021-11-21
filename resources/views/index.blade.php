@extends('layouts.base')

@section('title', 'Home page')

@section('content')
        <x-slider></x-slider>

        <div class="item-background">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="home-about">
                            <h5>Oasis Agro Enterprise</h5>
                            <h2>Our Mission</h2>
                            <p>Our mission is to actively contribute to the sustainable development of food production in
                                Imo state Nigeria, reducing food import and increasing production and export of food from
                                Eastern Nigeria to other parts of the country and the World While engaging Nigerian Youths
                                actively in Embracing agriculture as a Golden opportunity in the fight against poverty in Africa</p>
                            <div class="btn-more-box"><a class="btn-hover-corner" href="{{ url('about-us#mission') }}">LEARN MORE</a></div>
                        </div>
                    </div>
                    <div class="col-lg-6 space-break">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="home-icon-box">
                                    <figure class="icon-pic"><img src="img/master/seeding.png" alt=""></figure>
                                    <h3>Natural Products</h3>
                                    <p>Many desktop publishing packages and web page.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="home-icon-box">
                                    <figure class="icon-pic"><img src="img/master/cow.png" alt=""></figure>
                                    <h3>Cattle</h3>
                                    <p>Many desktop publishing packages and web page.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="home-icon-box">
                                    <figure class="icon-pic"><img src="img/master/wheat.png" alt=""></figure>
                                    <h3>Wheat Cultivation</h3>
                                    <p>Many desktop publishing packages and web page.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="home-icon-box">
                                    <figure class="icon-pic"><img src="img/master/truck.png" alt=""></figure>
                                    <h3>Modern Truck</h3>
                                    <p>Many desktop publishing packages and web page.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--HOME ABOUT END-->

        <!--PACKAGES START-->
        <div class="container">
            <div class="section-title">
                <h2>Running <span>Packages</span></h2>
                <p>We specialise in intelligent & effective Search and believes in the power of partnerships to grow business.</p>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="post-list">
                        <a href="#">
                            <figure class="post-preview">
                                <img src="img/images/blog7.jpg" alt="">
                                <div class="post-overlay"></div>
                            </figure>
                        </a>
                        <div class="post-caption">
                            <h3><a href="#">Freeze Concern Hits Wheat Farms</a></h3>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.</p>
                            <hr class="posts">
                            <div class="bottom-post">
                                <div class="post-author">
                                    <figure class="author-avatar"><img src="img/images/post-avatar1.jpg" alt=""></figure>
                                    <div class="about-author">
                                        <h4 class="author-name"><a href="#">John Wilson</a></h4>
                                        <p class="posted-on">January 15, 2019</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="post-list">
                        <a href="#">
                            <figure class="post-preview">
                                <img src="img/images/blog8.jpg" alt="">
                                <div class="post-overlay"></div>
                            </figure>
                        </a>
                        <div class="post-caption">
                            <h3><a href="#">National Association of Wheat Growers</a></h3>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.</p>
                            <hr class="posts">
                            <div class="bottom-post">
                                <div class="post-author">
                                    <figure class="author-avatar"><img src="img/images/post-avatar2.jpg" alt=""></figure>
                                    <div class="about-author">
                                        <h4 class="author-name"><a href="#">Richard Miller</a></h4>
                                        <p class="posted-on">January 13, 2019</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="post-list">
                        <a href="#">
                            <figure class="post-preview">
                                <img src="img/images/blog9.jpg" alt="">
                                <div class="post-overlay"></div>
                            </figure>
                        </a>
                        <div class="post-caption">
                            <h3><a href="#">Farmer Sentiment Darkens Hopes Fade</a></h3>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.</p>
                            <hr class="posts">
                            <div class="bottom-post">
                                <div class="post-author">
                                    <figure class="author-avatar"><img src="img/images/post-avatar3.jpg" alt=""></figure>
                                    <div class="about-author">
                                        <h4 class="author-name"><a href="#">Lisa Smith</a></h4>
                                        <p class="posted-on">January 12, 2019</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--PACKAGES END-->

        <!--WHY US START-->
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="about-company">
                        <h5>Why Choose Us</h5>
                        <h2>Experience the real agriculture</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
                        <figure class="signature"><img src="img/images/signature.png" alt=""></figure>
                    </div>
                </div>
                <div class="col-lg-4 space-break">
                    <div class="about-col">
                        <figure class="mission-thumb"><img src="img/images/img2.jpg" alt=""></figure>
                        <div class="caption">
                            <h3>Our Mission</h3>
                            <p>It is a long established fact that a reader will be distracted by the readable.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 space-break">
                    <div class="about-col">
                        <figure class="vision-thumb"><img src="img/images/img3.jpg" alt=""></figure>
                        <div class="caption">
                            <h3>Our Vision</h3>
                            <p>It is a long established fact that a reader will be distracted by the readable.</p>
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
                        <div class="block-phone">
                            <figure class="phone-icon"><img src="img/master/phone.png" alt=""></figure>
                            <div class="inner-info">
                                <h4>OFFICE PHONE</h4>
                                <p>+ 0511 01220 3320</p>
                            </div>
                        </div>
                        <div class="block-email">
                            <figure class="phone-icon"><img src="img/master/mail.png" alt=""></figure>
                            <div class="inner-info">
                                <h4>EMAIL</h4>
                                <p>info@agrom.com</p>
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
                <form id="contact-form" method="post" action="http://quickdevs.com/templates/agrom/contact.php">
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
                                    <input id="form_phone" type="tel" name="phone" class="form-control customize" placeholder="Please enter your phone">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea id="form_message" name="message" class="form-control customize" placeholder="Your message" rows="5" required="required" data-error="Please,leave us a message."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 contact-btn">
                                <p><input type="submit" class="btn btn-custom" value="Send message"></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--CONTACT US END-->

@endsection
