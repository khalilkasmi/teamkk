<?php

namespace App\Http\Controllers;

use App\Job;
use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if($request->has('search')){
            $users = User::search($request->get('search'))->get();
            $jobs = Job::search($request->get('search'))->get();
        }else{
            $users = User::get();
            $jobs = Job::get();
        }
        return ['jos'=>$jobs,'users'=>$users];
    }
}
