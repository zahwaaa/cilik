<?php

namespace Modules\Article\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function article_category()
    {
        return $this->belongsTo(ArticleCategory::class);
    }

    public function article_status()
    {
        return $this->belongsTo(ArticleStatus::class);
    }

    public function article_comments()
    {
        return $this->hasMany(ArticleComment::class);
    }
}
