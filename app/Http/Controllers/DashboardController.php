<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Candidate;
use App\Http\Controllers\Controller;
use App\Models\Vote;
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
        $chartResult = (new LarapexChart)
            // ->horizontalBarChart()
            //     ->addData('Kandidat 1', [Vote::where('candidate_id', '1')->count()])
            //     ->addData('Kandidat 2', [Vote::where('candidate_id', '2')->count()])
            //     ->addData('Kandidat 3', [Vote::where('candidate_id', '3')->count()])
            //     ->addData('Kandidat 4', [Vote::where('candidate_id', '4')->count()])
            //     ->setXAxis(Candidate::all()->pluck('name')->toArray())
            //     ->setGrid();
            ->pieChart()
            ->addData([Vote::where('candidate_id', '1')->count(), Vote::where('candidate_id', '2')->count(), Vote::where('candidate_id', '3')->count(), Vote::where('candidate_id', '4')->count()])
            ->setLabels(Candidate::all()->pluck('name')->toArray());

        $chart2019 = (new LarapexChart)->donutChart()
            ->addData([20, 24, 30, 14])
            ->setLabels(['Player 7', 'Player 10', 'Player 9', 'Player 8']);

        $chart2020 = (new LarapexChart)->donutChart()
            ->addData([20, 15, 24, 30])
            ->setLabels(['Player 7', 'Player 10', 'Player 9', 'Player 8']);

        $chart2021 = (new LarapexChart)->donutChart()
            ->addData([20, 24, 7, 30])
            ->setLabels(['Player 7', 'Player 10', 'Player 9', 'Player 8']);

        $chart2022 = (new LarapexChart)->donutChart()
            ->addData([20, 24, 21, 30])
            ->setLabels(['Player 7', 'Player 10', 'Player 9', 'Player 8']);

        $data = [
            'title' => 'Dashboard',
            'candidates' => Candidate::get(),
            'voters' => User::where('roles', "User")->get(),
            'voted' => User::where('vote_status', 1)->get(),
            'not_voted' => User::where('vote_status', 0)->get(),
        ];

        return view('admin.dashboard', $data, compact('chartResult', 'chart2019', 'chart2020', 'chart2021', 'chart2022'));
    }
}
