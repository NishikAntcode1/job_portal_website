@extends('frontend.layouts.app')

@section('main')
<section class="page-title title-bg1">
    <div class="d-table">
        <div class="d-table-cell">
            <h2>Business Enquiry</h2>
            <ul>
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li>Business Enquiry</li>
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
                <h2>Fill Up Your Enquiry Form</h2>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name*</label>
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name"
                                required>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Company*</label>
                            <input type="text" class="form-control" id="company" placeholder="Company/Organisation" name="company_name"
                                required>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Designation*</label>
                            <input type="text" class="form-control" id="designation" placeholder="Designation" name="designation"
                                required>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email*</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                                required>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone*</label>
                            <input type="number" class="form-control" id="phone" placeholder="Phone Number" name="phone"
                                required>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Location*</label>
                            <input type="text" class="form-control" id="location" placeholder="Location" name="location"
                                required>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Industry*</label>
                            <select class="category select" id="category" name="category">
                                <option value="" disabled selected>Industry</option>
                                @if ($categories->isNotEmpty())
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="content">Description*</label>
                            <textarea class="form-control description-area" id="description" name="description" rows="6" placeholder="Summery Of Requirement(200 characters max)*"
                            required></textarea>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-12 text-center">
                        <button type="submit" class="post-btn">
                            Submit
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection

{{-- @section('customJs')
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
@endsection --}}
