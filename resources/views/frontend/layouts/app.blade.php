<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <!-- Owl Carousel Theme Default CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <!-- Box Icon CSS-->
    <link rel="stylesheet" href="{{ asset('assets/css/boxicon.min.css') }}">
    <!-- Flaticon CSS-->
    <link rel="stylesheet" href="{{ asset('assets/fonts/flaticon/flaticon.css') }}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <!-- Toast CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.toast.min.css') }}">
    {{-- trumbowyg textarea css  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/ui/trumbowyg.min.css"
        integrity="sha512-Fm8kRNVGCBZn0sPmwJbVXlqfJmPC13zRsMElZenX6v721g/H7OukJd8XzDEBRQ2FSATK8xNF9UYvzsCtUpfeJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .trumbowyg-button-pane {
            z-index: 0;
        }
    </style>
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Dark CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dark.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- Title CSS -->
    <title>{{ config('app.name') }}</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    @include('frontend.components.partials.pre_loader')
    @include('frontend.components.partials.navbar')
    @include('frontend.components.partials.message')
    @yield('main')
    {{-- @include('frontend.components.partials.subscribe') --}}
    @include('frontend.components.partials.footer')
    @include('frontend.components.partials.back_to_top')

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="profile_pic_modal_content">
                <div class="modal-header">
                    <h5 class="modal-title pb-0" id="exampleModalLabel">Change Profile Picture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="profilePicForm" name="profilePicForm" action="" method="">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="image" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" id="image" name="image"
                                accept=".jpg,.jpeg,.png">
                            <p class="text-danger" id="image-error"></p>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mx-3">Update</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Resume modal  --}}

    <div class="modal fade" id="resume_modal" tabindex="-1" aria-labelledby="resume_modal_lable" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="resume_modal_content">
                <div class="modal-header">
                    <h5 class="modal-title pb-0" id="resume_modal_lable">Upload Resume</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="resume_modal_form" name="resume_modal_form" action="" method="">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="image" class="form-label">Resume*</label>
                            <input type="file" class="form-control" id="resume" name="resume"
                                accept=".docx,.pdf,.doc">
                            <p class="text-danger" id="resume_error"></p>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-danger mx-3">Upload</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery first, then Bootstrap JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Owl Carousel JS -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!-- Nice Select JS -->
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <!-- Magnific Popup JS -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Subscriber Form JS -->
    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <!-- Form Velidation JS -->
    <script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
    <!-- Contact Form -->
    <script src="{{ asset('assets/js/contact-form-script.js') }}"></script>
    <!-- Meanmenu JS -->
    <script src="{{ asset('assets/js/meanmenu.js') }}"></script>
    <!-- Toast JS -->
    <script src="{{ asset('assets/js/jquery.toast.min.js') }}"></script>
    {{-- trumbowyg textarea Js  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js"
        integrity="sha512-YJgZG+6o3xSc0k5wv774GS+W1gx0vuSI/kr0E0UylL/Qg/noNspPtYwHPN9q6n59CTR/uhgXfjDXLTRI+uIryg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- <script src="https://cdnjs.com/libraries/pdf.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"
        integrity="sha512-q+4liFwdPC/bNdhUpZx6aXDx/h77yEQtn4I1slHydcbZK34nLaR3cAeYSJshoxIOq3mjEf7xJE8YWIUHMn+oCQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script>
        $('.textarea').trumbowyg({
            removeformatPasted: true
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $("#profilePicForm").submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '{{ route('account.update_profile_pic') }}',
                type: 'post',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == false) {
                        var errors = response.errors;
                        if (errors.image) {
                            $("#image-error").html(errors.image)
                        }
                    } else {
                        window.location.href = '{{ url()->current() }}';
                    }
                }
            });
        });

        $("#resume_modal_form").submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '{{ route('account.upload_resume') }}',
                type: 'post',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == false) {
                        var errors = response.errors;
                        if (errors.resume) {
                            $("#resume_error").html(errors.resume)
                        }
                    } else {
                        window.location.href = '{{ url()->current() }}';
                    }
                }
            });
        });

        $(document).ready(function() {
            var theme = localStorage.getItem('jovie_theme');
            var modalContent = $('#profile_pic_modal_content');
            var modalContentResume = $('#resume_modal_content');

            if (theme === 'theme-dark') {
                modalContent.css('background', 'rgb(0, 0, 0)');
                modalContentResume.css('background', 'rgb(0, 0, 0)');
            } else {
                modalContent.css('background', '');
            }
        });
    </script>


    @if (Session::has('success'))
        <script>
            $(document).ready(function() {
                $.toast({
                    icon: 'success',
                    heading: 'Success',
                    text: {!! json_encode(Session::get('success')) !!},
                    showHideTransition: 'fade',
                    position: 'top-right',
                    stack: false
                });
            });
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            $(document).ready(function() {
                $.toast({
                    icon: 'error',
                    heading: 'Error',
                    text: {!! json_encode(Session::get('error')) !!},
                    showHideTransition: 'fade',
                    position: 'top-right',
                    stack: false
                });
            });
        </script>
    @endif

    @yield('customJs')

</body>

</html>
