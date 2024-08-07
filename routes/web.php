<?php

use App\Http\Controllers\Auth\AuthOtpController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Job\JobController;
use App\Http\Controllers\Profile\CandidateController;
use App\Http\Controllers\Profile\ProfileController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('home/job_list', [JobController::class, 'index'])->name('home.job_list');
Route::get('home/job_list/job_details/{id}',[JobController::class,'details'])->name('home.job_details');
Route::post('/apply_job',[JobController::class,'apply_job'])->name('apply_job');
Route::post('/save_job',[JobController::class,'save_job'])->name('save_job');

Route::get('home/categories', [HomeController::class, 'categories'])->name('home.categories');
Route::get('home/companies', [HomeController::class, 'companies'])->name('home.companies');
Route::get('home/about_us', [HomeController::class, 'about_us'])->name('home.about_us');
Route::get('home/services', [HomeController::class, 'services'])->name('home.services');
Route::get('home/business_enquiry', [HomeController::class, 'business_enquiry'])->name('home.business_enquiry');
Route::get('home/contact_us', [HomeController::class, 'contact_us'])->name('home.contact_us');


Route::get('home/blog_list', [BlogController::class, 'index'])->name('home.blog_list');
Route::get('home/blog_list/blog_details/{id}',[BlogController::class,'details'])->name('home.blog_details');

Route::get('home/faq', [HomeController::class, 'faq'])->name('home.faq');
Route::get('home/testimonials', [HomeController::class, 'testimonials'])->name('home.testimonials');
Route::get('home/privacy_policy', [HomeController::class, 'privacy_policy'])->name('home.privacy_policy');
Route::get('home/term_condition', [HomeController::class, 'term_condition'])->name('home.term_condition');

Route::group(['prefix' => 'otp'], function () {
    Route::get('/login', [AuthOtpController::class, 'login'])->name('otp.login');
    Route::post('/generate', [AuthOtpController::class, 'generate'])->name('otp.generate');

    Route::get('/register', [AuthOtpController::class, 'register'])->name('otp.register');
    Route::post('/reg_generate', [AuthOtpController::class, 'reg_generate'])->name('otp.reg_generate');

    Route::get('/verification/{user_id}', [AuthOtpController::class, 'verification'])->name('otp.verification');
    Route::post('/login', [AuthOtpController::class, 'login_with_otp'])->name('otp.get_login');
});

Route::group(['Middleware' => 'auth'], function () {
    Route::get('/home/account', [ProfileController::class, 'profile'])->name('home.account');
    Route::get('/logout',[ProfileController::class,'logout'])->name('account.logout');
    Route::put('/update_basic_info', [ProfileController::class, 'update_basic_info'])->name('account.update_basic_info');
    Route::put('/update_address', [ProfileController::class, 'update_address'])->name('account.update_address');
    Route::put('/update_other_info', [ProfileController::class, 'update_other_info'])->name('account.update_other_info');
    Route::put('/update_social_links', [ProfileController::class, 'update_social_links'])->name('account.update_social_links');
    Route::post('/update_profile_pic', [ProfileController::class, 'update_profile_pic'])->name('account.update_profile_pic');

    Route::get('home/account/create_job', [ProfileController::class, 'create_job'])->name('account.create_job')->middleware('admin');
    Route::post('home/account/store_job', [ProfileController::class, 'store'])->name('account.store_job')->middleware('admin');
    Route::get('home/account/my_job_list', [ProfileController::class, 'my_job_list'])->name('account.my_job_list')->middleware('admin');
    Route::get('home/account/my_job_list/edit/{jobId}', [ProfileController::class, 'edit_job'])->name('account.edit_job')->middleware('admin');
    Route::post('home/account/my_job_list/update_job/{jobId}', [ProfileController::class, 'update_job'])->name('account.update_job')->middleware('admin');
    Route::post('home/account/my_job_list/delete_job', [ProfileController::class, 'delete_job'])->name('account.delete_job')->middleware('admin');
    Route::get('home/account/my_job_list/job_details/{id}', [ProfileController::class, 'job_details'])->name('account.job_details')->middleware('admin');
    Route::post('/delete_application',[ProfileController::class,'delete_application'])->name('account.delete_application');  

    Route::get('home/account/applied_jobs', [ProfileController::class, 'applied_jobs'])->name('account.applied_jobs');
    Route::post('/remove_applied_jobs',[ProfileController::class,'remove_applied_jobs'])->name('account.remove_applied_jobs');  

    Route::get('home/account/saved_jobs', [ProfileController::class, 'saved_jobs'])->name('account.saved_jobs');
    Route::post('/remove_saved_jobs',[ProfileController::class,'remove_saved_jobs'])->name('account.remove_saved_jobs');  

    Route::get('home/account/create_blog', [BlogController::class, 'create_blog'])->name('account.create_blog')->middleware('admin');
    Route::post('home/account/store_blog', [BlogController::class, 'store'])->name('account.store_blog')->middleware('admin');

    Route::Post('/upload_resume', [ProfileController::class, 'upload_resume'])->name('account.upload_resume');
    Route::get('home/account/resume', [ProfileController::class, 'get_resume'])->name('account.resume');

    Route::get('home/candidates_list', [CandidateController::class, 'index'])->name('home.candidates')->middleware('admin');
    Route::get('home/candidates_list/candidates_details/{candidateId}', [CandidateController::class, 'details'])->name('home.candidate_details')->middleware('admin');

    Route::get('/download-cv/{candidateId}', [CandidateController::class, 'download_cv'])->name('download.cv')->middleware('admin');

});

