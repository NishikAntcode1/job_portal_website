<section class="categories-section category-style-three pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2>Choose Your Category</h2>
            <p>Discover job opportunities tailored to your skills and career goals. At Inside Unicorn, we have
                roles across various fields, from entry-level to senior positions. Find your perfect match today.</p>
        </div>

        <div class="row">
            @if ($categories->isNotEmpty())
                @foreach ($categories as $category)
                    <div class="col-lg-3  col-md-4 col-sm-6 offset-md-2 offset-lg-0">
                        <a href="{{ route('home.job_list') . '?category=' . $category->id }}">
                            <div class="category-card">
                                <i class={{ $category->icon }}></i>
                                <h3>{{ $category->name }}</h3>
                                <p>{{ $category->total_vacancies == null ? 0 : $category->total_vacancies }} open
                                    position</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
