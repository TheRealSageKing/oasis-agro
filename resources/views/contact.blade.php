@extends('layouts.base')

@section('title', 'Contact us')

@section('content')
    <x-banner page-title="Contact us">
        Contact <br> <span>OASIS AGRO</span>
    </x-banner>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="alert alert-info">
                        You can drop your contact and purchase information below and we will
                        reach out to you
                    </p>
                </div>
                <!--CONTACT INFORMATION START-->
                <div class="col-lg-6">
                    <div class="contact-info">
                        <p>Get In Touch</p>
                        <h2>Contact Us</h2>
                        <div class="block-address">
                            <figure class="address-icon"><img src="img/master/map.png" alt=""></figure>
                            <div class="inner-info">
                                <h4>ADDRESS</h4>
                                <p>{!! config('app.address') !!}</p>
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
                <!--CONTACT INFORMATION END-->

                <!--CONTACT FORM START-->
                <div class="col-lg-6 space-break">
                    <div class="contact-form">
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
                <!--CONTACT FORM END-->
            </div>
        </div>

        <!--MAP START-->
        <div class="container-fluid map-wide">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d993.0810215226761!2d7.001701529192118!3d5.367441934981228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10425de38fbad901%3A0x8f73e8c0be00f140!2s460115%2C%20Eziobodo!5e0!3m2!1sen!2sng!4v1639226240165!5m2!1sen!2sng" class="map-iframe"></iframe>
        </div>
        <!--MAP END-->

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
