@extends('layouts.base')

@section('title', 'Contact us')

@section('content')
    <x-banner page-title="Contact us">
        Contact <br> <span>OASIS AGRO</span>
    </x-banner>

    <section>
        <div class="container">
            <div class="row">
                <!--CONTACT INFORMATION START-->
                <div class="col-lg-6">
                    <div class="contact-box">
                        <div class="section-title">
                            <h2>Send <span>Message</span></h2>
                            <p>We specialise in intelligent & effective Search and believes in the power of partnerships to grow business.</p>
                        </div>
                        <div class="span-contact">
                            <div class="contact-icon"><i class="fas fa-phone"></i></div>
                            <p>&nbsp;+ 0511 00 3322 22</p>
                        </div>
                        <div class="span-contact">
                            <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                            <p>&nbsp;info@domain.com</p>
                        </div>
                        <div class="span-contact">
                            <div class="contact-icon"><i class="fas fa-map"></i></div>
                            <p>&nbsp;8273 NW 56th ST Miami, Florida, 33195 United States</p>
                        </div>
                    </div>
                </div>
                <!--CONTACT INFORMATION END-->

                <!--CONTACT FORM START-->
                <div class="col-lg-6 space-break">
                    <div class="contact-form">
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
                                            <textarea id="form_message" name="message" class="form-control customize" placeholder="Your message" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><input type="submit" class="btn btn-custom" value="Send message"></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--CONTACT FORM END-->
            </div>
        </div>

        <!--MAP START-->
        <div class="container-fluid map-wide">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167616.99483399244!2d-74.08279002518668!3d40.67646407501496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a560db693e3%3A0xb05e8b0bdf854b54!2sGowanus%2C+Brooklyn%2C+Nueva+York%2C+EE.+UU.!5e0!3m2!1ses-419!2sdo!4v1560863423970!5m2!1ses-419!2sdo" class="map-iframe"></iframe>
        </div>
        <!--MAP END-->

    </section>



@endsection
