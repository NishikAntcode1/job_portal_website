@extends('frontend.layouts.app')

@section('main')
    <!-- Page Title Start -->
    <section class="page-title title-bg16">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Testimonial</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Testimonial</li>
                </ul>
            </div>
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>
    <!-- Page Title End -->

    <!-- Testimonial Section Start -->
    <div class="testimonial-style-two ptb-100">
        <div class="container">
            <div class="section-title text-center">
                <h2>What Client’s Say About Us</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
            </div>

            <div class="row">
                <div class="testimonial-slider-two owl-carousel owl-theme">
                    <div class="testimonial-items">
                        <div class="testimonial-text">
                            <i class='flaticon-left-quotes-sign'></i>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do mod tempor incididunt ut
                                labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo
                                viverra maecenas accumsan lacus vel facilisis. Lorem Ipsum is simply dummy text of the
                                printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                        </div>

                        <div class="testimonial-info-text">
                            <h3>Alisa Meair</h3>
                            <p>CEO of Company</p>
                        </div>
                    </div>

                    <div class="testimonial-items">
                        <div class="testimonial-text">
                            <i class='flaticon-left-quotes-sign'></i>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do mod tempor incididunt ut
                                labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo
                                viverra maecenas accumsan lacus vel facilisis. Lorem Ipsum is simply dummy text of the
                                printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                        </div>

                        <div class="testimonial-info-text">
                            <h3>Adam Smith</h3>
                            <p>Web Developer</p>
                        </div>
                    </div>

                    <div class="testimonial-items">
                        <div class="testimonial-text">
                            <i class='flaticon-left-quotes-sign'></i>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do mod tempor incididunt ut
                                labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo
                                viverra maecenas accumsan lacus vel facilisis. Lorem Ipsum is simply dummy text of the
                                printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                        </div>

                        <div class="testimonial-info-text">
                            <h3>John Doe</h3>
                            <p>Graphics Designer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial Section End -->
@endsection
