@extends('frontend.layouts.app')

@section('main')
    <section class="job-section jobs-grid-section pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Jobs You May Be Interested In</h2>
                <p>Discover opportunities tailored to your preferences. Our curated selection ensures you find the perfect
                    fit.</p>
            </div>

            <div class="row">
                @if ($jobs->isNotEmpty())
                    @foreach ($jobs as $job)
                        <div class="col-md-6">
                            <div class="job-card">
                                <div class="row align-items-center">
                                    <div class="col-lg-3">
                                        <div class="">
                                            <a href="{{ route('home.job_details', $job->id) }}">
                                                @if (!empty($job->company->company_logo))
                                                    <img src="{{ asset('companies_logo/' . $job->company->company_logo) }}"
                                                        class="img-thumbnail" alt="company logo" style="width: 100px;">
                                                @else
                                                    <img src="{{ asset('companies_logo/company_demo.jpg') }}"
                                                        class="img-thumbnail" alt="company logo">
                                                @endif
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="job-info">
                                            <h3>
                                                <a
                                                    href="{{ route('home.job_details', $job->id) }}">{{ $job->job_title }}</a>
                                            </h3>
                                            <ul>
                                                <li>Via <a
                                                        href="{{ url($job->company->company_website) }}">{{ $job->company->company_name }}</a>
                                                </li>

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
                                                    Salary:
                                                    {{ $job->salary ? $job->salary : 'Not mentioned' }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="job-save">
                                            <span>{{ $job->job_type->name }}</span>
                                            {{-- <a href="{{ url('#') }}">
                                                <i class='bx bx-heart'></i>
                                            </a> --}}
                                            <p>
                                                <i class='bx bx-stopwatch'></i>
                                                {{ \Carbon\Carbon::parse($job->created_at)->format('d M, Y') }}

                                            </p>
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
