<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vote;
use App\Models\Candidate;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::get();
        $candidateNames = $candidates->pluck('name')->toArray();

        $users = User::join('votes', 'users.id', '=', 'votes.user_id');

        $chartResult = (new LarapexChart)->pieChart()
            ->addData([
                Vote::where('candidate_id', 1)->count(),
                Vote::where('candidate_id', 2)->count(),
                Vote::where('candidate_id', 3)->count(),
                Vote::where('candidate_id', 4)->count(),
            ])
            ->setLabels($candidateNames);

        $chart2019 = (new LarapexChart)->donutChart()
            ->addData([
                Vote::where('candidate_id', 1)->count(),
                Vote::where('candidate_id', 2)->count(),
                Vote::where('candidate_id', 3)->count(),
                Vote::where('candidate_id', 4)->count(),
            ])
            ->setLabels($candidateNames);

        $chart2020 = (new LarapexChart)->donutChart()
            ->addData([
                Vote::where('candidate_id', 1)->count(),
                Vote::where('candidate_id', 2)->count(),
                Vote::where('candidate_id', 3)->count(),
                Vote::where('candidate_id', 4)->count(),
            ])
            ->setLabels($candidateNames);

        $chart2021 = (new LarapexChart)->donutChart()
            ->addData([
                Vote::where('candidate_id', 1)->count(),
                Vote::where('candidate_id', 2)->count(),
                Vote::where('candidate_id', 3)->count(),
                Vote::where('candidate_id', 4)->count(),
            ])
            ->setLabels($candidateNames);

        $chart2022 = (new LarapexChart)->donutChart()
            ->addData([
                Vote::where('candidate_id', 1)->count(),
                Vote::where('candidate_id', 2)->count(),
                Vote::where('candidate_id', 3)->count(),
                Vote::where('candidate_id', 4)->count(),
            ])
            ->setLabels($candidateNames);

        $data = [
            'title' => 'Dashboard',
            'candidates' => $candidates,
            'voters' => User::where('roles', "User")->get(),
            'voted' => User::where('vote_status', 1)->get(),
            'not_voted' => User::where('vote_status', 0)->get(),
        ];

        return view('admin.dashboard', $data, compact('chartResult', 'chart2019', 'chart2020', 'chart2021', 'chart2022'));
    }
}
