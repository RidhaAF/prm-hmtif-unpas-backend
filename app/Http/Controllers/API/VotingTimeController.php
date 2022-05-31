<?php

namespace App\Http\Controllers\API;

use App\Models\VotingTime;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class VotingTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = VotingTime::latest()->first();

        return ResponseFormatter::success($data, 'Voting Time fetched successfully');
    }
}
