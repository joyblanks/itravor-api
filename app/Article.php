<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'type',
        'location',
        'keywords',
        'thumbnail',
        'is_public',
        'user_id'
    ];

    // For Geometry Spatial location POINT column
    protected $geofields = ['location'];

    // set string data to point
    public function setLocationAttribute($value){
        $this->attributes['location'] = DB::raw("POINT($value)");
    }

    // get point data to String
    public function getLocationAttribute($value){
        $loc =  substr($value, 6);
        $loc = preg_replace('/[ ,]+/', ',', $loc, 1);
        return substr($loc, 0, -1);
    }

    // Query on location
    public function newQuery($excludeDeleted = true){
        $raw = '';
        foreach($this->geofields as $column){
            $raw .= ' astext(' . $column . ') as ' . $column . ' ';
        }
        return parent::newQuery($excludeDeleted)->addSelect('*', DB::raw($raw));
    }

    public function categories(){
        return $this->belongsToMany('App\Category', 'article_category_pivot');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
