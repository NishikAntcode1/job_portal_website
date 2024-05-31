@extends('frontend.layouts.app')

@section('main')

    <section class="page-title title-bg11">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Account</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Account</li>
                </ul>
            </div>
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>
    <section class="account-section ptb-100">
        <div class="container">
            <div class="row">

                @include('frontend.components.profile.sidebar')
                @include('frontend.components.partials.message')


                <div class="col-md-8">
                    <div class="account-details">
                        <h3>Basic Information</h3>
                        <form action="" method="" class="basic-info" id="user_basic_info" name="user_basic_info">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Your Name*</label>
                                        <input type="text" class="form-control" placeholder="Your Name" name="name"
                                            id="name" value="{{ $user->name }}" readonly>
                                        <p></p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Your Email*</label>
                                        <input type="email" class="form-control" placeholder="Your Email" name="email"
                                            id="email" value="{{ $user->email }}" readonly>
                                        <p></p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Your Phone*</label>
                                        <input type="text" class="form-control" placeholder="Your Phone" name="mobile_no"
                                            id="mobile_no" value="{{ $user->mobile_no }}" readonly>
                                        <p></p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Job Title</label>
                                        <input type="text" class="form-control" placeholder="Job Title" name="job_title"
                                            id="job_title" value="{{ optional($user)->job_title }}" readonly>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="button" class="account-btn edit-btn"
                                        onclick="toggleEdit('user_basic_info')">Edit</button>
                                    <button type="submit" class="account-btn save-btn" style="display: none;">Save</button>
                                </div>
                            </div>
                        </form>

                        <!-- Address Form -->
                        <h3>Address</h3>
                        <form action="" method="" class="candidate-address" id="user_address" name="user_address">
                            @csrf
                            <div class="row">
                                <!-- Address form fields here -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Your Country*</label>
                                        <input type="text" class="form-control" placeholder="Your Country" name="country"
                                            id="country" value="{{ optional($user->address)->country }}" readonly>
                                        <p></p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Your State*</label>
                                        <input type="text" class="form-control" placeholder="Your State" name="state"
                                            id="state" value="{{ optional($user->address)->state }}" readonly>
                                        <p></p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Your City*</label>
                                        <input type="text" class="form-control" placeholder="Your City" name="city"
                                            id="city" value="{{ optional($user->address)->city }}" readonly>
                                        <p></p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Zip Code*</label>
                                        <input type="number" class="form-control" placeholder="City Zip" name="zip_code"
                                            id="zip_code" value="{{ optional($user->address)->zip_code }}" readonly>
                                        <p></p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Region</label>
                                        <input type="text" class="form-control" placeholder="Your Region"
                                            name="region" id="region" value="{{ optional($user->address)->region }}"
                                            readonly>
                                        <p></p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="button" class="account-btn edit-btn"
                                        onclick="toggleEdit('user_address')">Edit</button>
                                    <button type="submit" class="account-btn save-btn"
                                        style="display: none;">Save</button>
                                </div>
                            </div>
                        </form>

                        <!-- Other Information Form -->
                        <h3>Other information</h3>
                        <form action="" method="" class="cadidate-others" id="user_other_info"
                            name="user_other_info">
                            @csrf
                            <div class="row">
                                <!-- Other information form fields here -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input type="number" class="form-control" placeholder="Your Age" name="age"
                                            id="age" value="{{ optional($user->other_info)->age }}" readonly>
                                        <p></p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Work Experience</label>
                                        <input type="number" class="form-control" placeholder="Work Experience"
                                            name="work_experience" id="work_experience"
                                            value="{{ optional($user->other_info)->work_experience }}" readonly>
                                        <p></p>
                                    </div>
                                </div>


                                {{-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Job Description*</label>
                                        <textarea class="form-control description-area" id="job_description" name="job_description" rows="6"
                                            placeholder="Job Description" required>{{ $job->job_description }}</textarea>
                                        <p></p>
                                    </div>
                                </div> --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="skill">Skills</label>
                                        <input type="text" class="form-control" placeholder="Skills" name="skill"
                                            id="skill" readonly value= "{{ optional($user->other_info)->skill }}" />
                                        <p></p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="button" class="account-btn edit-btn"
                                        onclick="toggleEdit('user_other_info')">Edit</button>
                                    <button type="submit" class="account-btn save-btn"
                                        style="display: none;">Save</button>
                                </div>
                            </div>
                        </form>

                        <!-- Social Links Form -->
                        <h3>Social links</h3>
                        <form action="" method="" class="candidates-sociak" id="user_sociak"
                            name="user_sociak">
                            @csrf
                            <div class="row">
                                <!-- Social links form fields here -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input type="text" class="form-control" placeholder="www.facebook.com/user"
                                            name="facebook" id="facebook"
                                            value="{{ optional($user->social_link)->facebook }}" readonly>
                                        <p></p>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Twitter</label>
                                        <input type="number" class="form-control" placeholder="www.twitter.com/user"
                                            name="twitter" id="twitter"
                                            value="{{ optional($user->social_link)->twitter }}" readonly>
                                        <p></p>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Linkedin</label>
                                        <input type="text" class="form-control" placeholder="www.Linkedin.com/user"
                                            name="linked_in" id="linked_in"
                                            value="{{ optional($user->social_link)->linked_in }}" readonly>
                                        <p></p>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Github</label>
                                        <input type="text" class="form-control" placeholder="www.Github.com/user"
                                            name="git_hub" id="git_hub"
                                            value="{{ optional($user->social_link)->git_hub }}" readonly>
                                        <p></p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="button" class="account-btn edit-btn"
                                        onclick="toggleEdit('user_sociak')">Edit</button>
                                    <button type="submit" class="account-btn save-btn"
                                        style="display: none;">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


@section('customJs')
    <script type="text/javascript">
        function toggleEdit(formId) {
            var form = document.getElementById(formId);
            var inputs = form.getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].readOnly = !inputs[i].readOnly;
            }

            var editBtn = form.querySelector('.edit-btn');
            var saveBtn = form.querySelector('.save-btn');
            if (editBtn.textContent === 'Edit') {
                editBtn.textContent = 'Cancel';
                saveBtn.style.display = 'inline-block';
            } else {
                editBtn.textContent = 'Edit';
                saveBtn.style.display = 'none';
            }
        }



        $("#user_basic_info").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('account.update_basic_info') }}',
                type: 'put',
                dataType: 'json',
                data: $("#user_basic_info").serializeArray(),
                success: function(response) {

                    if (response.status == true) {

                        $("#name").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#email").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#mobile_no").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        window.location.href = "{{ route('home.account') }}";

                    } else {
                        var errors = response.errors;

                        if (errors.name) {
                            $("#name").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.name)
                        } else {
                            $("#name").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.email) {
                            $("#email").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.email)
                        } else {
                            $("#email").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.mobile_no) {
                            $("#mobile_no").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.mobile_no)
                        } else {
                            $("#mobile_no").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                    }

                }
            });
        });

        $("#user_address").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('account.update_address') }}',
                type: 'put',
                dataType: 'json',
                data: $("#user_address").serializeArray(),
                success: function(response) {

                    if (response.status == true) {

                        $("#country").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#state").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#city").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')
                        $("#zip_code").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        window.location.href = "{{ route('home.account') }}";

                    } else {
                        var errors = response.errors;

                        if (errors.country) {
                            $("#country").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.country)
                        } else {
                            $("#country").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.state) {
                            $("#state").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.state)
                        } else {
                            $("#state").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.city) {
                            $("#city").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.city)
                        } else {
                            $("#city").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.zip_code) {
                            $("#zip_code").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.zip_code)
                        } else {
                            $("#zip_code").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                    }

                }
            });
        });

        $("#user_other_info").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('account.update_other_info') }}',
                type: 'put',
                dataType: 'json',
                data: $("#user_other_info").serializeArray(),
                success: function(response) {

                    if (response.status == true) {

                        $("#age").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#work_experience").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#skill").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        window.location.href = "{{ route('home.account') }}";

                    } else {
                        var errors = response.errors;

                        if (errors.age) {
                            $("#age").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.age)
                        } else {
                            $("#age").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.work_experience) {
                            $("#work_experience").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.work_experience)
                        } else {
                            $("#work_experience").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.skill) {
                            $("#skill").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.skill)
                        } else {
                            $("#skill").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                    }

                }
            });
        });

        $("#user_sociak").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('account.update_social_links') }}',
                type: 'put',
                dataType: 'json',
                data: $("#user_sociak").serializeArray(),
                success: function(response) {

                    if (response.status == true) {

                        $("#facebook").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#twitter").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#linked_in").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')
                        $("#git_hub").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        window.location.href = "{{ route('home.account') }}";

                    } else {
                        var errors = response.errors;

                        if (errors.facebook) {
                            $("#facebook").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.facebook)
                        } else {
                            $("#facebook").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.twitter) {
                            $("#twitter").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.twitter)
                        } else {
                            $("#twitter").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.linked_in) {
                            $("#linked_in").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.linked_in)
                        } else {
                            $("#linked_in").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.git_hub) {
                            $("#git_hub").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.git_hub)
                        } else {
                            $("#git_hub").removeClass('is-invalid')
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

@endsection
