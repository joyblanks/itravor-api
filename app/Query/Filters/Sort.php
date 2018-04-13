<?php

namespace App\Query\Filters;
use Illuminate\Database\Eloquent\Builder;

class Sort implements Filter{
    /**
     * Apply a given search value to the builder instance.
     * 
     * Usage ?sort=location,asc
     * Usage ?sort=id,desc
     * Usage ?sort=title [asc by default]
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Builder $builder, $value){
        $value = explode(',', $value);
        $sortCol = $value[0];
        $sortDir = count($value)==2 ? $value[1] : null;
        return $builder->orderby($sortCol, $sortDir);
    }
}
