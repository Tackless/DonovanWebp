<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Sitio web de Donovan WebP para mostrar las creaciones realizadas por él.">
    <title>Donovan WebP | @yield('titulo')</title>
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body class=" bg-slate-400">
    
    <header class="py-4 bg-white shadow-lg">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center ">
            <a href="{{ route('home') }}">
                <img class=" max-h-20 mb-4 md:mb-0" width="250px" height="250px" src="{{ asset('img/logo.webp') }}" alt="Logo donovan webp">
            </a>
            <nav class="flex flex-col w-full md:w-auto md:flex-row gap-3 text-center font-bold text-xl text-black md:text-base">
                <a class="p-2 border-solid border-2 border-pink-500 rounded hover:bg-pink-600 hover:text-white  duration-500 transition-colors hover:border-white" href="/Front">Diseño</a>
                <a class="p-2 border-solid border-2 border-blue-500 rounded hover:bg-blue-600 hover:text-white  duration-500 transition-colors hover:border-white" href="/Back">Aplicaciones</a>
                <a class="p-2 border-solid border-2 border-yellow-300 rounded hover:bg-yellow-400 hover:text-white  duration-500 transition-colors hover:border-white" href="/Js">Utilidades</a>
                <a class="p-2 border-solid border-2 border-orange-400 rounded hover:bg-orange-500 hover:text-white  duration-500 transition-colors hover:border-white" href="{{ route('contacto') }}">Contacto</a>
                
                @auth
                    <a class="p-2 border-solid border-2 border-orange-400 rounded hover:bg-orange-500 hover:text-white  duration-500 transition-colors hover:border-white" href="{{ route('contacto.show') }}">Listado</a>
                    <a class="p-2 border-solid border-2 border-gray-300 rounded hover:bg-gray-400 hover:text-white  duration-500 transition-colors hover:border-white" href="{{ route('posts.create') }}">Crear</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf {{-- Elemento de seguridad INDISPENSABLE --}}
                        <button type="submit" class=" w-full md:w-auto p-2 border-solid border-2 border-gray-300 rounded hover:bg-gray-400 hover:text-white  duration-500 transition-colors hover:border-white">Cerrar Sesión</button>
                    </form>
                @endauth
            </nav>
        </div>
    </header>

    @yield('contenido')

    <footer class=" mt-10 p-5 text-gray-300 bg-slate-900 font-bold uppercase flex flex-col justify-between gap-5 ">
        <div class="flex flex-col md:flex-row justify-around items-center">
            <nav class=" text-white flex flex-col gap-5 w-full md:w-auto text-center">
                <a class=" border-dashed border-2 p-2 hover:bg-pink-600 duration-500 transition-colors hover:border-white border-pink-500 " href="/Front">Diseño</a>
                <a class=" border-dashed border-2 p-2 hover:bg-blue-600 duration-500 transition-colors hover:border-white border-blue-500 " href="/Back">Aplicaciones</a>
                <a class=" border-dashed border-2 p-2 hover:bg-yellow-600 duration-500 transition-colors hover:border-white border-yellow-500 " href="/Js">Utilidades</a>
            </nav>
            
            <nav class=" text-white flex flex-col gap-5 w-full md:w-auto">
                <a class=" text-center md:text-left text-white duration-500 hover:text-orange-500 mt-4 md:mt-0" href="{{ route('contacto') }}">Contacto:</a>
                <div class="flex flex-col sm:flex-row justify-between">
                    <p>E-mail: </p>
                    <a class=" sm:ml-5 lowercase text-blue-200" href="mailto:donovan.e.tg@gmail.com">donovan.e.tg@gmail.com</a>
                </div>
                <div class="flex flex-col sm:flex-row justify-between">
                    <p>Teléfono: </p>
                    <a class="text-blue-200" href="tel:+52-55-4782-4091">+52 55-4782-4091</a>
                </div>
            </nav>
        </div>
        <p class=" text-center"><a class=" font-bold text-white" href="{{ route('login') }}">Donovan WebP</a> - Todos los derechos reservados {{ now()->year }} &copy;</p>
    </footer>
    @stack('scripts')
</body>
</html>