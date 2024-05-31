<div class="banner-section banner-style-five">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="banner-content text-center">
                    <h1>Find The Best Job For Future</h1>
                    <p>At Inside Unicorn, we believe the right job can transform your life. Our team helps you find
                        opportunities that match your skills, interests, and career goals.</p>
                </div>

                <form class="find-form" method="GET" action="{{ route('home.job_list') }}">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="keyword" id="keyword"
                                    placeholder="Job Title or Keyword">
                                <i class="bx bx-search-alt"></i>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="location" id="location"
                                    placeholder="Location">
                                <i class="bx bx-location-plus"></i>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <select class="category select" id="category" name="category">
                                <option value="" disabled selected>Category</option>
                                @if ($dropdown_categories->isNotEmpty())
                                    @foreach ($dropdown_categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-lg-3">
                            <button type="submit" class="find-btn">
                                Find A Job
                                <i class='bx bx-search'></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
