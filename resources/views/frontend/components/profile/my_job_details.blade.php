@extends('frontend.layouts.app')
@section('main')
    @include('frontend.components.partials.message')
    <section class="page-title title-bg11">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Job Details</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Job Details</li>
                </ul>
            </div>
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>
    <section class="job-details ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="job-details-text">
                                <div class="job-card">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <div class="company-logo">
                                                @if (!empty($job->company->company_logo))
                                                    <img src="{{ asset('companies_logo/' . $job->company->company_logo) }}"
                                                        class="img-thumbnail" alt="company logo">
                                                @else
                                                    <img src="{{ asset('companies_logo/company_demo.jpg') }}"
                                                        class="img-thumbnail" alt="company logo">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="job-info">
                                                <h3>{{ $job->job_title }}</h3>
                                                <ul>
                                                    <li>
                                                        <i class='bx bx-location-plus'></i>
                                                        {{ $job->location }}
                                                    </li>
                                                    <li>
                                                        <i class='bx bx-filter-alt'></i>
                                                        {{ $job->category->name }}
                                                    </li>
                                                    <li>
                                                        <i class='bx bx-briefcase'></i>
                                                        {{ $job->job_type->name }}
                                                    </li>
                                                </ul>

                                                <span>
                                                    <i class='bx bx-paper-plane'></i>
                                                    Apply Before:
                                                    {{ \Carbon\Carbon::parse($job->created_at)->addDays(7)->format('d M, Y') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="details-text">
                                    <h3>Description</h3>
                                    {!! nl2br($job->job_description) !!}

                                    {{-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                        suffered alteration in some form, by injected humour, or randomised words which
                                        don't look even slightly believable.</p> --}}
                                </div>

                                @if ($job->qualification)
                                    <div class="details-text">
                                        <h3>Qualification</h3>
                                        {!! nl2br($job->qualification) !!}
                                    </div>
                                @endif


                                @if ($job->responsibilty || $job->benefits)
                                    <div class="details-text">
                                        <h3>Responsibilty & Benefits</h3>
                                        {!! nl2br($job->responsibilty) !!}
                                        {!! nl2br($job->benefits) !!}
                                    </div>
                                @endif

                                <div class="details-text">
                                    <h3>Job Details</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td><span>Company :</span></td>
                                                        <td>{{ $job->company->company_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Location :</span></td>
                                                        <td>{{ $job->location }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Job Type :</span></td>
                                                        <td>{{ $job->job_type->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Email :</span></td>
                                                        <td><a
                                                                href="{{ url($job->company_email ? $job->company_email : '#') }}">{{ $job->company_email ? $job->company_email : 'Not mentioned' }}</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td><span>Experince :</span></td>
                                                        <td>{{ $job->experience }} yrs</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Vacancy :</span></td>
                                                        <td>{{ $job->vacancy }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Salary :</span></td>
                                                        <td>{{ $job->salary ? $job->salary : 'Not mentioned' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Website :</span></td>
                                                        <td><a
                                                                href="{{ $job->company_website ? 'http://'.$job->company_website : '#' }}">{{ $job->company_website ? $job->company_website : 'Not mentioned' }}</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="theme-btn">
                                    @if (Auth::check())
                                        <a href="#" onclick="save_job({{ $job->id }});" class="default-btn">
                                            Save
                                        </a>
                                    @else
                                        <a href="javascript:void(0)" class="default-btn">
                                            Login to Save
                                        </a>
                                    @endif


                                    @if (Auth::check())
                                        <a href="#" onclick="apply_job({{ $job->id }})" class="default-btn">
                                            Apply Now
                                        </a>
                                    @else
                                        <a href="javascript:void(0)" class="default-btn disabled">
                                            Login to Apply
                                        </a>
                                    @endif
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="job-sidebar">
                        <h3>Posted By</h3>
                        <div class="posted-by">
                            <img src="{{ asset($job->user->profile_pic ? 'profile_pic/thumb/' . $job->user->profile_pic : 'assets/img/profile_demo.jpg') }}"
                                alt="client image">
                            <h4>{{ $job->user->name }}</h4>
                            <span>Post Date : {{ \Carbon\Carbon::parse($job->created_at)->format('d M, Y') }}</span>
                        </div>
                    </div>

                    <div class="job-sidebar">
                        <h3>Location</h3>
                        @if ($job->location)
                            @php
                                $encodedLocation = urlencode($job->location);
                                $mapUrl =
                                    'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387190.27991517034!2d-74.25987556253516!3d40.697670063539654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1588772651198!5m2!1sen!2sbd';
                                $mapUrl = str_replace('New%20York%2C%20NY%2C%20USA', $encodedLocation, $mapUrl);
                            @endphp
                            <iframe src="https://maps.google.it/maps?q=<?php echo $job->location; ?>&output=embed"></iframe>
                        @endif
                    </div>

                    @if ($job_tags->isNotEmpty())
                        <div class="job-sidebar">
                            <h3>Keywords</h3>
                            <ul>


                                @foreach ($job_tags as $job_tag)
                                    <li>
                                        <a href="{{ url('#') }}">{{ $job_tag->name }}</a>
                                    </li>
                                @endforeach


                            </ul>
                        </div>
                    @endif


                    <div class="job-sidebar social-share">
                        <h3>Share In</h3>
                        <ul>
                            <li>
                                <a href="{{ url('https://www.facebook.com') }}" target="_blank">
                                    <i class="bx bxl-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('https://www.twitter.com') }}" target="_blank">
                                    <i class="bx bxl-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('https://www.pinterest.com') }}" target="_blank">
                                    <i class="bx bxl-pinterest"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('https://www.linkedin.com/') }}" target="_blank">
                                    <i class="bx bxl-linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <section class="candidate-style-two pt-100 pb-70">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Job Applicants</h2>
                </div>

                <div class="condidate-slider owl-carousel owl-theme">


                    @if ($applications->isNotEmpty())
                        @foreach ($applications as $application)
                            <div class="condidate-item">
                                <div class="candidate-img">
                                    @if (!empty($application->user->profile_pic))
                                        <img src="{{ asset('profile_pic/thumb/' . $application->user->profile_pic) }}"
                                            alt="candidate image">
                                    @else
                                        <img src="{{ asset('profile_pic/thumb/profile_demo.jpg') }}" alt="candidate image">
                                    @endif
                                </div>
                                <div class="candidate-social">
                                    @if (!empty($application->user->social_link->facebook))
                                        <a href="{{ url($application->user->social_link->facebook) }}" target="_blank"><i
                                                class="bx bxl-facebook"></i></a>
                                    @endif
                                    @if (!empty($application->user->social_link->twitter))
                                        <a href="#" target="_blank"><i class="bx bxl-twitter"></i></a>
                                    @endif
                                    @if (!empty($application->user->social_link->linked_in))
                                        <a href="#" target="_blank"><i class="bx bxl-linkedin"></i></a>
                                    @endif
                                    @if (!empty($application->user->social_link->git_hub))
                                        <a href="#" target="_blank"><i class="bx bxl-github"></i></a>
                                    @endif
                                </div>
                                <div class="candidate-text">
                                    <h3><a
                                            href="{{ route('home.candidate_details', $application->user->id) }}">{{ optional($application->user)->name }}</a>
                                    </h3>
                                    <ul>
                                        <li>
                                            <i class='bx bx-filter-alt'></i>
                                            {{ $application->job->category->name }}
                                        </li>
                                        <li>
                                            <i class='bx bx-location-plus'></i>
                                            {{ $application->job->location }}
                                        </li>
                                    </ul>

                                    <div class="bottom-text">
                                        <p style="font-size: 15px">
                                            <i class='bx bx-stopwatch'></i>
                                            {{ \Carbon\Carbon::parse($application->applied_date)->format('d M, Y') }}
                                        </p>
                                        <a type="button" onclick="delete_application({{ $application->id }})">
                                            <i class='bx bx-trash'></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </section>
    </section>
@endsection

@section('customJs')
    <script type="text/javascript">
        function delete_application(applicationId) {
            if (confirm("Are you sure you want to delete this application?")) {
                $.ajax({
                    url: '{{ route('account.delete_application') }}',
                    type: 'post',
                    data: {
                        application_id: applicationId
                    },
                    dataType: 'json',
                    success: function(response) {
                        window.location.href = '{{ route('account.job_details', $job->id) }}';
                    }
                });
            }
        }
    </script>
@endsection
