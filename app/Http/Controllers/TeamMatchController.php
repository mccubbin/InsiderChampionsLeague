<?php

namespace App\Http\Controllers;

use App\TeamMatch;
use Illuminate\Http\Request;

class TeamMatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teamMatches = \App\TeamMatch::get();
        return view('teammatch.index')->with('teammatches', $teamMatches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TeamMatch  $teamMatch
     * @return \Illuminate\Http\Response
     */
    public function show(TeamMatch $teamMatch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeamMatch  $teamMatch
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamMatch $teamMatch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeamMatch  $teamMatch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeamMatch $teamMatch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeamMatch  $teamMatch
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamMatch $teamMatch)
    {
        //
    }
}
