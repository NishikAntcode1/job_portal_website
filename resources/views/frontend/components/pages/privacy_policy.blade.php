@extends('frontend.layouts.app')

@section('main')
    <!-- Page Title Start -->
    <section class="page-title title-bg20">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Privacy and Policy</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Privacy and Policy</li>
                </ul>
            </div>
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>
    <!-- Page Title End -->

    <!-- Privacy Section Start -->
    <div class="privacy-section pt-100 pb-100">
        <div class="container">
            <div class="privacy-text">
                <h2>Introduction</h2>

                <p>Welcome to Inside Unicorn. We are committed to protecting your personal data and your privacy. This
                    Privacy
                    Policy outlines how we collect, use, disclose, and protect your information when you visit our website
                    and use our services.</p>
                <h2>Information We Collect</h2>
                <p>When you register on our website, apply for jobs, or interact with our services, we may collect personal
                    information such as your name, email address, phone number, mailing address, resume/CV, employment
                    history, education history, and job preferences. In addition, we may collect non-personal information,
                    such as your IP address, browser type and version, operating system, pages visited on our website, and
                    the time and date of your visits.</p>
                <h2>How We Use Your Information</h2>
                <p>We use the information we collect to provide and improve our services, match job seekers with potential
                    employers, and communicate with you, including sending job alerts and updates. Additionally, we process
                    your applications, manage your account, personalize your experience on our website, analyze website
                    usage, and comply with legal obligations.</p>

                <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text,
                    and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have
                    evolved over the years, sometimes by accident, sometimes on purpose.</p>

                <h2>Disclosure of Your Information</h2>
                <p>We may share your information with potential employers when you apply for a job and with service
                    providers who assist us in operating our website and providing our services. In certain circumstances,
                    we may disclose your information to law enforcement agencies if required by law or to protect our
                    rights. We may also share your information with other third parties with your consent.</p>

                <h2>Your Data Protection Rights</h2>
                <p>Depending on your jurisdiction, you may have certain rights regarding your personal data. These rights
                    may include the right to access your personal data, request correction of inaccurate or incomplete data,
                    request deletion of your personal data, request restriction of processing your data, object to
                    processing of your data, and request transfer of your data to another organization. To exercise any of
                    these rights, please contact us.</p>
            </div>
        </div>
    </div>
    <!-- Privacy Section End -->
@endsection
