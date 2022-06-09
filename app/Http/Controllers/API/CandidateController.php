<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Vote;
use App\Models\Candidate;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Candidate::get();

        return ResponseFormatter::success($data, 'Candidates fetched successfully');
    }

    public function quickCount()
    {
        $candidates = Candidate::get();
        $voted = User::where('vote_status', 1)->count();

        // loop through candidates and get the total votes for each candidate and store it in one array at a time
        foreach ($candidates as $candidate) {
            $candidates_votes[] = [
                'id' => $candidate->id,
                'nrp' => $candidate->nrp,
                'name' => $candidate->name,
                'major' => $candidate->major,
                'vision' => $candidate->vision,
                'mission' => $candidate->mission,
                'photo' => $candidate->photo,
                'vote_result' => Vote::where('candidate_id_secret', $candidate->id)->count() / $voted * 100,
                'vote_count' => Vote::where('candidate_id_secret', $candidate->id)->count(),
            ];
        }

        return ResponseFormatter::success($candidates_votes, 'Quick count fetched successfully');
    }
}
