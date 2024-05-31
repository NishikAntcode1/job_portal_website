<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserOtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthOtpController extends Controller
{

    public function login() {
        return view('auth.otp_login');
    }

    public function register() {
        return view('auth.otp_registration');
    }


    public function generate(Request $request) {

        $request->validate([
            'mobile_no' => ['required', 'exists:users,mobile_no']
        ]);

        $user_otp = $this->generate_otp($request->mobile_no);
        $user_otp->sendSMS($request->mobile_no); // otp sent

        return redirect()->route('otp.verification',[$user_otp->user_id])
                ->with('success', 'OTP has been sent to your Mobile Number!');

    }

    public function reg_generate(Request $request) {

        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'mobile_no' => ['required', 'string', 'unique:users,mobile_no', ],  // 'regex:/^([0|\+[0-9]{1,5})?([7-9][0-9]{9})$/'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
        ]);

        $user_otp = $this->generate_otp($request->mobile_no);
        $user_otp->sendSMS($request->mobile_no); // otp sent

        return redirect()->route('otp.verification',[$user_otp->user_id])
                ->with('success', 'OTP has been sent to your Mobile Number!');

    }


    public function generate_otp($mobile_no) {

        $user = User::where('mobile_no', $mobile_no)->first();
        $user_otp = UserOtp::where('user_id', $user->id)->latest()->first();

        $now = now();

        if($user_otp && $now->isBefore($user_otp->expire_at)) {
            return $user_otp;
        }

        return UserOtp::create([
            'user_id' => $user->id,
            'otp' => rand(123456, 999999),
            'expire_at' => $now->addMinutes(10),
        ]);

        // the 3 scenerios
        //1. otp already available but not expired
        //2. already available but expired
        //3. not available any otp

    }

    public function verification($user_id) {
        return view('auth.otp_verification')->with([
            'user_id' => $user_id
        ]);
    }

    public function login_with_otp(Request $request) {

        $request->validate([
            'otp' => 'required',
            'user_id' => 'required|exists:users,id'
        ]);

        $user_otp = UserOtp::where('user_id', $request->user_id)->where('otp', $request->otp)->first();

        $now = now();

        if(!$user_otp) {
            return redirect()->back()->with('error','Your OTP is not correct!');
        }
        else if($user_otp && $now->isAfter($user_otp->expire_at)) {
            return redirect()->back()->with('error','Your OTP has been expired!');
        }

        $user = User::whereId($request->user_id)->first();

        if($user) {
            $user_otp->update([
                'expire_at' => now()
            ]);

            Auth::login($user);
            return redirect('/');
        }

        return redirect()->route('otp.login')->with('error', 'Your OTP is not correct!');
    }
}
