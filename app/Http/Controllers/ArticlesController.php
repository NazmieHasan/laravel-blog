<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function all()
    {
        $user = Auth::user();
        $id = Auth::id();
        
        $articles = Article::where('user_id', 'like', $id)->orderBY('id', 'DESC')->get(); 
        
        return view('articles.all', compact('articles'));
    }
    
    public function create()
    {
        $article = new Article();
        
        $user = Auth::user();
        $id = Auth::id();
        $users = User::where('id', 'like', $id)->get(); 
        
        return view('articles.create', compact('article', 'users'));
    }
    
    public function store()
    {
        $article = Article::create($this->validateRequest());
        
        $this->storeImage($article);
        
        return redirect('articles')
            ->with('message', 'Article created successfully!');
    }
    
    public function show(Article $article)
    {
        $id = $article->user_id;
        $user = User::where('id', 'like', $id)->get(); 
        
        return view('articles.show', compact('article', 'user'));
    }
    
    public function edit(Article $article)
    {
        $user = Auth::user();
        $id = Auth::id();
        $users = User::where('id', 'like', $id)->get(); 
        
        return view('articles.edit', compact('article', 'users'));
    }

    public function update(Article $article)
    {
        $article->update($this->validateRequest());
        
        $this->storeImage($article);

        return redirect('articles/' . $article->id);
    }
    
    private function validateRequest()
    {
        return request()->validate([
            'title' => 'required|min:10|max:50',
            'body'  => 'required|min:20|max:200',
            'image' => 'sometimes','mimes:jpg,jpeg','max:2048',
            'user_id' => 'required',
        ]);
    }
    
    private function storeImage($article)
    {
        if (request()->has('image')) {
            $article->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);
        }
    }
     
}
