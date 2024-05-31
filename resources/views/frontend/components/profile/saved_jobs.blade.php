@extends('frontend.layouts.app')

@section('main')
    <section class="page-title title-bg11">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Home</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Saved Jobs</li>
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
                <h2>Saved Jobs</h2>
                <p>Discover opportunities tailored to your preferences. Our curated selection ensures you find the perfect
                    fit.</p>
            </div>

            <div class="row">

                @if ($saved_jobs->isNotEmpty())
                    @foreach ($saved_jobs as $saved_job)
                        <div class="col-lg-12">
                            <div class="job-card-two">
                                <div class="row align-items-center">
                                    <div class="col-md-1">
                                        <div class="">
                                            <a href="{{ route('home.job_details', $saved_job->job->id) }}">
                                                @if (!empty($saved_job->job->company->company_logo))
                                                    <img src="{{ asset('companies_logo/' .$saved_job->job->company->company_logo) }}"
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
                                                    href="{{ route('home.job_details', $saved_job->job->id) }}">{{ $saved_job->job->job_title }}</a>
                                            </h3>
                                            <ul>
                                                <li>
                                                    <i class='bx bx-briefcase'></i>
                                                    {{ $saved_job->job->category->name }}
                                                </li>
                                                <li>
                                                    <i class='bx bx-briefcase'></i>
                                                    Salary:
                                                    {{ $saved_job->job->salary ? $saved_job->job->salary . ' INR' : 'Not mentioned' }}
                                                </li>
                                                <li>
                                                    <i class='bx bx-location-plus'></i>
                                                    {{ $saved_job->job->location }}
                                                </li>
                                                <li>
                                                    <i class='bx bx-stopwatch'></i>
                                                    {{ \Carbon\Carbon::parse($saved_job->job->created_at)->format('d M, Y') }}
                                                </li>
                                            </ul>

                                            <span>{{ $saved_job->job->job_type->name }}</span>
                                            @if ($saved_job->job->status == 1)
                                                <span>Active</span>
                                            @else
                                                <span>Block</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="theme-btn text-end">
                                            <a href="{{ route('home.job_details', $saved_job->job->id) }}"
                                                class="default-btn">
                                                Browse Job
                                            </a>
                                            <a href="#" onclick="remove_job({{ $saved_job->id }})"
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
            @if ($saved_jobs->isNotEmpty())
                {{ $saved_jobs->links() }}
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
                    url: '{{ route('account.remove_saved_jobs') }}',
                    type: 'post',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        window.location.href = '{{ route('account.saved_jobs') }}';
                    }
                });
            }
        }
    </script>
@endsection
