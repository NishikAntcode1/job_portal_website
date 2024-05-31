<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\JobType;
use App\Models\Resume;
use App\Models\SavedJob;
use App\Models\Tag;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserOtherInfo;
use App\Models\UserSocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProfileController extends Controller
{

    protected $userId;


    public function __construct()
    {
        $this->userId = Auth::id();
    }


    public function Profile()
    {
        $user = User::with(['address', 'other_info', 'social_link'])->where('id', $this->userId)->first();
        // dd($user);
        return view('frontend.components.profile.account', [
            'user' => $user
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('otp.login');
    }

    public function update_basic_info(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5|max:20',
            'email' => 'required|email|unique:users,email,' . $this->userId . ',id',
            'mobile_no' => 'required|unique:users,mobile_no,' . $this->userId . ',id'
        ]);

        if ($validator->passes()) {

            $user = User::find($this->userId);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile_no = $request->mobile_no;
            $user->job_title = $request->job_title;
            $user->save();

            session()->flash('success', 'Profile updated successfully.');

            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function update_address(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip_code' => 'required|integer',
            'region' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        // Get the user and address data
        $user = User::with('address')->find($this->userId);
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found.',
            ]);
        }
        if (!$user->address) {
            // Create a new address record if it doesn't exist
            $address = new UserAddress();
            $address->user_id = $this->userId;
        } else {
            $address = $user->address;
        }

        $address->country = $request->input('country');
        $address->state = $request->input('state');
        $address->city = $request->input('city');
        $address->zip_code = $request->input('zip_code');
        $address->region = $request->input('region');
        $address->save();

        session()->flash('success', 'Address updated successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }

    public function update_other_info(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'age' => 'nullable|integer',
            'work_experience' => 'nullable|integer',
            // 'language' => 'nullable',
            'skill' => 'nullable|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        // Get the user and other_info data
        $user = User::with('other_info')->find($this->userId);
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found.',
            ]);
        }
        if (!$user->other_info) {
            // Create a new address record if it doesn't exist
            $other_info = new UserOtherInfo();
            $other_info->user_id = $this->userId;
        } else {
            $other_info = $user->other_info;
        }

        $other_info->age = $request->input('age');
        $other_info->work_experience = $request->input('work_experience');
        // $other_info->language = $request->input('language');
        $other_info->skill = $request->input('skill');
        $other_info->save();

        session()->flash('success', 'Other Infos updated successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }

    public function update_social_links(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linked_in' => 'nullable|url',
            'git_hub' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        // Get the user and other_info data
        $user = User::with('social_link')->find($this->userId);

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found.',
            ]);
        }
        if (!$user->social_link) {
            // Create a new address record if it doesn't exist
            $social_link = new UserSocialLink();
            $social_link->user_id = $this->userId;
        } else {
            $social_link = $user->social_link;
        }

        $social_link->facebook = $request->input('facebook');
        $social_link->twitter = $request->input('twitter');
        $social_link->linked_in = $request->input('linked_in');
        $social_link->git_hub = $request->input('git_hub');
        $social_link->save();

        session()->flash('success', 'Social Links updated successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }

    public function update_profile_pic(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'image' => 'required|image'
        ]);

        if ($validator->passes()) {

            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = $this->userId . '-' . time() . '.' . $ext;
            $image->move(public_path('/profile_pic/'), $imageName);


            // Create a small thumbnail
            $sourcePath = public_path('/profile_pic/' . $imageName);
            $manager = new ImageManager(Driver::class);
            $image = $manager->read($sourcePath);

            // crop the best fitting 5:3 (600x360) ratio and resize to 600x360 pixel
            $image->cover(150, 150);
            $image->toPng()->save(public_path('/profile_pic/thumb/' . $imageName));

            // Delete Old Profile Pic
            File::delete(public_path('/profile_pic/thumb/' . Auth::user()->profile_pic));
            File::delete(public_path('/profile_pic/' . Auth::user()->profile_pic));

            User::where('id', $this->userId)->update(['profile_pic' => $imageName]);

            session()->flash('success', 'Profile picture updated successfully.');

            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function create_job()
    {

        $Categories = Category::orderBy('name', 'ASC')->where('status', 1)->get();
        $job_types = JobType::orderBy('name', 'ASC')->where('status', 1)->get();
        $companies = Company::orderBy('company_name', 'ASC')->where('status', 1)->get();
        $tags = Tag::orderBy('name', 'ASC')->get();

        return view('frontend.components.profile.post_job', [
            'categories' => $Categories,
            'job_types' => $job_types,
            'companies' => $companies,
            'tags' => $tags,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $rules = [
            'job_title' => 'required|min:5|max:200',
            'category' => 'required|integer',
            'job_type' => 'required',
            'location' => 'reqired',
            'vacancy' => 'required|integer',
            'location' => 'required|max:50',
            'job_description' => 'required',
            'company_name' => 'required|integer',
            'company_email' => 'required|email'

        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {

            $job = new Job();
            $job->job_title = $request->job_title;
            $job->category_id = $request->category;
            $job->job_type_id  = $request->job_type;
            $job->user_id = Auth::user()->id;
            $job->vacancy = $request->vacancy;
            $job->experience = $request->experience;
            $job->salary = $request->salary;
            $job->location = $request->location;
            $job->job_description = $request->job_description;
            $job->benefits = $request->benefits;
            $job->responsibilty = $request->responsibilty;
            $job->qualification = $request->qualification;
            $job->company_id = $request->company_name;
            $job->company_website = $request->comapny_website;
            $job->company_email = $request->company_email;
            $job->save();

            if ($request->has('tags')) {
                $job->tags()->attach($request->tags);
            }

            session()->flash('success', 'Job added successfully.');
            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function my_job_list()
    {
        $jobs = Job::where('user_id', $this->userId)->orderBy('updated_at', 'ASC')->paginate(5);

        return view('frontend.components.profile.my_jobs', [
            'jobs' => $jobs
        ]);
    }

    public function edit_job(Request $request, $id)
    {

        $Categories = Category::orderBy('name', 'ASC')->where('status', 1)->get();
        $job_types = JobType::orderBy('name', 'ASC')->where('status', 1)->get();
        $companies = Company::orderBy('company_name', 'ASC')->where('status', 1)->get();
        $tags = Tag::orderBy('name', 'ASC')->get();

        $job = Job::where([
            'user_id' => Auth::user()->id,
            'id' => $id
        ])->first();

        if ($job == null) {
            abort(404);
        }

        if ($job->has('tags')) {
            $job_tag =  $job->tags()->first();
        }
        return view('frontend.components.profile.edit', [
            'categories' => $Categories,
            'job_types' => $job_types,
            'companies' => $companies,
            'tags' => $tags,
            'job' => $job,
            'job_tag' => $job_tag
        ]);
    }

    public function update_job(Request $request, $id)
    {
        // dd($request);
        $rules = [
            'job_title' => 'required|min:5|max:200',
            'category' => 'required|integer',
            'job_type' => 'required',
            'location' => 'reqired',
            'vacancy' => 'required|integer',
            'location' => 'required|max:50',
            'job_description' => 'required',
            'company_name' => 'required|integer',
            'company_email' => 'required|email'

        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {

            $job = Job::find($id);
            $job->job_title = $request->job_title;
            $job->category_id = $request->category;
            $job->job_type_id  = $request->job_type;
            $job->user_id = Auth::user()->id;
            $job->vacancy = $request->vacancy;
            $job->experience = $request->experience;
            $job->salary = $request->salary;
            $job->location = $request->location;
            $job->job_description = $request->job_description;
            $job->benefits = $request->benefits;
            $job->responsibilty = $request->responsibilty;
            $job->qualification = $request->qualification;
            $job->company_id = $request->company_name;
            $job->company_website = $request->comapny_website;
            $job->company_email = $request->company_email;
            $job->save();

            if ($request->has('tags')) {
                $job->tags()->attach($request->tags);
            }

            session()->flash('success', 'Job updated successfully.');

            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function delete_job(Request $request)
    {
        $job = Job::where([
            'user_id' => Auth::user()->id,
            'id' => $request->job_id
        ])->first();


        if ($job == null) {
            session()->flash('error', 'Either job deleted or not found.');
            return response()->json([
                'status' => true
            ]);
        }

        Job::where('id', $request->job_id)->delete();
        session()->flash('success', 'Job deleted successfully.');
        return response()->json([
            'status' => true
        ]);
    }

    public function job_details($id) {
        $job = Job::where([
            'id' => $id,
            'status' => 1
        ])->first();

        if ($job == null) {
            abort(404);
        }

        $applications = JobApplication::where([
            'job_id' => $id,
            'employer_id' => $this->userId
        ])->with('user')->get();

        $job_tags = $job->tags;

        // Check if job tags exist and are not null
        if ($job_tags !== null) {
            return view('frontend.components.profile.my_job_details', [
                'job' => $job,
                'job_tags' => $job_tags,
                'applications' => $applications
            ]);
        } else {
            // No job tags found or job_tags is null
            return view('frontend.components.profile.my_job_details', [
                'job' => $job,
                'job_tags' => collect() // Create an empty collection
            ]);
        }
    }

    public function applied_jobs()
    {
        $applied_jobs = JobApplication::where([
            'user_id' => Auth::user()->id
        ])->with(['job', 'job.job_type', 'job.applications'])
            ->orderBy('created_at', 'DESC')
            ->paginate(5);

        return view('frontend.components.profile.applied_jobs', [
            'applied_jobs' => $applied_jobs
        ]);
    }

    public function remove_applied_jobs(Request $request)
    {
        $applied_job = JobApplication::where(
            [
                'id' => $request->id,
                'user_id' => Auth::user()->id
            ]
        )->first();

        if ($applied_job == null) {
            session()->flash('error', 'Job not found');
            return response()->json([
                'status' => false,
            ]);
        }

        JobApplication::find($request->id)->delete();
        session()->flash('success', 'Job removed successfully.');

        return response()->json([
            'status' => true,
        ]);
    }

    public function delete_application(Request $request) {
        $application = JobApplication::where([
            'employer_id' => Auth::user()->id,
            'id' => $request->application_id
        ])->first();


        if ($application == null) {
            session()->flash('error', 'Either application deleted or not found.');
            return response()->json([
                'status' => true
            ]);
        }

        Job::where('id', $request->job_id)->delete();
        session()->flash('success', 'Application deleted successfully.');
        return response()->json([
            'status' => true
        ]);
    }

    public function saved_jobs()
    {
        $saved_jobs = SavedJob::where([
            'user_id' => Auth::user()->id
        ])->with(['job', 'job.job_type', 'job.applications'])
            ->orderBy('created_at', 'DESC')
            ->paginate(5);

        return view('frontend.components.profile.saved_jobs', [
            'saved_jobs' => $saved_jobs
        ]);
    }

    public function remove_saved_jobs(Request $request)
    {
        $savedJob = SavedJob::where(
            [
                'id' => $request->id,
                'user_id' => Auth::user()->id
            ]
        )->first();

        if ($savedJob == null) {
            session()->flash('error', 'Job not found');
            return response()->json([
                'status' => false,
            ]);
        }

        SavedJob::find($request->id)->delete();
        session()->flash('success', 'Job removed successfully.');

        return response()->json([
            'status' => true,
        ]);
    }

    public function upload_resume(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'resume' => 'required|mimes:doc,pdf,docx|max:2048'
        ]);

        if ($validator->passes()) {
            $resume = $request->resume;
            $ext = $resume->getClientOriginalExtension();
            $resumeName = $this->userId . '-' . time() . '.' . $ext;
            $resume->move(public_path('/cvs/'), $resumeName);

            // File::delete(public_path('/profile_pic/' . Auth::user()->profile_pic));

            $existingResume = Resume::where('user_id', $this->userId)->first();

            // Delete the old resume if it exists
            if ($existingResume) {
                File::delete(public_path('/cvs/' . $existingResume->resume));
                $existingResume->delete();
            }
            Resume::create([
                'user_id' => $this->userId,
                'resume' => $resumeName,
            ]);

            session()->flash('success', 'Your resume updated successfully.');

            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function get_resume()
    {
        $resume = Resume::where('user_id', $this->userId)->first();
        
        if ($resume) {
            return view('frontend.components.profile.resume', ['resume' => $resume]);
        }
    
        // If no resume is found, return the view without the resume path
        return view('frontend.components.profile.resume');
    }
}
