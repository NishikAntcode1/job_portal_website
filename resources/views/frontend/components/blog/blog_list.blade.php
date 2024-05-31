@extends('frontend.layouts.app')

@section('main')
    <section class="page-title title-bg24">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Blog</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Blog</li>
                </ul>
            </div>
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>
    <section class="blog-section blog-style-two pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>News, Tips & Articles</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus</p>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @if ($blogs->isNotEmpty())
                            @foreach ($blogs as $blog)
                                <div class="col-md-6 col-sm-6">
                                    <div class="blog-card">
                                        <div class="blog-img">
                                            <a href="{{ route('home.blog_details', $blog->id) }}">
                                                @if (!empty($blog->main_image))
                                                    <img src="{{ asset('blog_image/thumb/' . $blog->main_image) }}"
                                                        alt="blog image">
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
                                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 150, '...') }}
                                            </p>

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

                    @if ($blogs->isNotEmpty())
                        {{ $blogs->links() }}
                    @else
                        <div class="section-title text-center">
                            <h3>No blogs have been added yet.</h3>
                        </div>
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="blog-widget blog-search">
                        <form method="GET" action="{{ route('home.blog_list') }}">
                            <div class="form-group">
                                <input type="text" class="form-control" id="keyword" name="keyword"
                                    placeholder="Search">
                                <button type="submit">
                                    <i class='bx bx-search-alt-2'></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="blog-widget">
                        <h3>Popular Post</h3>

                        <article class="popular-post">
                            <a href="#" class="blog-thumb">
                                <img src="{{ asset('/assets/img/blog/popular-post1.jpg') }}" alt="blog image">
                            </a>

                            <div class="info">
                                <time datetime="2021-04-08">May 8, 2021</time>
                                <h4>
                                    <a href="#">Looking for Highly Motivated Product to
                                        Build</a>
                                </h4>
                            </div>
                        </article>

                        <article class="popular-post">
                            <a href="#" class="blog-thumb">
                                <img src="{{ asset('/assets/img/blog/popular-post2.jpg') }}" alt="blog image">
                            </a>

                            <div class="info">
                                <time datetime="2021-04-08">May 5, 2021</time>
                                <h4>
                                    <a href="#">
                                        How to Indroduce in Yourself in Job Interview?
                                    </a>
                                </h4>
                            </div>
                        </article>

                        <article class="popular-post">
                            <a href="#" class="blog-thumb">
                                <img src="{{ asset('/assets/img/blog/popular-post3.jpg') }}" alt="blog image">
                            </a>

                            <div class="info">
                                <time datetime="2021-04-08">April 20, 2021</time>
                                <h4>
                                    <a href="#">
                                        Economy Growth is Being Increased by IT Sectors
                                    </a>
                                </h4>
                            </div>
                        </article>

                        <article class="popular-post">
                            <a href="#" class="blog-thumb">
                                <img src="{{ asset('/assets/img/blog/popular-post4.jpg') }}" alt="blog image">
                            </a>

                            <div class="info">
                                <time datetime="2021-04-08">April 28, 2021</time>
                                <h4>
                                    <a href="#">
                                        10 Things You Should Know Before Apply
                                    </a>
                                </h4>
                            </div>
                        </article>
                    </div>

                    <div class="blog-widget blog-category">
                        <h3>Category</h3>
                        @if ($blog_categories->isNotEmpty())
                            <ul>
                                @foreach ($blog_categories as $blog_category)
                                    @if ($blog_category->blogs_count > 0)
                                        <li>
                                            <a
                                                href="{{ route('home.blog_list') . '?category=' . $blog_category->id }}">{{ $blog_category->name }}</a>
                                            <span>({{ $blog_category->blogs_count }})</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    {{-- <div class="blog-widget blog-tags">
                        <h3>Tags</h3>
                        <ul>
                            <li>
                                <a href="{{ url('#') }}">Web Design</a>
                            </li>
                            <li>
                                <a href="{{ url('#') }}">Job Tips</a>
                            </li>
                            <li>
                                <a href="{{ url('#') }}">UX Design</a>
                            </li>
                            <li>
                                <a href="{{ url('#') }}">Tips & Tricks</a>
                            </li>
                            <li>
                                <a href="{{ url('#') }}">Writting</a>
                            </li>
                            <li>
                                <a href="{{ url('#') }}">Business</a>
                            </li>
                            <li>
                                <a href="{{ url('#') }}">Resume</a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
