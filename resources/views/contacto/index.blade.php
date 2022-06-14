@extends('layouts.app')

@section('titulo')
    Contacto
@endsection

@section('contenido')
    <h1 class="p-6 text-4xl md:text-7xl text-white font-bold bg-orange-500 mb-6 shadow-lg">@yield('titulo')</h1>

    <div class="md:flex md:justify-center md:gap-10 md:items-center mt-6">
        <div class="md:w-6/12 bg-white p-6 rounded-lg shadow-xl">
            @if (session('mensaje'))
                <div class="p-2 rounded-lg mb-6 text-white text-center uppercase font-bold bg-green-500">
                    <p>{{session('mensaje')}}</p>
                </div>
            @endif
            <form action="{{ route('contacto') }}" method="POST">
                @csrf {{-- Elemento de seguridad INDISPENSABLE --}}
                <div class="mb-5">
                    <label for="nombre" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input type="text" id="nombre" name="nombre" placeholder="Tu Nombre" class="border p-3 w-full rounded-lg @error('nombre') border-red-500 @enderror" value="{{ old('nombre') }}">
                    
                    @error('nombre')
                        <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        E-mail
                    </label>
                    <input type="email" id="email" name="email" placeholder="Tu E-mail" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                    
                    @error('email')
                        <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="asunto" class="mb-2 block uppercase text-gray-500 font-bold">
                        Asunto
                    </label>
                    <textarea id="asunto" name="asunto" placeholder="¿Qué necesitas?" class="border p-3 w-full rounded-lg @error('asunto') border-red-500 @enderror">{{ old('asunto') }}</textarea>
                    
                    @error('asunto')
                        <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                
                <input type="submit" value="Enviar" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection