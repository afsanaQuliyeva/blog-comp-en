<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getArticles() {
        return $this->belongsToMany(Article::class, 'article_category');
    }

    protected $fillable = [
        'category_name',
        'slug',
    ];

//    protected $guarded =[
//
//    ];
}
