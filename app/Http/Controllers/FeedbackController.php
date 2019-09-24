<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($job)
    {
        return Feedback::where('job_id',$job)->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $feedback = new Feedback();
        $feedback->comment = $request->input('comment');
        $feedback->rating = $request->input('rating');
        $feedback->job_id = $request->input('job_id');
        $feedback->user_id = $request->input('user_id');

        $feedback->save();

    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy($feedback)
    {
        $feed = Feedback::find($feedback);
        $feed->delete();
    }
}
