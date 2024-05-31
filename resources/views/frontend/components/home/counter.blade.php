<div class="counter-section pt-100 pb-70">
    <div class="container">
        <div class="row counter-area">
            <div class="col-lg-3 col-6">
                <div class="counter-text">
                    <i class="flaticon-resume"></i>
                    <h2><span>{{ isset($counts['job_count']) ? $counts['job_count'] : 0 }}</span></h2>
                    <p>Job Posted</p>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="counter-text">
                    <i class="flaticon-recruitment"></i>
                    <h2><span>{{ isset($counts['job_application_count']) ? $counts['job_application_count'] : 0 }}</span></h2>
                    <p>Job Applied</p>
                </div>
            </div>
    
            <div class="col-lg-3 col-6">
                <div class="counter-text">
                    <i class="flaticon-portfolio"></i>
                    <h2><span>{{ isset($counts['company_count']) ? $counts['company_count'] : 0 }}</span></h2>
                    <p>Company</p>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="counter-text">
                    <i class="flaticon-employee"></i>
                    <h2><span>10</span></h2>
                    <p>Members</p>
                </div>
            </div>
        </div>
    </div>
</div>