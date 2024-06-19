<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model
{
    protected $fillable = [
        'tag_id',
        'article_id'
    ];

    use HasFactory;

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }
}
