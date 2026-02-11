<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PageController extends Controller
{
    public function home()
    {
        $latestPosts = Post::with('category')->latest()->take(3)->get();
        return view('home', compact('latestPosts'));
    }

    public function blog()
    {
        $posts = Post::with('category')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function privacy()
    {
        return view('privacy');
    }
}
