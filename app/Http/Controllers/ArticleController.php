<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{

    protected $cast = [
        'published' => 'boolean',
    ];

    public function index()
    {
        // TODO: full content should not be retrived, only summary
        return Article::where('published', true)->orderBy('updated_at', 'desc')->paginate();
    }

    public function show($id)
    {
        return Article::find($id);
    }

    public function store(Request $request)
    {
        $user = \JWTAuth::parseToken()->authenticate();
        return $user->articles()->create($request->only('title', 'content', 'published'))->fresh();
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
