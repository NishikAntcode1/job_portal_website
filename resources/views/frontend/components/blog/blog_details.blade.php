@extends('frontend.layouts.app')

@section('main')
    <section class="blog-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="blog-widget blog-search">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <button>
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

                <div class="col-lg-8">
                    <div class="blog-dedails-text">
                        <div class="blog-details-img">
                            @if (!empty($blog->main_image))
                                <img src="{{ asset('blog_image/' . $blog->main_image) }}"
                                    alt="blog image">
                            @else
                                <img src="{{ asset('/assets/img/blog/blog-details.jpg') }}" alt="blog image">
                            @endif
                        </div>
                        
                        <div class="blog-meta">
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
                        </div>

                        <h3 class="post-title">{{ $blog->title }}</h3>

                        {!! nl2br($blog->content) !!}

                        

                        {{-- <div class="row">
                            <div class="col-sm-6">
                                <img src="{{ asset('/assets/img/blog/blog-details2.jpg') }}" class="details-inner-img"
                                    alt="blog details image">
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset('/assets/img/blog/blog-details3.jpg') }}" class="details-inner-img"
                                    alt="blog details image">
                            </div>
                        </div> --}}

                        {{-- <p>It is a long established fact that a reader will be distracted by the readable content of a page
                            when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                            distribution of letters, as opposed to using 'Content here, content here', making it look like
                            readable English.</p>

                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                            classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock.</p>

                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book</p>

                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                            alteration in some form, by injected humour, or randomised words which don't look even slightly
                            believable.</p> --}}


                        {{-- <div class="details-tag">
                            <ul>
                                <li>Tags:</li>
                                <li>
                                    <a href="{{ url('#') }}">Business</a>
                                </li>
                                <li>
                                    <a href="{{ url('#') }}">Resume</a>
                                </li>
                                <li>
                                    <a href="{{ url('#') }}">Develpment</a>
                                </li>
                            </ul>
                        </div> --}}


                        {{-- <form class="comment-form">
                            <h3>Leave a Reply</h3>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" placeholder="Your Name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Your Name">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Comment</label>
                                        <textarea class="form-control comment-box" cols="30" rows="6" placeholder="Your Comment"></textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="comment-btn">
                                Post a Comment
                            </button>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
