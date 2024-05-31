<section class="company-location pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2>Companies By Location</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Quis ipsum suspendisse ultrices.</p>
        </div>
        <div class="row">
            @if ($locations->isNotEmpty())
                @foreach ($locations as $key => $location)
                    <a class="{{ $key == 2 || $key == 3 ? 'col-lg-6 col-md-6 col-sm-12' : 'col-lg-3 col-sm-6' }}" href="{{ route('home.job_list').'?location='.$location->location }}">
                        <div>
                            <div class="location-img">
                                <img src="{{ $key == 2 || $key == 3 ? 'assets/img/location/3.jpg' : 'assets/img/location/1.jpg' }}"
                                    alt="location image">

                                <div class="location-text">
                                    <div class="d-table">
                                        <div class="d-table-cell">
                                            <h3>{{ $location->location }}</h3>
                                            <span>{{ $location->total_jobs }} Jobs</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
</section>
