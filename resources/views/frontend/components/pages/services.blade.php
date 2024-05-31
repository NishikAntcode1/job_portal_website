@extends('frontend.layouts.app')

@section('main')
    <!-- Page Title Start -->
    <section class="page-title title-bg17">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Services</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Services</li>
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

    <!-- Faq Section Start -->
    <section class="faq-section pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Provided Services</h2>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="accordions">
                        <div class="accordion-item">
                            <div class="accordion-title" data-tab="item1">
                                <h2>Lateral Hiring<i class='bx bx-chevrons-right down-arrow'></i></h2>
                            </div>
                            <div class="accordion-content" id="item1">
                                <p>Lateral Hiring involves bringing experienced professionals into your organization to fill
                                    key positions. We specialize in identifying and attracting top talent who can seamlessly
                                    integrate into your company and contribute from day one. Our team leverages an extensive
                                    network and industry expertise to ensure you get candidates who not only meet the
                                    technical requirements but also fit your organizational culture.
                                </p>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <div class="accordion-title" data-tab="item2">
                                <h2>Fresher Hiring<i class='bx bx-chevrons-right down-arrow'></i></h2>
                            </div>
                            <div class="accordion-content" id="item2">
                                <p>Our Fresher Hiring service is designed to help you find and onboard new graduates who are
                                    eager to start their careers. We collaborate with leading educational institutions and
                                    utilize cutting-edge assessment tools to identify the most promising young talent. Our
                                    comprehensive recruitment process ensures that you have access to enthusiastic and
                                    capable individuals ready to grow with your company.
                                </p>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <div class="accordion-title" data-tab="item3">
                                <h2>Executive Search<i class='bx bx-chevrons-right down-arrow'></i></h2>
                            </div>
                            <div class="accordion-content" id="item3">
                                <p> Executive Search is a specialized service aimed at finding senior-level executives who
                                    can drive strategic initiatives and lead your organization to new heights. We conduct an
                                    in-depth analysis of your company's leadership needs and engage in a meticulous search
                                    process to present you with candidates of the highest caliber. Our executive search
                                    experts maintain strict confidentiality and use a personalized approach to match you
                                    with visionary leaders.
                                </p>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <div class="accordion-title" data-tab="item4">
                                <h2>Recruitment Process Outsourcing (RPO)<i class='bx bx-chevrons-right down-arrow'></i>
                                </h2>
                            </div>
                            <div class="accordion-content" id="item4">
                                <p>Our RPO services allow you to outsource your recruitment processes to us, enabling you to
                                    focus on your core business activities. We manage the entire hiring process, from job
                                    profiling and sourcing to screening and onboarding. By leveraging our expertise,
                                    advanced technology, and proven methodologies, we deliver a streamlined, efficient, and
                                    scalable recruitment solution tailored to your needs.
                                </p>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <div class="accordion-title" data-tab="item5">
                                <h2>Payroll Management<i class='bx bx-chevrons-right down-arrow'></i></h2>
                            </div>
                            <div class="accordion-content" id="item5">
                                <p> Managing payroll can be complex and time-consuming. Our Payroll Management service
                                    simplifies this process by handling all aspects of payroll administration, including
                                    salary calculations, compliance, tax filing, and employee benefits. We ensure accuracy
                                    and timeliness, providing your employees with a seamless payroll experience and freeing
                                    up your resources to focus on strategic priorities.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
