<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        // TODO: content should not be retrived
        return Article::where('published', true)->paginate();
    }

    public function show($id)
    {
        return Article::find($id);
    }

    public function store(Request $request)
    {
        $user = \JWTAuth::parseToken()->authenticate();
        return $user->articles()->create($request->only('name'))->fresh();
    }

    public function update($id, Request $request)
    {
        $article = Article::find($id)->fill($request->only('title', 'content', 'published'));
        $article->save();
        return $article->fresh();
    }

    public function destroy($id)
    {
        return Article::destroy($id);
    }

}
