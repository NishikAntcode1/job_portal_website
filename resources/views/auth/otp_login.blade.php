@extends('frontend.layouts.app')

@section('main')
    <section class="page-title title-bg12">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Sign In</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Sign In</li>
                </ul>
            </div>
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>

    <!-- Sign In Section Start -->
    <div class="signin-section ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-3">

                    @if (session('error'))
                        <div style="color: red">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form class="signin-form" action="{{ route('otp.generate') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="mobile_no">Enter Mobile no.</label>
                            <input type="text" class="form-control" name="mobile_no" value="{{ old('mobile_no') }}"
                                required placeholder="Enter your registered mobile no.">
                        </div>

                        {{-- <label for="mobile_no">Enter Mobile</label>
                        <br>
                        <input type="text" name="mobile_no" value="{{ old('mobile_no') }}" required
                            placeholder="Enter your registered mobile no.">
                        <br> --}}

                        @error('mobile_no')
                            <strong style="color: red">
                                {{ $message }}
                            </strong>
                        @enderror
                        <div class="signin-btn text-center">
                            <button type="submit">Generate OTP</button>
                        </div>
                        {{-- <div class="other-signin text-center">
                            <span>Or sign in with</span>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class='bx bxl-google'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class='bx bxl-facebook'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class='bx bxl-twitter'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class='bx bxl-linkedin'></i>
                                    </a>
                                </li>
                            </ul>
                        </div> --}}
                        <div class="create-btn text-center">
                            <p>Not have an account?
                                <a href="{{ route('otp.register') }}">
                                    Create an account
                                    <i class='bx bx-chevrons-right bx-fade-right'></i>
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In Section End -->
@endsection
