<?php

namespace App\Http\Controllers\Dashboard\Article;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleRequest;

class ArticleController extends Controller
{

    public function searchByTag($tagName)
    {
        $tag = Tag::where('name', 'LIKE', "%$tagName%")->first();
        $articles = $tag->articles;
        return response()->json(['message'=>'articles retrieved successfully','articles'=>$articles]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->validated();
        return DB::transaction(function () use ($data , $request) {

            $article = Article::create($data);
            $article->categories()->attach($request->input('categories'));
            $article->tags()->attach($request->input('tags'));

            return response()->json(['message'=>'article added successfully']);

        });

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $data = $request->validated();
        return DB::transaction(function () use ($data , $article ,$request) {

            $article->update($data);
            $article->categories()->sync($request->input('categories'));
            $article->tags()->sync($request->input('tags'));

            return response()->json(['message'=>'article updated successfully']);

        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return response()->json(['message'=>'article deleted successfully']);

    }
}
