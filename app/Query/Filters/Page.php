<?php

namespace App\Query\Filters;
use Illuminate\Database\Eloquent\Builder;

class Page implements Filter{
    
    const MAX_ROWS = 5;

    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Builder $builder, $value){
        return $builder
            ->limit(self::MAX_ROWS)
            ->offset(($value-1)*self::MAX_ROWS);
    }
}
