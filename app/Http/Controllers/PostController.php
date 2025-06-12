<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Fetch all posts
        $posts = Post::with(['user', 'comments', 'likes'])->get();
        return response()->json([
            'success' => true,
            'data' => $posts,
        ]);
    }
}
