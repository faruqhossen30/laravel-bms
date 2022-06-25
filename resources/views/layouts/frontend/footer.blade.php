<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="footer_item">
                    <div class="footer_logo">
                        <img src="{{ asset('static/images/logo.png') }}" alt="logo">
                    </div>
                    <div class="copyr">
                        <p>{{ $bs->site_name }} © {{ date('Y') }} all right reserved.</p>
                    </div>
                    <div class="mobile_banks">
                    <img src="{{ asset('static/images/googleapp.png') }}" alt="googleapp" class="d-md-none d-lg-none d-xl-none">
                        <img src="{{ asset('static/images/payment.png') }}" alt="payment">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer_last_item">
                    <ul>
                        <li><a href="#"><img src="{{ asset('static/images/googleapp.png') }}" class="d-none d-lg-block d-xl-block" alt="googleapp"></a></li>
                    </ul>
                    <p>Caution! We strongly discourage to use this site who are not 18+ and also site administrator is not liable to any kind of issues created by user.</p>
                </div>
            </div>
        </div>
    </div>
</section>