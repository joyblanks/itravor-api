<?php

namespace App\Query\Filters;
use Illuminate\Database\Eloquent\Builder;

class Location implements Filter{
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Builder $builder, $value){
        $value = explode(',', $value);
        $params = count($value);
        if($params < 2){
            return $builder;
        }else{
            if($params == 2){
                array_push($value, 100);
            }
            return $builder
                ->selectRaw('(SQRT(POW(X(`location`) - ? , 2) + POW(Y(`location`) - ?, 2)) * 100) '
                    .'AS distance', array($value[0], $value[1]))
                ->having('distance', '<' , $value[2]);
        }
    }
}
