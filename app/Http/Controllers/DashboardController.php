<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Vote;
use App\Models\Candidate;
use App\Models\VoteResult;
use App\Exports\VoteExport;
use App\Http\Controllers\Controller;
use App\Models\VotingTime;
use Maatwebsite\Excel\Facades\Excel;
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
        // get current year - 3 years
        $class_year = Carbon::now()->year - 3;
        $candidates = Candidate::where('class_year', $class_year)->get();
        $candidateNames = $candidates->pluck('name')->toArray();

        // get total_votes for each candidate where class_year = $class_year
        $voteResults = VoteResult::where('candidate_class_year', $class_year)->get();
        $totalVotes = $voteResults->pluck('total_votes')->toArray();

        $chartResult = [];
        foreach ($candidates as $candidate) {
            $chartResult = (new LarapexChart)->pieChart()->addData($totalVotes)->setLabels($candidateNames)->setFontFamily('Inter');
        }

        $data = [
            'title' => 'Dashboard',
            'candidates' => $candidates,
            'voters' => User::where('roles', "User")->get(),
            'voted' => User::where('vote_status', 1)->get(),
            'not_voted' => User::where('vote_status', 0)->get(),
            'votes' => Vote::get(),
        ];

        return view('admin.dashboard', $data, compact('chartResult'));
    }

    public function winner()
    {
        // get current year - 3 years
        $class_year = Carbon::now()->year - 3;

        // find end_time from votingTime table
        $endTime = VotingTime::first()->value('end_time');

        // if votingTime end, show winner candidate
        if (Carbon::now()->format('Y-m-d H:i:s') > Carbon::parse($endTime)->format('Y-m-d H:i:s')) {
            // show the most votes candidate
            $winner = VoteResult::where('candidate_class_year', $class_year)->orderBy('total_votes', 'desc')->first();
            // find candidate by nrp according winner
            $candidate = Candidate::where('nrp', $winner->candidate_nrp)->first();
        }

        return view('admin.winner.index', [
            'title' => 'Pemenang',
            // if $winner undefined, show message
            'winner' => isset($winner) ? $winner : 'Belum ada pemenang',
            // if $candidate undefined, show message
            'candidate' => isset($candidate) ? $candidate : 'Belum ada pemenang',
            'endTime' => $endTime,
        ]);
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
