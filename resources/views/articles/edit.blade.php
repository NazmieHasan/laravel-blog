@extends('layouts.app')

@section('title', 'Edit' . $article->name)

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Edit {{ $article->title }}</h2>
    
            <form action="/articles/{{ $article->id }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @include('articles.form')
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
    
@endsection
