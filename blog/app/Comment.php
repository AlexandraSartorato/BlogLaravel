<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'article_id',
        'comment',
        ];
    public function article(){
        return $this->belongsTo(Article::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
