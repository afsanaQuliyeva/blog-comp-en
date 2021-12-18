<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{    use HasFactory, Sluggable;

    const PAGE_COUNT = 7;

    protected $guarded = [
        'id'
    ];

    public function getCategories() {
        return $this->belongsToMany(Category::class, 'article_category');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


}
