@extends('frontend.layouts.app')

@section('main')
    <section class="page-title title-bg11">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Jobs Applied</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Jobs Applied</li>
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
                <h2>Applied Jobs</h2>
                <p>Discover opportunities tailored to your preferences. Our curated selection ensures you find the perfect
                    fit.</p>
            </div>

            <div class="row">

                @if ($applied_jobs->isNotEmpty())
                    @foreach ($applied_jobs as $applied_job)
                        <div class="col-lg-12">
                            <div class="job-card-two">
                                <div class="row align-items-center">
                                    <div class="col-md-1">
                                        <div class="company-logo">
                                            <a href="{{ route('home.job_details', $applied_job->job->id) }}">
                                                @if (!empty($job->company->company_logo))
                                                    <img src="{{ asset('companies_logo/' . $job->company->company_logo) }}"
                                                        class="img-thumbnail" alt="company logo">
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
                                                    href="{{ route('home.job_details', $applied_job->job->id) }}">{{ $applied_job->job->job_title }}</a>
                                            </h3>
                                            <ul>
                                                <li>
                                                    <i class='bx bx-briefcase'></i>
                                                    {{ $applied_job->job->category->name }}
                                                </li>
                                                <li>
                                                    <i class='bx bx-briefcase'></i>
                                                    Salary:
                                                    {{ $applied_job->job->salary ? $applied_job->job->salary . ' INR' : 'Not mentioned' }}
                                                </li>
                                                <li>
                                                    <i class='bx bx-location-plus'></i>
                                                    {{ $applied_job->job->location }}
                                                </li>
                                                <li>
                                                    <i class='bx bx-stopwatch'></i>
                                                    {{ \Carbon\Carbon::parse($applied_job->job->created_at)->format('d M, Y') }}
                                                </li>
                                            </ul>

                                            <span>{{ $applied_job->job->job_type->name }}</span>
                                            @if ($applied_job->job->status == 1)
                                                <span>Active</span>
                                            @else
                                                <span>Block</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="theme-btn text-end">
                                            <a href="{{ route('home.job_details', $applied_job->job->id) }}"
                                                class="default-btn">
                                                Browse Job
                                            </a>
                                            <a href="#" onclick="remove_job({{ $applied_job->id }})"
                                                class="default-btn ml-2">
                                                Remove
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            @if ($applied_jobs->isNotEmpty())
                {{ $applied_jobs->links() }}
            @else
                <div class="section-title text-center">
                    <h3>No Jobs Found.</h3>
                </div>
            @endif
        </div>
    </section>
@endsection

@section('customJs')
    <script type="text/javascript">
        function remove_job(id) {
            if (confirm("Are you sure you want to remove?")) {
                $.ajax({
                    url: '{{ route('account.remove_applied_jobs') }}',
                    type: 'post',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        window.location.href = '{{ route('account.applied_jobs') }}';
                    }
                });
            }
        }
    </script>
@endsection
