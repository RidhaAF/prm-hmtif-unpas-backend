<?php

namespace App\Exports;

use App\Models\Vote;
use Maatwebsite\Excel\Concerns\FromCollection;

class VoteExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Vote::all();
    }
}
