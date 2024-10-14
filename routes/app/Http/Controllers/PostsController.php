<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function recentPosts($days_ago)
    {
        // Logic to handle recent posts view based on $days_ago parameter
        return view('posts.recent', ['days_ago' => $days_ago]);
    }

    public function show($id)
    {
        // Logic to handle showing a specific post based on $id
        return view('posts.show', ['id' => $id]);
    }
}
