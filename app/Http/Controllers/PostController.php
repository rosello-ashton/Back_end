<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->latest()->get();
        return view('posts.index', compact('posts'));
    }
    
    public function show($id)
    {
        $post = Post::with('category')->findOrFail($id);
        return view('posts.show', compact('post'));
    }
}