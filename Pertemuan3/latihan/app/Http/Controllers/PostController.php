<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['author', 'category'])->latest()->get();

        // Halaman daftar banyak post tetap ke 'posts.blade.php'
        return view('posts', [
            'title' => 'Blog Posts',
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        $post->load(['author', 'category']);

        // PERUBAHAN: Diarahkan ke 'blog' sesuai permintaanmu
        return view('blog', [
            'title' => 'Single Post',
            'post' => $post
        ]);
    }
}