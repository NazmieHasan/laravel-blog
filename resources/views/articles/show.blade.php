@extends('layouts.app')

@section('title', 'Details for ' . $article->title)

@section('content')

    <div class="row">
        <div class="col-6">
            <h2>{{ $article->title }}</h2>
            <p>{{ $article->body }}</p>
            <p>{{ $article->created_at }}</p>
            <p><img src="{{ asset('storage/' . $article->image) }}" alt="" class="img-thumbnail"></p>
            <p><button class="btn btn-primary"><a href="/articles/edit/{{ $article->id }}" style="color: white">Edit</a></button></p>   
        </div>
    </div>
    
@endsection
