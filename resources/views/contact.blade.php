@extends('layouts.userpage')

@section('title', 'contact')

@section('content')

    <main>
        <div class="mb-4 pb-4"></div>
        <section class="contact-us container">
            <div class="mw-930">
                <h2 class="page-title">CONTACT US</h2>
            </div>
        </section>



        <section class="contact-us container">
            <div class="mw-930">
                <div class="row mb-5">
                    <div class="col-lg-6">
                        <h3 class="mb-4">Store in India</h3>
                        <p class="mb-4"> 58, MADUKARAI MAIN ROAD, SUNDARAPURAM, Coimbatore, <br> Tamil Nadu - 641023</p>
                        <p class="mb-4">support@shirt-inc.com<br>+91 861 023 8817</p>
                    </div>
                </div>
                <div class="contact-us__form">
                    <form action="{{url('user-contact-us')}}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <h3 class="mb-5">Get In Touch</h3>
                        <div class="form-floating my-4">
                            <input type="text" class="form-control" id="contact_us_name" placeholder="Name *" name="name" pattern=".{4,}" title="Username must be at least 4 characters long." required>
                            <label for="contact_us_name">Name *</label>
                        </div>
                        <div class="form-floating my-4">
                            <input type="email" class="form-control" id="contact_us_email" placeholder="Email address *" name="email"
                                required>
                            <label for="contact_us_name">Email address *</label>
                        </div>
                        <div class="form-floating my-4">
                            <input type="text" class="form-control" id="contact_us_email" placeholder="Mobile *" name="mobile" onkeyup="this.value = this.value.replace(/[^0-9]/g,'')"
                            pattern="[0-9]{10}" title="Please enter a 10-digit mobile number" maxlength="10"   required>
                            <label for="contact_us_name">Mobile *</label>
                        </div>
                        <div class="my-4">
                            <textarea class="form-control form-control_gray" placeholder="Your Message" cols="30" rows="8" name="message" required></textarea>
                        </div>
                        <div class="my-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="google-map mb-5">
            <h2 class="d-none">Contact US</h2>
            <div id="map" class="google-map__wrapper">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31340.49688546412!2d76.93086074890623!3d10.920845761140457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba85b2cc02fa16d%3A0x5e864be88df4a42c!2sMadhukarai%20road!5e0!3m2!1sen!2sin!4v1706326916472!5m2!1sen!2sin"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
    </main>

@endsection
