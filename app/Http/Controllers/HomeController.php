<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke(Request $request, Post $post)
    {
        $postsFront = Post::where('categoria', 'Front')->latest()->limit('6')->get();
        $postsJs = Post::where('categoria', 'Js')->latest()->limit('2')->get();
        
        return view('home', [
            'postsFront' => $postsFront,
            'postsJs' => $postsJs
        ]);
    }
}
