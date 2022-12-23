@extends('layouts.app')

@section('title', 'Details for ' . $article->title)

@section('content')

    <div class="row">
        <div class="col-6">
        
            <h2>{{ $article->title }}</h2>
            <p>{{ $article->body }}</p>
            <p>{{ $article->created_at }}</p>
            <p>
                @foreach($user as $u) 
                   Author: {{ $u->name }} 
                @endforeach
            </p>
            <p><img src="{{ asset('storage/' . $article->image) }}" alt="" class="img-thumbnail"></p>
            <p><button class="btn btn-primary"><a href="/admin/articles/edit/{{ $article->id }}" style="color: white">Edit</a></button></p>   
            <form action="/admin/articles/destroy/{{ $article->id }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
    
        </div>
    </div>
    
@endsection
