<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('admin.admin-area');
    }
    
    public function allArticles()
    {
        $articles = Article::orderBy('id', 'DESC')->get();
        
        return view('admin.articles.all', compact('articles'));
    }
    
    public function createArticle()
    {
        $article = new Article();
        
        $users = User::all();
        
        return view('admin.articles.create', compact('article', 'users'));
    }
    
    public function storeArticle()
    {
        $article = Article::create($this->validateRequest());
        
        $this->storeImage($article);
        
        return redirect('admin/articles/all')
            ->with('message', 'Article created successfully!');
    }
    
    public function showArticle(Article $article)
    {
        $id = $article->user_id;
        $user = User::where('id', 'like', $id)->get(); 
        
        return view('admin.articles.show', compact('article', 'user'));
    }
    
    public function editArticle(Article $article)
    {
        $users = User::all();
        
        return view('admin.articles.edit', compact('article', 'users'));
    }

    public function updateArticle(Article $article)
    {
        $article->update($this->validateRequest());
        
        $this->storeImage($article);

        return redirect('admin/articles/' . $article->id);
    }
    
    public function destroyArticle(Article $article)
    {
        $article->delete();

        $articles = Article::orderBy('id', 'DESC')->get();
        
        return view('admin.articles.all', compact('articles'));
    }
    
    public function allUsers()
    {
        $users = User::all();
        
        return view('admin.users.all', compact('users'));
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
