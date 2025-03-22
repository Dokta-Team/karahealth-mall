@extends('layouts.app')

@section('content')
<section class="py-5 py-md-8 overlay background-center text-white" data-overlay="6" data-overlay-color="dark" data-background="assets/img/extra/page-about.jpg">
    <div class="container">
        <div class="header-align">
            <h1 class="h1 mb-1">Get In Touch</h1>
            <span>We’d love to hear from you! Reach out to us through any of the channels below.</span>
        </div>
    </div>
</section>
<section class="pt-5 pt-md-7">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <h4>Email</h4>
                <p>For general inquiries, support, or business collaborations, email us at:</p>
                <p><strong>Email:</strong> support@karahealthmall.com</p>
                
                <h4>Phone</h4>
                <p>Need to speak with us directly? Call our support team:</p>
                <p><strong>Phone:</strong> +234 803 746 2283</p>
                
                <h4>Office Address</h4>
                <p>Visit us at our physical office for in-person inquiries:</p>
                <p><strong>Address:</strong> 17 Ibikunle Street, Yaba, Lagos, Nigeria</p>
                
                <h4>Business Hours</h4>
                <p>We are available during the following hours:</p>
                <ul>
                    <li>Monday - Friday: 9:00 AM - 6:00 PM</li>
                    <li>Saturday: 10:00 AM - 4:00 PM</li>
                    <li>Sunday: Closed</li>
                </ul>
            </div>
            <div class="col-lg-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d114041.02049143793!2d88.3612319145676!3d26.71941404416647!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e44114f5441dcd%3A0xdeb5c4702063edff!2sSiliguri%2C%20West%20Bengal!5e0!3m2!1sen!2sin!4v1631501341871!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        <div class="row pt-5 pt-md-7">
            <div class="col-lg-8 mx-auto">
                <div class="contact-form">
                    <form id="ajax-form" action="php/mail.php" method="POST" class="form">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="text-left m-b20">
                                    <div class="form-message"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Name *" name="name" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Email *" name="email" type="text">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Subject" name="subject" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Phone" name="phone" type="text">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea class="form-control " rows="4" name="message" placeholder="Text Here"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-primary" type="submit" name="submit">SEND MESSAGE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
