<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/admin/dashboard', [
            'title' => 'Dashboard',
            'candidates' => Candidate::get(),
            'voters' => User::where('roles', "User")->get(),
            'voted' => User::where('vote_status', 1)->get(),
            'not_voted' => User::where('vote_status', 0)->get(),
        ]);
    }
}
