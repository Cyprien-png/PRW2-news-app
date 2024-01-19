@extends('layout')

@section('content')
    <h1>Nouvelle enchère</h1>
    <form method="POST" action="{{ route('articles.comments.store', $article) }}">
        @csrf
        @include('auctions.fields')
        <input type="submit" value="Ajouter">
    </form>
@endsection
