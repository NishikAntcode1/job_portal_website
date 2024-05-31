@extends('frontend.layouts.app')

@section('main')
    <section class="company-section company-style-two pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Top Companies</h2>
                <p>Explore top companies that are actively hiring on our platform. Connect with industry-leading
                    organizations and find your ideal workplace today.</p>
            </div>

            <div class="row">
                @if ($companies->isNotEmpty())
                    @foreach ($companies as $company)
                        <div class="col-lg-3 col-sm-6">
                            <div class="company-card">
                                <div class="company-logo">
                                    <a href="{{ route('home.job_list') . '?company=' . $company->id }}">
                                        @if (!empty($company->company_logo))
                                            <img src="{{ asset('companies_logo/' . $company->company_logo) }}"
                                                class="img-thumbnail" alt="company logo" style="width: 100px; height: 100px;">
                                        @else
                                            <img src="{{ asset('companies_logo/company_demo.jpg') }}" class="img-thumbnail"
                                                alt="company logo" style="width: 100px; height: 100px;">
                                        @endif
                                    </a>
                                </div>
                                <div class="company-text">
                                    <h3>{{ $company->company_name }}</h3>
                                    <p>
                                        <i class='bx bx-world'></i>
                                        {{ $company->company_website }}
                                    </p>
                                    <a href="{{ route('home.job_list') . '?company=' . $company->id }}" class="company-btn">
                                        {{ $company->total_vacancies == null ? 0 : $company->total_vacancies }} Open
                                        Position
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>

            @if ($companies->isNotEmpty())
                {{ $companies->links() }}
            @else
                <div class="section-title text-center">
                    <h3>No companies have been added yet.</h3>
                </div>
            @endif
        </div>
    </section>
@endsection
