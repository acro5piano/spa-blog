<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = ['user_id', 'title', 'content', 'published'];

    protected $casts = [
        'published' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $appends = ['summary'];

    public function getSummaryAttribute()
    {
        return mb_substr($this->content, 0, 100);
    }
}
