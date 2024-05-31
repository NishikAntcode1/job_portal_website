@extends('frontend.layouts.app')

@section('main')
<section class="page-title title-bg11">
    <div class="d-table">
        <div class="d-table-cell">
            <h2>Edit A Job</h2>
            <ul>
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li>Edit A Job</li>
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

            <form method="POST" action="" class="job-post-from" id="edit_job_form">
                @csrf
                <h2>Edit Your Job information</h2>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Job Title*</label>
                            <input type="text" class="form-control" id="job_title" placeholder="Job Title"
                                name="job_title" value="{{ $job->job_title }}" required>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Job Category*</label>
                            <select class="category select" id="category" name="category" required>
                                <option value="" disabled selected>category</option>
                                @if ($categories->isNotEmpty())
                                    @foreach ($categories as $category)
                                        <option {{ $job->category_id == $category->id ? 'selected' : '' }}
                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Location*</label>
                            <input value="{{ $job->location }}" type="text" class="form-control" id="location"
                                name="location" placeholder="e.g. London" required>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Job Type*</label>
                            <select class="job_type select" id="job_type" name="job_type" required>
                                <option value="" disabled selected>Select job type</option>
                                @if ($job_types->isNotEmpty())
                                    @foreach ($job_types as $job_type)
                                        <option {{ $job->job_type_id == $job_type->id ? 'selected' : '' }}
                                            value="{{ $job_type->id }}">{{ $job_type->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Job Tags</label>
                            {{-- <input type="text" class="form-control" id="exampleInput6"
                                placeholder="e.g. web design, graphics design, video editing" required> --}}
                            <select class="tag select" id="tag" name="tags[]">
                                <option value="" disabled selected>Select a tag</option>
                                @if ($tags->isNotEmpty())
                                    @foreach ($tags as $tag)
                                        <option {{ optional($job_tag)->id == $tag->id ? 'selected' : '' }}
                                            value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Salary</label>
                            <input value="{{ $job->salary }}" type="number" class="form-control" id="salary"
                                name="salary" placeholder="e.g. $20,000">
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Experience</label>
                            <select class="experience select" name="experience" id="experience">
                                <option value="" disabled selected>experience</option>
                                {{-- <option data {{ ($job->experience == 1) ? 'selected' : '' }}-display="experience (In Yrs.)">Experience</option> --}}
                                <option value="0" {{ $job->experience == 0 ? 'selected' : '' }}>fresher</option>◘
                                <option value="1" {{ $job->experience == 1 ? 'selected' : '' }}>1 Year</option>
                                <option value="2" {{ $job->experience == 2 ? 'selected' : '' }}>2 Years</option>
                                <option value="3" {{ $job->experience == 3 ? 'selected' : '' }}>3 Years</option>
                                <option value="4" {{ $job->experience == 4 ? 'selected' : '' }}>4 Years</option>
                                <option value="5" {{ $job->experience == 5 ? 'selected' : '' }}>5 Years</option>
                                <option value="6" {{ $job->experience == 6 ? 'selected' : '' }}>6 Years</option>
                                <option value="7" {{ $job->experience == 7 ? 'selected' : '' }}>7 Years</option>
                                <option value="8" {{ $job->experience == 8 ? 'selected' : '' }}>8 Years</option>
                                <option value="9" {{ $job->experience == 9 ? 'selected' : '' }}>9 Years</option>
                                <option value="10 {{ $job->experience == 10 ? 'selected' : '' }}">10 Years</option>
                                <option value="10_plus {{ $job->experience == '10_plus' ? 'selected' : '' }}">10+ Years
                                </option>
                            </select>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Vacancy*</label>
                            <input value="{{ $job->vacancy }}" type="number" class="form-control" id="vacancy"
                                name="vacancy" placeholder="e.g. 4" required>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Job Description*</label>
                            <textarea class="form-control description-area textarea" id="job_description" name="job_description" rows="6"
                                placeholder="Job Description" required>{{ $job->job_description }}</textarea>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Benefits</label>
                            <textarea class="form-control description-area textarea" id="benefits" name="benefits" rows="4" placeholder="Benefits">{{ $job->benefits }}</textarea>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Responsibilty</label>
                            <textarea class="form-control description-area textarea" id="responsibilty" name="responsibilty" rows="4"
                                placeholder="Responsibilty">{{ $job->responsibilty }}</textarea>
                            <p></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Qualification</label>
                            <textarea class="form-control description-area textarea" id="qualification" name="qualification" rows="4"
                                placeholder="Qualification">{{ $job->qualification }}</textarea>
                            <p></p>
                        </div>
                    </div>

                </div>


                <h2>Comapny Details</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Company Name*</label>
                            <select class="company select" id="company_name" name="company_name" required>
                                <option value="" disabled selected>Company</option>
                                @if ($companies->isNotEmpty())
                                    @foreach ($companies as $company)
                                        <option {{ $job->company_id == $company->id ? 'selected' : '' }}
                                            value="{{ $company->id }}">{{ $company->company_name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Company Email*</label>
                            <input value="{{ $job->company_email }}" type="email" class="form-control"
                                id="company_email" name="company_email" placeholder="e.g. hello@company.com" required>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Company Website (Optional)</label>
                            <input value="{{ $job->company_website }}" type="text" class="form-control"
                                id="comapny_website" name="comapny_website" placeholder="e.g www.companyname.com">
                            <p></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    <button type="submit" class="post-btn m-4">
                        Update Job
                    </button>
                    <button onclick="delete_job({{ $job->id }})" class="post-btn m-4">
                        Remove
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('customJs')
    <script type="text/javascript">
        // $('#company_name').change(function() {
        //     var value = $(this).val();
        //     if (!value) {
        //         // empty value and make the input editable
        //         $("#company_email").val("").prop('readonly', false);
        //         return;
        //     }
        //     // set the value and make sure the user cannot edit it
        //     var name = $("option:selected", this).text();
        //     $("#company_email").val(name);
        // });

        function delete_job(jobId) {
            if (confirm("Are you sure you want to delete?")) {
                $.ajax({
                    url: '{{ route('account.delete_job') }}',
                    type: 'post',
                    data: {
                        job_id: jobId
                    },
                    dataType: 'json',
                    success: function(response) {
                        window.location.href = '{{ route('account.my_job_list') }}';
                    }
                });
            }
        }

        $("#edit_job_form").submit(function(e) {
            e.preventDefault();
            $("button[type='submit']").prop('disabled', true);
            // console.log($("#create_job_form").serializeArray());

            $.ajax({
                url: '{{ route('account.update_job', $job->id) }}',
                type: 'POST',
                dataType: 'json',
                data: $("#edit_job_form").serializeArray(),
                success: function(response) {
                    $("button[type='submit']").prop('disabled', false);

                    if (response.status == true) {

                        $("#job_title").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#category").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#job_type").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#vacancy").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#location").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')


                        $("#job_description").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#company_name").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')
                        $("#company_email").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        window.location.href = "{{ route('account.edit_job', $job->id) }}";


                    } else {
                        var errors = response.errors;

                        if (errors.job_title) {
                            $("#title").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.job_title)
                        } else {
                            $("#job_title").removeClass('is-invalid')
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

                        if (errors.job_type) {
                            $("#jobType").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.job_type)
                        } else {
                            $("#job_type").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.vacancy) {
                            $("#vacancy").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.vacancy)
                        } else {
                            $("#vacancy").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.location) {
                            $("#location").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.location)
                        } else {
                            $("#location").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.job_description) {
                            $("#description").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.job_description)
                        } else {
                            $("#description").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.company_name) {
                            $("#company_name").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.company_name)
                        } else {
                            $("#company_name").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.company_email) {
                            $("#company_email").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.company_email)
                        } else {
                            $("#company_email").removeClass('is-invalid')
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
