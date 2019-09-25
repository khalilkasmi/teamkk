<?php

namespace App\Http\Controllers;

use App\ImagesPortfolio;
use App\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user)
    {
        return Portfolio::where('user_id',$user)->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $user = $request->input('user_id');
            //$this->authorize('store',$user);
            $portfolio = new Portfolio();
            $portfolio->title = $request->input('title');
            $portfolio->description = $request->input('description');
            $portfolio->user_id = $user;
            $portfolio->save();
            foreach ($request->file('images') as $img){
                $images = new ImagesPortfolio();
                $images->image_link = $img->getClientOriginalName();
                $images->portfolio_id = $portfolio->id;
                $images->save();
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        return Portfolio::with(['images'])->where('id',$portfolio->id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy($portfolio)
    {
        $port = Portfolio::find($portfolio);
        $this->authorize('delete',$port);

        $port->delete();
    }
}
