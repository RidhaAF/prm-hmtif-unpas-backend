<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vote;
use App\Models\Candidate;
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
        $users = User::join('votes', 'users.id', '=', 'votes.user_id')->get();

        foreach ($candidates as $candidate) {
            $voteResult[] = Vote::where('candidate_id', $candidate->id)->count();
            $chartResult = (new LarapexChart)->pieChart()
                ->addData($voteResult)
                ->setLabels($candidateNames);
        }

        foreach ($candidates as $candidate) {
            $voteResult2018[] = $users->where('class_year', 2018)->where('candidate_id', $candidate->id)->count();
            $chart2018 = (new LarapexChart)->donutChart()
                ->addData($voteResult2018)
                ->setLabels($candidateNames);
        }

        foreach ($candidates as $candidate) {
            $voteResult2019[] = $users->where('class_year', 2019)->where('candidate_id', $candidate->id)->count();
            $chart2019 = (new LarapexChart)->donutChart()
                ->addData($voteResult2019)
                ->setLabels($candidateNames);
        }

        foreach ($candidates as $candidate) {
            $voteResult2020[] = $users->where('class_year', 2020)->where('candidate_id', $candidate->id)->count();
            $chart2020 = (new LarapexChart)->donutChart()
                ->addData($voteResult2020)
                ->setLabels($candidateNames);
        }

        foreach ($candidates as $candidate) {
            $voteResult2021[] = $users->where('class_year', 2021)->where('candidate_id', $candidate->id)->count();
            $chart2021 = (new LarapexChart)->donutChart()
                ->addData($voteResult2021)
                ->setLabels($candidateNames);
        }

        $data = [
            'title' => 'Dashboard',
            'candidates' => $candidates,
            'voters' => User::where('roles', "User")->get(),
            'voted' => User::where('vote_status', 1)->get(),
            'not_voted' => User::where('vote_status', 0)->get(),
        ];

        return view('admin.dashboard', $data, compact('chartResult', 'chart2019', 'chart2020', 'chart2021', 'chart2018'));
    }
}
