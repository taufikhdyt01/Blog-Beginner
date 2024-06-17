<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'full_text', 'image', 'user_id', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, array $filters = [])
    {
        $query->when($filters['article'] ?? false, function($query, $article) {
            return $query->where('title', 'like', '%' . $article  .'%');
        })->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use($category) {
                return $query->where('name', 'like', '%' . $category  .'%');
            });
        })->when($filters['tag'] ?? false, function($query, $tag) {
            return $query->whereHas('tags', function($query) use($tag) {
                return $query->where('name', 'like', '%' . $tag  .'%');
            });
        });
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tags');
    }
}
