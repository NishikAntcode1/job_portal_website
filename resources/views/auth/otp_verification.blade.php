@extends('frontend.layouts.app')

@section('main')
    <section class="page-title title-bg12">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Verification</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Verification</li>
                </ul>
            </div>
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>

    <div class="signin-section ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-3">


                    @if (session('error'))
                        <div style="color: red">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form class="signin-form" action="{{ route('otp.get_login') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                        <br>
                        <div class="form-group">
                            <label for="otp">OTP</label>
                            <input type="text" class="form-control" name="otp" value="{{ old('mobile_no') }}"
                                required placeholder="Enter OTP">
                        </div>
                        {{-- <label for="otp">OTP</label>
                        <br>
                        <input type="text" name="otp" value="{{ old('otp') }}" required
                            placeholder="Enter OTP">
                        <br> --}}
                        @error('otp')
                            <strong style="color: red">{{ $message }}</strong>
                        @enderror
                        @if (session('success'))
                            <div style="color: green">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="signin-btn text-center">
                            <button type="submit">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
