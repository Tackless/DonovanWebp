<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke(Request $request, Post $post)
    {
        $postsFront = Post::where('categoria', 'Front')->latest()->get();
        
        return view('home', [
            'postsFront' => $postsFront
        ]);
    }
}
