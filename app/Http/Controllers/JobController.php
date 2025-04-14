<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    // List all active jobs for the landing page.
    public function index()
    {
        $jobs = Job::active()->latest()->paginate(6);
        return view('jobs.index', compact('jobs'));
    }

    // Show the form to create a job posting (only for posters).
    public function create()
    {
        return view('jobs.create');
    }

    // Store a new job posting.
    public function store(Request $request)
    {
        //dd($request);
        // Validate input.
        $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
        ]);

        // Only allow posters to create jobs.
        if (Auth::user()->role !== 'poster') {
            abort(403, 'Unauthorized');
        }

        // Create the job and assign it to the current user.
        $job = Auth::user()->jobs()->create($request->only('title', 'body'));
        return redirect()->route('jobs.index', $job)->with('success', 'Job created!');
    }

    // Display a specific job posting.
    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    // Show the form to edit an existing job (only by the owner).
    public function edit(Job $job)
    {
        if (Auth::id() !== $job->user_id) {
            abort(403, 'Unauthorized action.');
        }
        return view('jobs.edit', compact('job'));
    }

    // Update an existing job.
    public function update(Request $request, Job $job)
    {
        // Verify authorization.
        if (Auth::id() !== $job->user_id) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
        ]);

        $job->update($request->only('title', 'body'));

        return redirect()->route('jobs.show', $job)->with('success', 'Job updated!');
    }

    // Delete a job posting.
    public function destroy(Job $job)
    {
        if (Auth::id() !== $job->user_id) {
            abort(403, 'Unauthorized');
        }
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted!');
    }
}
