<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterestController extends Controller
{
    // Toggle interest on a job
    public function toggle(Request $request, Job $job)
    {
        // check if user is logged in
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        //save user
        $user = Auth::user();

        // Check if the user already marked interest for this job
        if ($job->interestedUsers()->where('user_id', $user->id)->exists()) {
            // If yes, remove the interest
            $job->interestedUsers()->detach($user->id);
            $message = 'Interest removed';
        } else {
            // if not attach the user to the job's interest list
            $job->interestedUsers()->attach($user->id);
            $message = 'Marked as interested';
        }

        // Redirect back with a flash message
        return redirect()->back()->with('success', $message);
    }
}
