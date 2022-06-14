<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
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
        // hash validated candidate_id
        $hashedCandidateId = Hash::make($validatedData['candidate_id']);
        $validatedData['candidate_id_secret'] = $validatedData['candidate_id'];

        $user = User::where('id', Auth::user()->id)->update([
            'vote_status' => true,
        ]);

        $vote = Vote::create($validatedData, $user);
        // update hashed candidate_id to db
        $vote->update(['candidate_id' => $hashedCandidateId]);

        return ResponseFormatter::success($vote, 'Vote created successfully');
    }
}
