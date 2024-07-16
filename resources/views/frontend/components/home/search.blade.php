<div class="find-section ptb-100">
    <div class="container">
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