<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Query\ArticleQuery;

class ArticlesController extends Controller {

    public function index(Request $request){
        return ArticleQuery::apply($request);
    }
 
    public function show(Article $article){
        return $article->load('categories', 'user');
    }
 
    public function store(Request $request){
        
        $article = Article::create($request->all());
        
        $article->categories()->attach($request->get('categories'));
        return response()->json($article, 201);
    }
 
    public function update(Request $request, Article $article){
        $article->update($request->all());
 
        return response()->json($article, 200);
    }
 
    public function delete(Article $article){
        $article->delete();
 
        return response()->json(null, 204);
    }
}
