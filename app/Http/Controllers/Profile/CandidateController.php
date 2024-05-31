<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    public function index() {
        $users = User::where('role', 'user')->orderBy('created_at', 'DESC')->paginate(8);
        
        return view('frontend.components.candidates.candidates_list', [
            'users' => $users
        ]);
    }

    public function details($id) {
        $user = User::where([
            'id' => $id,
        ])->first();

        if ($user == null) {
            abort(404);
        }
        return view('frontend.components.candidates.candidate_details', [
            'user' => $user,
        ]);
    }

    public function download_cv($userId) {
        $user = User::with('resume')->findOrFail($userId);
        if ($user->resume) {
            $resumePath = 'cvs/' . $user->resume->resume;
            $headers = ['Content-Type: application/pdf'];
            $newName = $user->name.'_resume.pdf';
            if (!empty($user->resume->resume)) {
                return response()->download($resumePath, $newName, $headers);
            } 
            else {
                return redirect()->back()->with('error', 'CV not found.');
            }
        } else {
            return redirect()->back()->with('error', 'No CV uploaded for this user.');
        }
    }
}
