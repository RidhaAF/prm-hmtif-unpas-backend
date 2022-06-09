<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Vote;
use App\Models\Candidate;
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
            'user_id' => 'required|unique:votes',
            'candidate_id' => 'required',
            'candidate_id_secret' => 'required',
        ]);

        $validatedData['user_id'] = Auth::user()->id;
        Hash::make($validatedData['candidate_id']);
        $validatedData['candidate_id_secret'] = $validatedData['candidate_id'];

        $user = User::where('id', Auth::user()->id)->update([
            'vote_status' => true,
        ]);

        $vote = Vote::create($validatedData, $user);

        return ResponseFormatter::success($vote, 'Vote created successfully');
    }
}
