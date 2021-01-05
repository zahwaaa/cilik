<?php

namespace Modules\Kompetisi\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompetitionUser extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
