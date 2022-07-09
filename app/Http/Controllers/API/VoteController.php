<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\VoteResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VoteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'unique:votes',
            'candidate_id' => 'required',
        ]);

        $validatedData['user_id'] = Auth::user()->id;

        // if user voting, then update vote_results table
        $voteResult = VoteResult::where('candidate_nrp', Candidate::find($validatedData['candidate_id'])->nrp)->first();
        $voteResult->total_votes += 1;
        $voteResult->save();

        // hash validated candidate_id
        $validatedData['candidate_id'] = Hash::make($validatedData['candidate_id']);

        $user = User::where('id', Auth::user()->id)->update([
            'vote_status' => true,
        ]);

        $vote = Vote::create($validatedData, $user, $voteResult);

        return ResponseFormatter::success($vote, 'Vote created successfully');
    }
}
