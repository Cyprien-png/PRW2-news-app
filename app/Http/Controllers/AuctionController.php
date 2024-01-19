<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Article;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function create(Article $article)
    {
        return view('auctions.create', ['auction' => new Auction(), 'article' => $article]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Article $article, Request $request)
    {
        if ($article->archived_at)
            abort(403);

        $article->auctions()->create($request->all());
        return redirect()->route('articles.show', $article);
    }
}
