<?php

namespace App\Query\Filters;
use Illuminate\Database\Eloquent\Builder;

class Id implements Filter{
    /**
     * Apply a given search value to the builder instance.
     * 
     * Usage ?id=[2,6,7]
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Builder $builder, $value){
        $value = json_decode($value);
        if(!is_array($value) || count($value)==0){
            return $builder;
        } else {
            return $builder->whereIn('id', $value);
        }
    }
}
