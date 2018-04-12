<?php

namespace App\Query;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

//Reference: https://laravel.com/api/5.3/Illuminate/Database/Query/Builder.html

class ArticleQuery {

    public static function apply(Request $filters){
        $query = static::applyDecoratorsFromRequest($filters, (new Article)->newQuery());
        return static::getResults($query);
    }
    private static function applyDecoratorsFromRequest(Request $request, Builder $query){
        $filters = $request->all();
        if($request->input('page') == null){
            $filters = array_merge($filters, ['page' => '1']);
		}
		foreach ($filters as $filterName => $value) {
            $decorator = static::createFilterDecorator($filterName);
            if (static::isValidDecorator($decorator)) {
                $query = $decorator::apply($query, $value);
            }
        }
        return $query;
    }
    private static function createFilterDecorator($name){
        return __NAMESPACE__ . '\\Filters\\' . ucwords(strtolower($name));
    }
    private static function isValidDecorator($decorator){
        return class_exists($decorator, true);
    }
    private static function getResults(Builder $query){
        return $query->get();
    }
}
