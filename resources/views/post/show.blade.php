@extends('layouts.app')

@section('titulo')
    {{ str_replace('_', ' ', $post->titulo) }}
@endsection

@section('contenido')
    @if ($post->categoria === 'Front')
        <h2 class="p-6 text-7xl text-white font-bold bg-pink-500 mb-6 shadow-lg">@yield('titulo')</h2>
    @elseif ($post->categoria === 'Back')
        <h2 class="p-6 text-7xl text-white font-bold bg-blue-600 mb-6 shadow-lg">@yield('titulo')</h2>
    @else
        <h2 class="p-6 text-7xl text-black font-bold bg-yellow-300 mb-6 shadow-lg">@yield('titulo')</h2>
    @endif
    <div class="container mx-auto md:flex">
        <div class=" md:w-1/2">

            <div class="glide">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        @for ($i = 0; $i < $post->num_Img; $i++)
                            <div class="carousel-item active relative float-left w-full">
                                <img src="{{ asset('img') . '/' . $post->categoria . '/' . $post->titulo . '-' . $i . '.webp' }}" class="glide__slide" alt="Imagen del post {{ str_replace('_', ' ', $post->titulo) }}"
                                />
                            </div>
                        @endfor
                    </ul>
                </div>

                <div class="glide__arrows" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="black" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="black" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>

            @auth
                <form action="{{ route('home') }}" method="POST">
                    @method('DELETE') {{-- Metodo Spoofing para usar metodos que el navegador nativamente no soporta --}}
                    @csrf {{-- Elemento de seguridad INDISPENSABLE --}}
                    <input type="submit" value="Eliminar Publicación" class=" bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer">
                </form>
            @endauth
        </div>
        <div class=" md:w-1/2 p-5 flex flex-col justify-center">
            <div class=" shadow bg-white p-5 mb-5 col-start-2">
                <p class="text-2xl">
                    {{ $post->descripcion }}
                </p>
            </div>
            @if ($post->link)
                <a target="_blank" href="{{ $post->link }}" class="">
                    <div class=" shadow-xl bg-green-400 hover:bg-green-500 duration-500 p-5 mb-5 col-start-2 row-start-3 rounded-full flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 3.636a1 1 0 010 1.414 7 7 0 000 9.9 1 1 0 11-1.414 1.414 9 9 0 010-12.728 1 1 0 011.414 0zm9.9 0a1 1 0 011.414 0 9 9 0 010 12.728 1 1 0 11-1.414-1.414 7 7 0 000-9.9 1 1 0 010-1.414zM7.879 6.464a1 1 0 010 1.414 3 3 0 000 4.243 1 1 0 11-1.415 1.414 5 5 0 010-7.07 1 1 0 011.415 0zm4.242 0a1 1 0 011.415 0 5 5 0 010 7.072 1 1 0 01-1.415-1.415 3 3 0 000-4.242 1 1 0 010-1.415zM10 9a1 1 0 011 1v.01a1 1 0 11-2 0V10a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        <p class="text-black ml-4">Ir a la página</p>
                    </div>
                </a>
            @endif
            
            @if ($post->github_link)
                <a target="_blank" href="{{ $post->github_link }}" class="">
                    <div class=" shadow-xl bg-gray-800 hover:bg-gray-700 duration-500 p-5 mb-5 col-start-2 row-start-3 rounded-full flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-github" width="80" height="80" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
                        </svg> 
                        <p class="text-white ml-4">Link de GitHub</p>
                    </div>
                </a>
            @endif
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('js/app.js') }}"></script>
    @endpush
@endsection

