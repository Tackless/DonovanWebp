<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Donovan WebP | @yield('titulo')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body class=" bg-slate-400">
    
    <header class="py-4 bg-white shadow-lg">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center ">
            <a href="{{ route('home') }}">
                <img class=" max-h-20 mb-4 md:mb-0" src="{{ asset('img/logo.png') }}" alt="Logo donovan webp">
            </a>
            <nav class="flex flex-col w-full md:w-auto md:flex-row gap-3 text-center font-bold text-xl text-black md:text-base">
                <a class="p-2 border-solid border-2 border-pink-500 rounded hover:bg-pink-600 hover:text-white  duration-500 hover:border-white" href="/Front">Front</a>
                <a class="p-2 border-solid border-2 border-blue-500 rounded hover:bg-blue-600 hover:text-white  duration-500 hover:border-white" href="/Back">Back</a>
                <a class="p-2 border-solid border-2 border-yellow-300 rounded hover:bg-yellow-400 hover:text-white  duration-500 hover:border-white" href="/Js">Js</a>
                <a class="p-2 border-solid border-2 border-gray-300 rounded hover:bg-gray-400 hover:text-white  duration-500 hover:border-white" href="#">Contacto</a>
                @auth
                    <a class="p-2 border-solid border-2 border-gray-300 rounded hover:bg-gray-400 hover:text-white  duration-500 hover:border-white" href="{{ route('posts.create') }}">Crear</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf {{-- Elemento de seguridad INDISPENSABLE --}}
                        <button type="submit" class=" w-full md:w-auto p-2 border-solid border-2 border-gray-300 rounded hover:bg-gray-400 hover:text-white  duration-500 hover:border-white">Cerrar Sesión</button>
                    </form>
                @endauth
            </nav>
        </div>
    </header>

    <hr>

    @yield('contenido')

    <footer class=" mt-10 text-center p-5 text-gray-500 font-bold uppercase">
        <a class=" font-bold text-black" href="{{ route('login') }}">Donovan WebP</a> - Todos los derechos reservados {{ now()->year }} &copy;
    </footer>
    @stack('scripts')
</body>
</html>