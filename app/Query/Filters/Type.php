<?php

namespace App\Query\Filters;
use Illuminate\Database\Eloquent\Builder;

class Type implements Filter{
    /**
     * Apply a given search value to the builder instance.
     * 
     * Usage ?type=video
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Builder $builder, $value){
        return $builder->where('type', '=', $value);
    }
}
