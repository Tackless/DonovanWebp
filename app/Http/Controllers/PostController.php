<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    public function index()
    {
        $url = URL::current();
        $url = explode('/', $url);
        $url = $url[3];
        $posts = Post::where('categoria', $url)->latest()->paginate(20);

        return view('post.index',[
            'posts' => $posts,
            'url' => $url
        ]);
    }

    public function create()
    {
        return view('post.create');
    }
    
    public function store(Request $request)
    {
        // dd(auth()->user()->id);
        $this->validate($request, [
            'titulo' => 'required|max:255|unique:posts',
            'descripcion' => 'required',
            'num_Img' => 'numeric|min:0|max:9',
            'categoria' => 'required',
            'link' => 'url',
            'github_link' => 'url'
        ]);

        // Una forma de crear un registro
        Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'num_Img' => $request->num_Img,
            'categoria' => $request->categoria,
            'link' => $request->link,
            'github_link' => $request->github_link
        ]);

        return redirect()->route('home');
    }

    public function show(Post $post)
    {
        return view('post.show', [
            'post' => $post
        ]);
    }
}
