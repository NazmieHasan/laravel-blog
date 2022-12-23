@extends('layouts.app')

@section('title', 'Create Article')

@section('content')
    @if( ! session()->has('message'))
    <div class="row">
        <div class="col-12">
            <h1>Create Article</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="/articles" method="POST" enctype="multipart/form-data">
                @include('articles.form')

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
    @endif
    
@endsection
