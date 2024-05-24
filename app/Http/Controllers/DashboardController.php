<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPosts = Post::count();
        $publishedPosts = Post::where('status', 1)->count();
        $unpublishedPosts = Post::where('status', 0)->count();

        return view('dashboard', compact('totalPosts', 'publishedPosts', 'unpublishedPosts'));
    }
}
