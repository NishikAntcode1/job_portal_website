@extends('frontend.layouts.app')

@section('main')
    <section class="page-title title-bg11">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>My Jobs</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>My Jobs</li>
                </ul>
            </div>
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>
    <section class="job-style-two job-list-section pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Jobs You Have Posted</h2>
                <p>Discover opportunities tailored to your preferences. Our curated selection ensures you find the perfect
                    fit.</p>
            </div>

            <div class="row">

                @if ($jobs->isNotEmpty())
                    @foreach ($jobs as $job)
                        <div class="col-lg-12">
                            <div class="job-card-two">
                                <div class="row align-items-center">
                                    <div class="col-md-1">
                                        <div class="">
                                            <a href="{{ route('account.job_details', $job->id) }}">
                                                @if (!empty($job->company->company_logo))
                                                    <img src="{{ asset('companies_logo/' . $job->company->company_logo) }}"
                                                        class="img-thumbnail" alt="company logo" style="width: 120px;">
                                                @else
                                                    <img src="{{ asset('companies_logo/company_demo.jpg') }}"
                                                        class="img-thumbnail" alt="company logo">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="job-info">
                                            <h3>
                                                <a
                                                    href="{{ route('account.job_details', $job->id) }}">{{ $job->job_title }}</a>
                                            </h3>
                                            <ul>
                                                <li>
                                                    <i class='bx bx-briefcase'></i>
                                                    {{ $job->category->name }}
                                                </li>
                                                <li>
                                                    <i class='bx bx-briefcase'></i>
                                                    Salary: {{ $job->salary ? $job->salary : 'Not mentioned' }} INR
                                                </li>
                                                <li>
                                                    <i class='bx bx-location-plus'></i>
                                                    {{ $job->location }}
                                                </li>
                                                <li>
                                                    <i class='bx bx-stopwatch'></i>
                                                    {{ \Carbon\Carbon::parse($job->created_at)->format('d M, Y') }}
                                                </li>
                                            </ul>

                                            <span>{{ $job->job_type->name }}</span>
                                            @if ($job->status == 1)
                                                <span>Active</span>
                                            @else
                                                <span>Block</span>
                                            @endif
                                            <p>Total no. of aplications : {{ $job->applications->count() }}</p>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="theme-btn text-end">

                                            <!-- Add another button here -->
                                            <a href="{{ route('account.edit_job', $job->id) }}" class="default-btn ml-2">
                                                Edit
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif



            </div>
            @if ($jobs->isNotEmpty())
                {{ $jobs->links() }}
            @else
                <div class="section-title text-center">
                    <h3>No Jobs Found.</h3>
                </div>
            @endif
        </div>
    </section>
@endsection
