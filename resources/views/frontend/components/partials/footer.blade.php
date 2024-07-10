<div>
    <footer class="footer-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="{{ route('home') }}">
                                <img src={{ asset("assets/img/logo.png") }} class="me-2" height="60" alt="logo">
                            </a>
                        </div>

                        <p>Whether you're starting out, seeking advancement, or changing careers, we have something for
                            you.</p>

                        <div class="footer-social">
                            <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
                            <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
                            <a href="#" target="_blank"><i class='bx bxl-pinterest-alt'></i></a>
                            <a href="#" target="_blank"><i class='bx bxl-linkedin'></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget pl-60">
                        <h3>For Candidate</h3>
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    Browse Jobs
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('home.account') }}">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    Account
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('home.categories') }}">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    Browse Categories
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('account.resume') }}">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    Resume
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('home.job_list') }}">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    Job List
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('otp.register')}}">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    Sign Up
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget pl-60">
                        <h3>Quick Links</h3>
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('home.about_us') }}">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    About
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('home.faq') }}">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    FAQ
                                </a>
                            </li>
                            {{-- <li>
                                <a href="pricing.html">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    Pricing
                                </a>
                            </li> --}}
                            <li>
                                <a href="{{ route('home.privacy_policy') }}">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    Privacy
                                </a>
                            </li>
                            {{-- <li>
                                <a href="contact.html">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    Contact
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget footer-info">
                        <h3>Information</h3>
                        <ul>
                            <li>
                                <span>
                                    <i class='bx bxs-phone'></i>
                                    Phone:
                                </span>
                                <a href="tel:882569756">
                                    +101 984 754
                                </a>
                            </li>

                            <li>
                                <span>
                                    <i class='bx bxs-envelope'></i>
                                    Email:
                                </span>
                                <a href="mailto:info@jovie.com">
                                    info@jovie.com
                                </a>
                            </li>

                            <li>
                                <span>
                                    <i class='bx bx-location-plus'></i>
                                    Address:
                                </span>
                                Mumbai, Maharashtra IN
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="copyright-text text-center">
        <p>© This website is Proudly Owned by <a href="#" target="_blank">Inside Unicorn</a></p>
    </div>
</div>
