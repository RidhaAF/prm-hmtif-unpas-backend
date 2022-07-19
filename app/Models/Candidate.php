<?php

namespace App\Models;

use App\Models\Vote;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use HasFactory;
    use HasProfilePhoto;
    use MediaAlly;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nrp',
        'name',
        'major',
        'class_year',
        'vision',
        'mission',
        'photo',
        'public_id',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function vote()
    {
        return $this->hasMany(Vote::class, 'candidate_id', 'id');
    }

    public function voteResult()
    {
        return $this->hasOne(VoteResult::class, 'candidate_nrp', 'nrp');
    }
}
