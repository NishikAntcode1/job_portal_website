@extends('frontend.layouts.app')

@section('main')
    <section class="page-title title-bg1">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>About Us</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>
    <section class="about-section ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <h2>Inside Unicorn: Transforming Careers, Empowering Growth</h2>
                        </div>

                        <p>Founded in 2023, Inside Unicorn is the brainchild of a leading HR-Tech expert renowned for
                            developing a widely-used HR-Tech platform. Our founder’s vision and expertise drive our mission
                            to connect 100,000 people to productive job opportunities by 2027, ultimately positioning Inside
                            Unicorn as the largest recruitment company in India.</p>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="{{ asset('/assets/img/about_us.jpg') }}" alt="about image">
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-4">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <h2>Our Core Values</h2>
                        </div>
                        <p>At Inside Unicorn, we are guided by a singular core value: productivity. We are dedicated to
                            providing job opportunities that not only fulfill professional aspirations but also enhance the
                            productivity and satisfaction of both employees and employers.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <h2>Our Achievements</h2>
                        </div>
                        <p>Inside Unicorn has been instrumental in helping major Indian startups build their foundational
                            teams, propelling them to new heights. Our efforts have been recognized nationally, earning
                            accolades from clients and HR committees for our outstanding contribution to the recruitment
                            industry.</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-4">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <h2>Our Mission</h2>
                        </div>
                        <p>To connect 100,000 people to productive job opportunities by 2027.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <h2>Our Vision</h2>
                        </div>
                        <p>To be the largest recruitment company in India, revolutionizing the recruitment landscape with
                            our unique approach.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
