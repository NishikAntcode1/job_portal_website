@extends('frontend.layouts.app')

@section('main')
    <!-- Page Title Start -->
    <section class="page-title title-bg7">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Candidates</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Candidates</li>
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
    <section class="candidate-style-two pt-100 pb-70">
        <div class="container">
            <div class="row">
                @if ($users->isNotEmpty())
                    @foreach ($users as $user)
                        <div class="col-lg-3 col-sm-6">
                            <div class="candidate-card">
                                <div class="candidate-img">
                                    @if (!empty($user->profile_pic))
                                        <img src="{{ asset('profile_pic/thumb/' . $user->profile_pic) }}"
                                            alt="candidate image">
                                    @else
                                        <img src="{{ asset('profile_pic/thumb/profile_demo.jpg') }}" alt="candidate image">
                                    @endif
                                </div>
                                <div class="candidate-text">
                                    <h3>
                                        <a href="{{ route('home.candidate_details',$user->id) }}">{{ optional($user)->name }}</a>
                                    </h3>
                                    <ul>
                                        <li>
                                            {{ optional($user)->job_title }}
                                        </li>
                                    </ul>
                                </div>

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
                    @endforeach
                @endif

            </div>
            @if ($users->isNotEmpty())
                {{ $users->links() }}
            @else
                <div class="section-title text-center">
                    <h3>No Candidates Found.</h3>
                </div>
            @endif
        </div>
    </section>
@endsection
