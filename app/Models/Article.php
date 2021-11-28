<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    use HasFactory;

    public function getCategories() {
        return $this->belongsToMany(Category::class, 'article_category');
    }
}
