<?php

namespace App\Exports;

use App\Models\Vote;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class VoteExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Vote::all();
    }

    public function headings(): array
    {
        return [
            'No.',
            'User ID',
            'Candidate ID',
            'Created At',
            'Updated At',
        ];
    }
}
