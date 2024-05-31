@extends('frontend.layouts.app')

@section('main')
    <section class="categories-section category-style-two pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Choose Your Category</h2>
                <p>Discover job opportunities tailored to your skills and career goals. At Inside Unicorn, we have
                    roles across various fields, from entry-level to senior positions. Find your perfect match today.</p>
            </div>

            <div class="row">

                @if ($categories->isNotEmpty())
                    @foreach ($categories as $category)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <a href="{{ route('home.job_list') . '?category=' . $category->id }}">
                                <div class="category-card">
                                    <i class='flaticon-accounting'></i>
                                    <h3>{{ $category->name }}</h3>
                                    <p>{{ $category->total_vacancies == null ? 0 : $category->total_vacancies }} open
                                        position</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

            </div>

            @if ($categories->isNotEmpty())
                {{ $categories->links() }}
            @else
                <div class="section-title text-center">
                    <h3>No categories have been added yet.</h3>
                </div>
            @endif
        </div>
    </section>
@endsection
