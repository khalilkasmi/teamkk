<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Job;
use App\SubCategory;
use App\User;
use Illuminate\Http\Request;

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

   /* public function jobBySubCat($subCat){
        $subCateg = SubCategory::where('title','like',$subCat)->first();
        return response()->json($subCateg->jobs,200);
    }*/

    public function jobByRatingTop(){
       /* $res = Feedback::where('rating','=',5)->get();
        $jobs =  array();
        foreach ($res as $f){
            $jobs[] = Job::find($f->jobs_id);
        }
        return response()->json($jobs,200);

     $res = array();
       $jobs = Job::all();
       foreach ($jobs as $job){
           $feedbacks = $job->feedBack;
           foreach ($feedbacks as $feedback){
               if($feedback->rating != 5) continue 2;
                else continue;
           }
           $res[] = $job;
       }
       dd($res);
        */
        $res = Feedback::where('rating','=',5)->get();
        $jobs=array();
        foreach ($res as $feed){
            $jobs[] = Job::find($feed->job_id);
        }
        $gotit= array();
        foreach($jobs as $j){
            $hahuma= $j->feedBack;
            foreach($hahuma as $f){
                if ($f->rating ==5)
                    continue;
                elseif($f->rating!=5)
                    continue 2;

            }
            $gotit[] = $j;

        }
       dd($gotit);

    }
}
