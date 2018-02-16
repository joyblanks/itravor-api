<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'type',
        'category_id',
        'subcategory_id',
        'location',
        'user_id'
    ];
}
