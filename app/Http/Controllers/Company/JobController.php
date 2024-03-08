<?php

namespace App\Http\Controllers\Company;

use App\Models\Job;
use App\Models\Tag;
use App\Models\JobListing;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreJobRequest;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authId = auth()->user()->id;

        $jobs = JobListing::where('company_id', $authId)->latest()->simplePaginate(10);

        return view('company.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        
        return view('company.jobs.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        $validatedData = $request->validated();

        // dd($validatedData);

        $validatedData['company_id'] = auth()->user()->id;
        $validatedData['slug'] = Str::slug($validatedData['title']);
        
        DB::transaction(function() use ($validatedData) {
            $job = JobListing::create($validatedData);

            $job->tags()->attach($validatedData['tags']);
        });

        return redirect()->back()->with('success', 'Job created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobListing $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobListing $job)
    {
        $tags = Tag::all();

        return view('company.jobs.edit', compact('job', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreJobRequest $request, JobListing $job)
    {
        $validatedData = $request->validated();

        $validatedData['company_id'] = auth()->user()->id;
        
        DB::transaction(function() use ($job, $validatedData) {
            $job->update($validatedData);
            $job->tags()->detach();
            $job->tags()->attach($validatedData['tags']);
        });

        return redirect()->back()->with('success', 'Job updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobListing $job)
    {
        $job->delete();
    }
}
