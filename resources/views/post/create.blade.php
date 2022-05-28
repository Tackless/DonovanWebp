@extends('layouts.app')

@section('titulo')
    Crear nuevo Post
@endsection 

@section('contenido')
    <div class=" md:flex md:items-center md:justify-center mt-6">
        <div class=" md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <h2 class=" text-center text-xl mb-5">@yield('titulo')</h2>
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf {{-- Elemento de seguridad INDISPENSABLE --}}

                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input type="text" id="titulo" name="titulo" placeholder="Titulo del post" class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror" value="{{ old('titulo') }}">
                    
                    @error('titulo')
                    <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripcion
                    </label>
                    <textarea id="descripcion" name="descripcion" placeholder="Descripcion del post" class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror">{{ old('descripcion') }}</textarea>
                    
                    @error('descripcion')
                    <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="num_Img" class="mb-2 block uppercase text-gray-500 font-bold">
                        Número de Imagenes
                    </label>
                    <input type="number" min="0" max="9" id="num_Img" name="num_Img" placeholder="Número de Imagenes del post" class="border p-3 w-full rounded-lg @error('num_Img') border-red-500 @enderror" value="{{ old('num_Img') }}">
                    
                    @error('num_Img')
                    <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                        Imagen Perfil
                    </label>
                    <input type="file" id="imagen" name="imagen[]" class="border p-3 w-full rounded-lg " value="" accept=".jpg, .jpeg, .png" multiple>
                </div>

                <div class="mb-5">
                    <label for="categoria" class="mb-2 block uppercase text-gray-500 font-bold">
                        Categoria
                    </label>
                    <select class="border bg-white p-3 w-full rounded-lg @error('categoria') border-red-500 @enderror" name="categoria" id="categoria">
                        <option value="" selected disabled>--Seleccionar--</option>
                        <option value="Front">Front</option>
                        <option value="Back">Back</option>
                        <option value="Js">Js</option>
                    </select>
                    
                    @error('categoria')
                    <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="link" class="mb-2 block uppercase text-gray-500 font-bold">
                        Link Host
                    </label>
                    <input type="url" id="link" name="link" placeholder="Link del post" class="border p-3 w-full rounded-lg @error('link') border-red-500 @enderror" value="{{ old('link') }}">
                    
                    @error('link')
                    <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="github_link" class="mb-2 block uppercase text-gray-500 font-bold">
                        Link de GitHub
                    </label>
                    <input type="url" id="github_link" name="github_link" placeholder="Link de GitHub del post" class="border p-3 w-full rounded-lg @error('github_link') border-red-500 @enderror" value="{{ old('github_link') }}">
                    
                    @error('github_link')
                    <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <input type="submit" value="Crear Post" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection