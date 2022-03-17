<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use App\Models\Vote;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $votes = Vote::get();

        $data = [
            'votes' => $votes,
        ];

        return ResponseFormatter::success($data, 'Votes fetched!');
    }

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
            'candidate_id' => 'required'
        ]);

        $validatedData['user_id'] = Auth::user()->id;

        $user = User::where('id', Auth::user()->id)->update([
            'vote_status' => true,
        ]);

        $vote = Vote::create($validatedData, $user);

        return ResponseFormatter::success($vote, 'Vote created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function show(Vote $vote)
    {
        try {
            return ResponseFormatter::success($vote, 'Detail vote showed!', compact('vote'));
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Data not found!',
                'error' => $error,
            ], 'Detail vote not found!', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vote $vote)
    {
        $validatedData = $request->validate([
            'user_id' => [Rule::unique('votes')->ignore(Auth::user()->id)],
            'candidate_id' => 'required'
        ]);

        $vote->update($validatedData);

        return ResponseFormatter::success($vote, 'Vote updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vote $vote)
    {
        $user = User::where('id', Auth::user()->id)->update([
            'vote_status' => false,
        ]);

        $vote->delete($user);

        return ResponseFormatter::success($vote, 'Vote deleted successfully!');
    }

    public function quickCount()
    {
        $candidates = Candidate::get();
        $voted = User::where('vote_status', 1)->count();

        // loop through candidates and get the total votes for each candidate and store it in one array at a time
        foreach ($candidates as $candidate) {
            $candidates_votes[] = [
                'vote_result' => Vote::where('candidate_id', $candidate->id)->count() / $voted * 100,
            ];
        }

        return ResponseFormatter::success($candidates_votes, 'Quick count fetched!');
    }
}
