<div class="col-md-4">
    <div class="account-information">
        <div class="profile-thumb">
            <div class="profile-pic-wrapper">
                <button class="pic-holder" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">

                    @if (!empty(Auth::user()->profile_pic))
                        <img id="profilePic" class=""
                            src="{{ asset('profile_pic/thumb/' . Auth::user()->profile_pic) }}" alt="Profile Picture">
                    @else
                        <img id="profilePic" class="" src={{ asset('storage/profile_demo.jpg') }}
                            alt="Profile Picture">
                    @endif
                    <label for="profilePicInput" class="upload-file-block">
                        <div class="text-center">
                            <div class="mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" id="Camera" x="0" y="0" version="1.1"
                                    style="width: 33px" viewBox="0 0 29 29" xml:space="preserve">
                                    <!-- Circle for the camera -->
                                    <circle cx="14.5" cy="16.5" r="3.5" fill="#ffffff"
                                        class="color000000 svgShape"></circle>
                                    <!-- Path for the camera body -->
                                    <path
                                        d="M25 8h-3.279a1 1 0 0 1-.949-.684l-.316-.949A2 2 0 0 0 18.558 5h-8.117a2 2 0 0 0-1.897 1.368l-.316.948A1 1 0 0 1 7.279 8H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h21a2 2 0 0 0 2-2V10a2 2 0 0 0-2-2zM14.5 22C11.468 22 9 19.532 9 16.5s2.468-5.5 5.5-5.5 5.5 2.468 5.5 5.5-2.468 5.5-5.5 5.5zm6-10a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"
                                        fill="#ffffff" class="color000000 svgShape"></path>
                                    <!-- Path for a small detail -->
                                    <path d="M5.5 7h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 0 1z" fill="#ffffff"
                                        class="color000000 svgShape"></path>
                                </svg>
                            </div>
                            <div class="text-uppercase">
                                Update <br /> Profile Photo
                            </div>
                        </div>
                    </label>
                </button>
            </div>

            {{-- <img src="{{ asset('/assets/img/account.jpg') }}" alt="account holder image"> --}}
            <h3>{{ $user->name }}</h3>
            <p>{{ $user->job_title }}</p>
        </div>

        <ul>
            <li>
                <a href="{{ url('home/account') }}" class="active">
                    <i class='bx bx-user'></i>
                    My Profile
                </a>
            </li>
            <li>
                <a href="{{ route('account.resume') }}">
                    <i class='bx bxs-file-doc'></i>
                    My Resume
                </a>
            </li>
            <li>
                <a href="{{ route('account.applied_jobs') }}">
                    <i class='bx bx-briefcase'></i>
                    Applied Jobs
                </a>
            </li>
            {{-- <li>
                <a href="{{ url('#') }}">
                    <i class='bx bx-envelope'></i>
                    Messages
                </a>
            </li> --}}
            @if (Auth::check() && Auth::user()->role == 'admin')
                <li>
                    <a href="{{ route('account.create_job') }}">
                        <i class='bx bx-briefcase'></i>
                        Post a Job
                    </a>
                </li>
            @endif
            @if (Auth::check() && Auth::user()->role == 'admin')
                <li>
                    <a href="{{ route('account.create_blog') }}">
                        <i class='bx bx-briefcase'></i>
                        Post a Blog
                    </a>
                </li>
                <li>
                    <a href="{{ route('account.my_job_list') }}">
                        <i class='bx bx-briefcase'></i>
                        My Jobs
                    </a>
                </li>
            @endif


            <li>
                <a href="{{ route('account.saved_jobs') }}">
                    <i class='bx bx-heart'></i>
                    Saved Jobs
                </a>
            </li>
            <li>
                <a href="{{ url('#') }}">
                    <i class='bx bx-coffee-togo'></i>
                    Delete Account
                </a>
            </li>
            <li>
                <a href="{{ route('account.logout') }}">
                    <i class='bx bx-log-out'></i>
                    Log Out
                </a>
            </li>
        </ul>
    </div>
</div>
