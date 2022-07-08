<?php

namespace App\Http\Controllers;

use App\Exports\VoteExport;
use App\Models\User;
use App\Models\Vote;
use App\Models\Candidate;
use App\Http\Controllers\Controller;
use App\Models\VoteResult;
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

        $chartResult = [];
        foreach ($candidates as $candidate) {
            $voteResult[] = VoteResult::find($candidate->id)->total_votes;
            $chartResult = (new LarapexChart)->pieChart()->addData($voteResult)->setLabels($candidateNames)->setFontFamily('Inter');
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

    public function exportExcel()
    {
        return Excel::download(new VoteExport, 'votes.xlsx');
    }

    public function exportPdf()
    {
        return Excel::download(new VoteExport, 'votes.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
}
