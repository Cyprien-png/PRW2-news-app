@extends('layout')

@section('content')
    <h1>Voici les articles</h1>
    <ul>
    @foreach ($articles as $article)
        <li><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a> vu {{ $article->view_count }} fois</li>
    @endforeach
    </ul>
@endsection
