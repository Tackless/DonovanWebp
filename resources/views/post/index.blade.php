@extends('layouts.app')

@section('titulo')
    {{ $url }}
@endsection

@section('contenido')
    @if ($url === 'Front')
        <h1 class="p-6 text-4xl md:text-7xl text-white font-bold bg-pink-500 mb-6 shadow-lg">Diseños Web | Proyectos</h1>
    @elseif ($url === 'Back')
        <h1 class="p-6 text-4xl md:text-7xl text-white font-bold bg-blue-600 mb-6 shadow-lg">Aplicaciones Web | Proyectos</h1>
    @elseif ($url === 'Js')
        <h1 class="p-6 text-4xl md:text-7xl text-black font-bold bg-yellow-300 mb-6 shadow-lg">Utilidades Web | Proyectos</h1>
    @else
        
    @endif

    <section class=" container mx-auto mt-10">

        <div>
            @if ($posts->count())
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($posts as $post)
                        <div class="">
                            <a href="{{ route('posts.show', ['post' => $post]) }}">
                                <img width="250px" height="250px" class="hover:transform transition-transform ease-in-out duration-500 hover:scale-110 rounded" src="{{ asset('img') . '/' . $post->categoria . '/' . $post->titulo . '-0.webp'}}" alt="Imagen del post {{ str_replace('_', ' ', $post->titulo) }}"> 
                            </a>
                            {{-- . '-' . $key . '.webp' --}}
                        </div>
                    @endforeach
                </div>
        
                <div class="my-10">
                    {{ $posts->links() }}
                </div>
        
            @else
                <p class=" text-gray-600 uppercase text-sm text-center font-bold">No hay Posts</p>
            @endif
        </div>
    </section>

@endsection