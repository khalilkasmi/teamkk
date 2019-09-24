<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Job;
use App\SubCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Job::all(),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job = Job::created($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return response()->json(Job::findOrFail($job->id),200);

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $job  = Job::findOrFail($job->id);
        $job->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        return response()->json(Job::deleted($job->id),200);

    }

    public function jobBySubCat($subCat){
        $subCateg = SubCategory::where('title','like',$subCat)->firstOrFail();
        return response()->json($subCateg->jobs,200);
    }

    public function jobByRatingTop(){
        /*$feedbacks = Feedback::where('rating','=',5)->get();
        $jobs=array();
        foreach ($feedbacks as $feedback){
            $jobs[] = Job::find($feedback->job_id);
        }
        $results= array();
        foreach($jobs as $j){
            $feeds= $j->feedBack;
            foreach($feeds as $f){
                if ($f->rating ==5)
                    continue;
                elseif($f->rating!=5)
                    continue 2;

            }
            $results[] = $j;

        }
        return $results;
        */

        $jobs_ids = DB::table('feedback')
            ->select('job_id')
            ->groupBy('job_id')
            ->havingRaw('SUM(rating not in (5)) = 0 and sum(rating = 5 ) = 1')
            ->get();
        $jobs = array();
        foreach ($jobs_ids as $jobs_id){
            $job = Job::find($jobs_id->job_id);
            $jobs[] = $job;
        }

        return $jobs;

        }

        public function latestJobs(){

            return DB::table('jobs')
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();


        }
}
