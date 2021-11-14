<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('/admin/dashboard', [
            'title' => 'Dashboard',
            'candidates' => Candidate::all(),
            'voters' => User::where('roles', 0),
            'voted' => User::where('vote_status', 1),
            'not_voted' => User::where('vote_status', 0),
        ]);
    }
}
