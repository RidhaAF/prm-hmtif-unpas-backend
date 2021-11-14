<?php

namespace App\Models;

use App\Models\Vote;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidate extends Model
{
    use HasFactory;
    use HasProfilePhoto;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nrp',
        'name',
        'major',
        'vision',
        'mission',
        'profile_photo_path',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function votes()
    {
        return $this->hasMany(Vote::class, 'candidate_id', 'id');
    }
}
