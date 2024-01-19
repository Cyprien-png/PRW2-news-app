@extends('layout')

@section('content')
    <h1>Nouvel article</h1>
    <form method="POST" action="{{ route('articles.store') }}">
        @csrf
        @include('articles.fields')
        <input type="submit" value="Ajouter">
    </form>
@endsection
