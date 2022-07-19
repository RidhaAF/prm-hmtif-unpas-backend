<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_nrp',
        'candidate_class_year',
        'total_votes',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_nrp', 'nrp');
    }
}
