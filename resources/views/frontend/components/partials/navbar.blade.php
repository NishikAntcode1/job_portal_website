<div class="navbar-area">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{ route('home') }}" class="logo">
            <img src={{ asset("assets/img/logo.png") }} class="me-2" height="40" alt="logo">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src={{ asset("assets/img/logo.png") }} class="me-2" height="50" alt="logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a href="{{ route('home') }}"
                                class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('home.about_us') }}"
                                class="nav-link {{ request()->routeIs('home.about_us') ? 'active' : '' }}">About</a>
                        </li>

                        @if (Auth::check() && Auth::user()->role == 'admin')
                            <li class="nav-item">
                                <a href="{{ route('home.candidates') }}"
                                    class="nav-link {{ request()->routeIs('home.candidates') ? 'active' : '' }}">Candidates</a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a href="#"
                                class="nav-link dropdown-toggle {{ request()->routeIs(['home.companies', 'home.categories', 'home.testimonials', 'home.faq', 'home.privacy_policy', 'home.term_condition']) ? 'active' : '' }}">Pages</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="{{ route('home.companies') }}"
                                        class="nav-link {{ request()->routeIs('home.companies') ? 'active' : '' }}">Company</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('home.categories') }}"
                                        class="nav-link {{ request()->routeIs('home.categories') ? 'active' : '' }}">Catagories</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="pricing.html" class="nav-link">Pricing</a>
                                </li> --}}
                                {{-- <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle active">Profile</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="{{ url('/home/account') }}" class="nav-link">Account</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link dropdown-toggle active">Member</a>

                                            <ul class="dropdown-menu">
                                                <li class="nav-item">
                                                    <a href="sign-in.html" class="nav-link active">Sign In</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="sign-up.html" class="nav-link">Sign Up</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="reset-password.html" class="nav-link">Reset Password</a>
                                                </li>
                                            </ul>
                                        <li>
                                        <li class="nav-item">
                                            <a href="resume.html" class="nav-link">Resume</a>
                                        </li>
                                    </ul>
                                </li> --}}
                                {{-- <li class="nav-item">
                                    <a href="404.html" class="nav-link">404 Page</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a href="{{ route('home.testimonials') }}"
                                        class="nav-link {{ request()->routeIs('home.testimonials') ? 'active' : '' }}">Testimonials</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('home.faq') }}"
                                        class="nav-link {{ request()->routeIs('home.faq') ? 'active' : '' }}">FAQ</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('home.privacy_policy') }}"
                                        class="nav-link {{ request()->routeIs('home.privacy_policy') ? 'active' : '' }}">Privacy
                                        & Policy</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('home.term_condition') }}"
                                        class="nav-link {{ request()->routeIs('home.term_condition') ? 'active' : '' }}">Terms
                                        & Conditions</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('home.blog_list') }}"
                                class="nav-link {{ request()->routeIs('home.blog_list') ? 'active' : '' }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('home.services') }}"
                                class="nav-link {{ request()->routeIs('home.services') ? 'active' : '' }}">Services</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('home.contact_us') }}"
                                class="nav-link {{ request()->routeIs('home.contact_us') ? 'active' : '' }}">Contact Us</a>
                        </li>
                    </ul>

                    <div class="other-option">
                        @if (!Auth::check())
                            <a href="{{ route('otp.register') }}" class="signup-btn">Sign Up</a>
                            <a href="{{ route('otp.login') }}" class="signin-btn">Sign In</a>
                        @else
                            @if (!empty(Auth::user()->profile_pic))
                                <a href="{{ route('home.account') }}">
                                    <img src="{{ asset('profile_pic/thumb/' . Auth::user()->profile_pic) }}"
                                        alt="avatar" class="img-fluid rounded-circle me-1" width="35">
                                </a>
                            @else
                                <a href="{{ route('home.account') }}">
                                    <img src="{{ asset('assets/img/profile_demo.jpg') }}" alt="avatar"
                                        class="img-fluid rounded-circle me-1" width="35">
                                </a>
                            @endif

                        @endif

                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
