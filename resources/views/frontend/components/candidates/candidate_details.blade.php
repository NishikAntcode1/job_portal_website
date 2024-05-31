@extends('frontend.layouts.app')

@section('main')
    <!-- Page Title Start -->
    <section class="page-title title-bg8">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Candidates Details</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Candidates Details</li>
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

    <section class="candidate-details pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="candidate-profile">
                        @if (!empty($user->profile_pic))
                            <img src="{{ asset('profile_pic/thumb/' . $user->profile_pic) }}" alt="candidate image">
                        @else
                            <img src="{{ asset('profile_pic/thumb/profile_demo.jpg') }}" alt="candidate image">
                        @endif
                        <h3>{{ optional($user)->name }}</h3>
                        <p>Web Developer</p>

                        <ul>
                            <li>
                                <a href="tel:+100230342">
                                    <i class='bx bxs-phone'></i>
                                    {{ optional($user)->mobile_no }}
                                </a>
                            </li>
                            <li>
                                <a href="mailto:john@gmail.com">
                                    <i class='bx bxs-location-plus'></i>
                                    {{ optional($user)->email }}
                                </a>
                            </li>
                        </ul>

                        <div class="candidate-social">
                            @if (!empty($user->social_link->facebook))
                                <a href="{{ url($user->social_link->facebook) }}" target="_blank"><i
                                        class="bx bxl-facebook"></i></a>
                            @endif
                            @if (!empty($user->social_link->twitter))
                                <a href="#" target="_blank"><i class="bx bxl-twitter"></i></a>
                            @endif
                            @if (!empty($user->social_link->linked_in))
                                <a href="#" target="_blank"><i class="bx bxl-linkedin"></i></a>
                            @endif
                            @if (!empty($user->social_link->git_hub))
                                <a href="#" target="_blank"><i class="bx bxl-github"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    {{-- <div class="candidate-info-text">
                        <h3>About Me</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                            but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    </div> --}}

                    <div class="candidate-info-text candidate-education">
                        <h3>Basic Information</h3>

                        <div class="education-info">
                            <h4>Age</h4>
                            <p>{{ optional($user->other_info)->age }} Yrs.</p>
                            {{-- <span>2000-2010</span> --}}
                        </div>

                        <div class="education-info">
                            <h4>Work Experience</h4>
                            <p>{{ optional($user->other_info)->work_experience }} Yrs.</p>
                            {{-- <span>2010-2012</span> --}}
                        </div>

                        {{-- <div class="education-info">
                            <h4>University</h4>
                            <p>Princeton University, USA</p>
                            <span>2012-2016</span>
                        </div> --}}
                    </div>

                    <div class="candidate-info-text candidate-education">
                        <h3>Address</h3>

                        <div class="education-info">
                            <h4>Country</h4>
                            <p>{{ optional($user->address)->country }}</p>
                        </div>

                        <div class="education-info">
                            <h4>State</h4>
                            <p>{{ optional($user->address)->state }}</p>
                        </div>

                        <div class="education-info">
                            <h4>City</h4>
                            <p>{{ optional($user->address)->city }}</p>
                        </div>

                        @if (!empty($user->address->region))
                            <div class="education-info">
                                <h4>Region</h4>
                                <p>{{ optional($user->address)->region }}</p>
                            </div>
                        @endif

                    </div>

                    {{-- <div class="candidate-info-text candidate-experience">
                        <h3>Experience</h3>

                        <ul>
                            <li>Proficient in HTML, CSS, Server-Scripting, C/C++, and Oracle</li>
                            <li>Experience with SEO</li>
                            <li>Experience Teaching Web Development</li>
                            <li>Knowledgeable in Online Advertising</li>
                            <li>Expert in LAMP Web Service Stacks</li>
                        </ul>
                    </div> --}}

                    @if (!empty($user->other_info->skill))
                        <div class="candidate-info-text candidate-skill">
                            <h3>Skills</h3>

                            <ul>
                                @foreach (explode(',', $user->other_info->skill) as $skill)
                                    <li>{{ trim($skill) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <div class="candidate-info-text text-center">
                        <div class="theme-btn">
                            {{-- <a href="#" class="default-btn">Hire Me</a> --}}
                            <a href="{{ route('download.cv', $user->id) }}" class="default-btn">Download CV</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
