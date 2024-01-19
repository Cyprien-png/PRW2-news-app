<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = request()->has('archived') ? Article::archived() : Article::unarchived();
        if (request()->has('search'))
            $articles = $articles->searchBody(request()->get('search'));

        return view('articles.index', ['articles' => $articles->get()]);
    }

    public function popular()
    {
        $articles = Article::unarchived()->orderBy('view_count', 'desc')->limit(5)->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create', ['article' => new Article()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        Article::create($request->all());
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        Article::where('id', $article->id)->update(['view_count' => $article->view_count + 1]);
    
        // return only the 'created_at' to avoid sensitive data leaks
        $heigestAuctionDate = $article->auctions()->orderBy('value', 'desc')->first()->created_at;
        return view('articles.show', ['article' => $article, 'auction_date' => $heigestAuctionDate]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->all());
        return redirect()->route('articles.show', $article);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->archive();
        return redirect()->route('articles.index');
    }
}
