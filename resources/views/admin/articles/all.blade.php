@extends('layouts.app')

@section('title', 'All Articles')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3><a href="/admin/articles/create">Create Article</a></h3>
            <h2>Articles</h2>
   
            <table class="table table-bordered table-stripped">
               <thead>
                    <tr>
                        <th width="10%">#</th>
                        <th width="10%">Title</th>
                        <th width="40%">Body</th>
                        <th width="20%">Image</th>
                        <th width="10%">Date Added</th>
                        <th width="10%">Details</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->body }}</td>
                        <td><img src="{{ asset('storage/' . $article->image) }}" alt="article-image" class="img-thumbnail"></td>
                        <td>{{ $article->created_at }}</td>
                        <td><a href="/admin/articles/{{ $article->id }}">Details</a></td>
                    </tr> 
                @endforeach
                </tbody>
            </table>
          
        </div>
    </div>  
@endsection
