<?php

namespace App\Http\Controllers;

use App\Exports\VoteExport;
use App\Models\User;
use App\Models\Vote;
use App\Models\Candidate;
use App\Http\Controllers\Controller;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Maatwebsite\Excel\Facades\Excel;

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
        $users = User::join('votes', 'users.id', '=', 'votes.user_id')->get(['users.class_year', 'votes.candidate_id_secret']);

        $chartResult = [];
        foreach ($candidates as $candidate) {
            $voteResult[] = Vote::where('candidate_id_secret', $candidate->id)->count();
            $chartResult = (new LarapexChart)->pieChart()->addData($voteResult)->setLabels($candidateNames)->setFontFamily('Inter');
        }

        $chart2015 = [];
        foreach ($candidates as $candidate) {
            $voteResult2015[] = $users->where('class_year', 2015)->where('candidate_id_secret', $candidate->id)->count();
            $chart2015 = (new LarapexChart)->donutChart()->addData($voteResult2015)->setLabels($candidateNames)->setFontFamily('Inter');
        }

        $chart2016 = [];
        foreach ($candidates as $candidate) {
            $voteResult2016[] = $users->where('class_year', 2016)->where('candidate_id_secret', $candidate->id)->count();
            $chart2016 = (new LarapexChart)->donutChart()->addData($voteResult2016)->setLabels($candidateNames)->setFontFamily('Inter');
        }

        $chart2017 = [];
        foreach ($candidates as $candidate) {
            $voteResult2017[] = $users->where('class_year', 2017)->where('candidate_id_secret', $candidate->id)->count();
            $chart2017 = (new LarapexChart)->donutChart()->addData($voteResult2017)->setLabels($candidateNames)->setFontFamily('Inter');
        }

        $chart2018 = [];
        foreach ($candidates as $candidate) {
            $voteResult2018[] = $users->where('class_year', 2018)->where('candidate_id_secret', $candidate->id)->count();
            $chart2018 = (new LarapexChart)->donutChart()->addData($voteResult2018)->setLabels($candidateNames)->setFontFamily('Inter');
        }

        $chart2019 = [];
        foreach ($candidates as $candidate) {
            $voteResult2019[] = $users->where('class_year', 2019)->where('candidate_id_secret', $candidate->id)->count();
            $chart2019 = (new LarapexChart)->donutChart()->addData($voteResult2019)->setLabels($candidateNames)->setFontFamily('Inter');
        }

        $chart2020 = [];
        foreach ($candidates as $candidate) {
            $voteResult2020[] = $users->where('class_year', 2020)->where('candidate_id_secret', $candidate->id)->count();
            $chart2020 = (new LarapexChart)->donutChart()->addData($voteResult2020)->setLabels($candidateNames)->setFontFamily('Inter');
        }

        $chart2021 = [];
        foreach ($candidates as $candidate) {
            $voteResult2021[] = $users->where('class_year', 2021)->where('candidate_id_secret', $candidate->id)->count();
            $chart2021 = (new LarapexChart)->donutChart()->addData($voteResult2021)->setLabels($candidateNames)->setFontFamily('Inter');
        }

        $data = [
            'title' => 'Dashboard',
            'candidates' => $candidates,
            'voters' => User::where('roles', "User")->get(),
            'voted' => User::where('vote_status', 1)->get(),
            'not_voted' => User::where('vote_status', 0)->get(),
            'votes' => Vote::get(),
        ];

        return view('admin.dashboard', $data, compact('chartResult', 'chart2015', 'chart2016', 'chart2017', 'chart2018', 'chart2019', 'chart2020', 'chart2021'));
    }

    public function exportExcel()
    {
        return Excel::download(new VoteExport, 'votes.xlsx');
    }

    public function exportPdf()
    {
        return Excel::download(new VoteExport, 'votes.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
}
