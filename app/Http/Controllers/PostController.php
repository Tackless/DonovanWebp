<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

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
        $this->validate($request, [
            'titulo' => 'required|max:255|unique:posts,titulo',
            'descripcion' => 'required',
            'num_Img' => 'numeric|min:0|max:25',
            'categoria' => 'required'
        ]);

        if ($request->imagen[0]) {
            /* Getting the file from the request. */
            $imagenes = $request->file('imagen');

            foreach ($imagenes as $key => $imagen) {

                /* Generating a unique name for the image. */
                $nombreImagen = str_replace(' ', '_', $request->titulo) . '-' . $key . '.webp';

                /* Creating an image object from the file. */
                $imagenServidor = Image::make($imagen)->encode('webp');

                /* Creating a path to the image. */
                $imagenPath = public_path('img') . '/' . $request->categoria . '/' .  $nombreImagen;

                /* Saving the image to the path specified. */
                $imagenServidor->save($imagenPath);
            }
        }

        // Una forma de crear un registro
        Post::create([
            'titulo' => str_replace(' ', '_', $request->titulo),
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
        $descripcion = explode('/', $post->descripcion);
        foreach ($descripcion as $i => $value) {
            $descripcionDividida = explode(';', $value);
            foreach ($descripcionDividida as $j => $item) {
                $arregloDesc[$i][$j] = $item;
            }
        }

        return view('post.show', [
            'post' => $post,
            'arregloDesc' => $arregloDesc
        ]);
    }

    public function destroy(Post $post)
    {
        $categoria = $post->categoria;
        // $this->authorize('delete', $post);
        $post->delete();

        // Eliminar la imagen
        for ($i=0; $i < $post->num_Img; $i++) { 
            $imagenPath = public_path('img') . '/' . $categoria . '/' . str_replace(' ', '_', $post->titulo) . '-' . $i . '.webp';
            if(File::exists($imagenPath)) {
                unlink($imagenPath);
            }
        }
        
        return redirect()->route('posts.index', $categoria);
    }
}
