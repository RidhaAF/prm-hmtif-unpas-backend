<?php

namespace App\Http\Controllers;

use App\Models\VotingTime;
use Illuminate\Http\Request;

class VotingTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.voting-time.index', [
            'title' => 'Waktu Pemilihan',
            'votingTime' => VotingTime::latest()->first(),
        ]);
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
        $votingTime = $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        // check if there is a record in database
        if (VotingTime::count() > 0) {
            // update
            VotingTime::latest()->first()->update($votingTime);
        } else {
            // create
            VotingTime::create($votingTime);
        }

        return redirect()->route('voting-time.index')
            ->with('success', 'Waktu pemilihan berhasil diatur.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VotingTime  $votingTime
     * @return \Illuminate\Http\Response
     */
    public function show(VotingTime $votingTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VotingTime  $votingTime
     * @return \Illuminate\Http\Response
     */
    public function edit(VotingTime $votingTime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VotingTime  $votingTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VotingTime $votingTime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VotingTime  $votingTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(VotingTime $votingTime)
    {
        //
    }
}
