<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)
            ->orderBy('name', 'ASC')
            ->withCount(['jobs as total_vacancies' => function ($query) {
                $query->select(DB::raw('sum(vacancy) as total_vacancies'));
            }])
            ->take(8)
            ->get();
        $dropdown_categories = Category::where('status', 1)->orderBy('name', 'ASC')->withCount('jobs')->get();

        $locations = Job::select('location', DB::raw('count(*) as total_jobs'))
            ->groupBy('location')
            ->take(6)
            ->get();

        $latest_jobs = Job::where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->take(6)->get();

        $job_count = Job::count();
        $job_application_count = JobApplication::count();
        $company_count = Company::count();

        $counts = [
            'job_count' => $job_count,
            'job_application_count' => $job_application_count,
            'company_count' => $company_count,
        ];

        $latest_blogs = Blog::orderBy('created_at', 'desc')->take(3)->get();

        return view('home', [
            'categories' => $categories,
            'locations' => $locations,
            'latest_jobs' => $latest_jobs,
            'counts' => $counts,
            'dropdown_categories' => $dropdown_categories,
            'latest_blogs' => $latest_blogs
        ]);
    }

    public function categories()
    {
        $categories = Category::where('status', 1)
            // ->orderBy('name', 'ASC')
            ->withCount(['jobs as total_vacancies' => function ($query) {
                $query->select(DB::raw('sum(vacancy) as total_vacancies'));
            }])
            ->paginate(8);

        return view('frontend.components.pages.categories', [
            'categories' => $categories
        ]);
    }

    public function companies()
    {
        $companies = Company::where('status', 1)
            ->orderBy('company_name', 'ASC')
            ->withCount(['jobs as total_vacancies' => function ($query) {
                $query->select(DB::raw('sum(vacancy) as total_vacancies'));
            }])
            ->paginate(8);

        return view('frontend.components.pages.companies', [
            'companies' => $companies
        ]);
    }

    public function faq() {
        return view('frontend.components.pages.faq');
    }
    public function testimonials() {
        return view('frontend.components.pages.testimonials');
    }
    public function privacy_policy() {
        return view('frontend.components.pages.privacy_policy');
    }
    public function term_condition() {
        return view('frontend.components.pages.term_condition');
    }
    public function about_us() {
        return view('frontend.components.pages.about_us');
    }
    public function services() {
        return view('frontend.components.pages.services');
    }

    public function business_enquiry() {

        $categories = Category::where('status', 1)->get();

        return view('frontend.components.pages.business_enquiry', [
            'categories' => $categories
        ]);
    }
}
