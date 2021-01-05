<?php

namespace Modules\Kompetisi\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Competition extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'competition_users', 'competition_id', 'user_id')->withPivot('is_paid');
    }
}
