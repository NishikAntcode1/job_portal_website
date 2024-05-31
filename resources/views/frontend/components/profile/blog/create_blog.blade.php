@extends('frontend.layouts.app')

@section('main')
<section class="page-title title-bg1">
    <div class="d-table">
        <div class="d-table-cell">
            <h2>Home</h2>
            <ul>
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li>Post A Blog</li>
            </ul>
        </div>
    </div>
    <div class="lines">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</section>
    <div class="job-post ptb-100">
        <div class="container">
            <form method="POST" action="" class="job-post-from" id="create_blog_form">
                @csrf
                <h2>Fill Up Your Blog information</h2>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Blog Title*</label>
                            <input type="text" class="form-control" id="title" placeholder="Blog Title" name="title"
                                required>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Blog Category*</label>
                            <select class="category select" id="category" name="category" >
                                <option value="" disabled selected>Blog Category</option>
                                @if ($blog_categories->isNotEmpty())
                                    @foreach ($blog_categories as $blog_category)
                                        <option value="{{ $blog_category->id }}">{{ $blog_category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="content">Content*</label>
                            <textarea class="form-control description-area textarea" id="content" name="content" rows="6" placeholder="Content"
                                required></textarea>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="main_image">Blog Image*</label>
                            <input type="file" class="form-control" id="main_image" name="main_image" accept=".jpg,.jpeg,.png"
                                placeholder="Upload Image" required>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-12 text-center">
                        <button type="submit" class="post-btn">
                            Post A Blog
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection

@section('customJs')
    <script type="text/javascript">

        $("#create_blog_form").submit(function(e) {
            e.preventDefault();
            $("button[type='submit']").prop('disabled', true);
            // console.log($("#create_blog_form").serializeArray());
            var formData = new FormData(this);
            console.log(formData);

            $.ajax({
                url: '{{ route('account.store_blog') }}',
                type: 'POST',
                dataType: 'json',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $("button[type='submit']").prop('disabled', false);

                    if (response.status == true) {

                        $("#title").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#category").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#content").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#main_image").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')


                        window.location.href = "{{ route('home.account') }}";


                    } else {
                        var errors = response.errors;

                        if (errors.job_title) {
                            $("#title").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.title)
                        } else {
                            $("#title").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.category) {
                            $("#category").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.category)
                        } else {
                            $("#category").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.content) {
                            $("#content").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.content)
                        } else {
                            $("#content").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.main_image) {
                            $("#vacancy").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.main_image)
                        } else {
                            $("#main_image").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }




                    }

                }
            });
        });
    </script>
@endsection
