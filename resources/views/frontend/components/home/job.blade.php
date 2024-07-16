<section class="job-style-two pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2>Jobs You May Be Interested In</h2>
            <p>Discover job opportunities tailored to your skills and career goals. At Inside Unicorn, we have
                roles across various fields, from entry-level to senior positions. Find your perfect match today.</p>
        </div>

        <div class="row">
            @if ($latest_jobs->isNotEmpty())
            @foreach ($latest_jobs as $latest_job)
            <div class="col-lg-12">
                <div class="job-card-two">
                    <div class="row align-items-center">
                        <div class="col-md-1">
                            <div class="">
                                <a href="{{ route('home.job_details', $latest_job->id) }}">
                                    @if (!empty($latest_job->company->company_logo))
                                        <img src="{{ asset('companies_logo/' .$latest_job->company->company_logo) }}"
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
                                    <a href="{{ route("home.job_details", $latest_job->id) }}">{{ $latest_job->job_title }}</a>
                                </h3>
                                <ul>                                          
                                    <li>
                                        <i class='bx bx-briefcase' ></i>
                                        {{ $latest_job->category->name }}
                                    </li>
                                    <li>
                                        <i class='bx bx-briefcase' ></i>
                                        {{ $latest_job->salary }}
                                    </li>
                                    <li>
                                        <i class='bx bx-location-plus'></i>
                                        {{ $latest_job->location }}
                                    </li>
                                    <li>
                                        <i class='bx bx-stopwatch' ></i>
                                        {{ \Carbon\Carbon::parse($latest_job->created_at)->format('d M, Y') }}
                                    </li>
                                </ul>

                                <span>{{ $latest_job->job_type->name }}</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="theme-btn text-end">
                                <a href="{{ route("home.job_details", $latest_job->id) }}" class="default-btn">
                                    Browse Job
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
                <div class="section-title text-center">
                    <h3>No Jobs Found.</h3>
                </div>
            @endif
        </div>
    </div>
</section>