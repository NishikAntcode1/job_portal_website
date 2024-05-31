<section class="blog-section pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2>News, Tips & Articles</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus</p>
        </div>

        <div class="row">
            @if ($latest_blogs->isNotEmpty())
                @foreach ($latest_blogs as $blog)
                    <div class="col-lg-4 col-sm-6">
                        <div class="blog-card">
                            <div class="blog-img">
                                <a href="{{ route('home.blog_details', $blog->id) }}">
                                    @if (!empty($blog->main_image))
                                        <img src="{{ asset('blog_image/thumb/' . $blog->main_image) }}" alt="blog image">
                                    @else
                                        <img src="{{ asset('/assets/img/blog/1.jpg') }}" alt="blog image">
                                    @endif
                                </a>
                            </div>
                            <div class="blog-text">
                                <ul>
                                    <li>
                                        <i class='bx bxs-user'></i>
                                        {{ $blog->user->name }}
                                    </li>
                                    <li>
                                        <i class='bx bx-calendar'></i>
                                        {{ \Carbon\Carbon::parse($blog->created_at)->format('d M, Y') }}
                                    </li>
                                </ul>

                                <h3>
                                    <a href="{{ route('home.blog_details', $blog->id) }}">
                                        {{ $blog->title }}
                                    </a>
                                </h3>
                                <p>{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 150, '...') }}</p>

                                <a href="{{ route('home.blog_details', $blog->id) }}" class="blog-btn">
                                    Read More
                                    <i class='bx bx-plus bx-spin'></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
