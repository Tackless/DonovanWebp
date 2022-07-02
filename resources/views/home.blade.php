@extends('layouts.app')

@section('titulo')
    Programador Web
@endsection

@section('contenido')

    <section class=" container text-center mx-auto mb-10">
        <h1 class="p-6 text-4xl md:text-7xl text-white font-bold bg-green-600 rounded-xl rounded-t-none mb-6 shadow-lg">@yield('titulo')</h1>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, distinctio nobis. Laboriosam facilis id delectus non voluptatem reprehenderit laborum, illo quis eveniet aut totam tenetur quas a sequi ea distinctio?Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim sit facere velit neque perferendis repudiandae nisi est itaque, autem, modi cupiditate alias! Impedit, dolores at quod voluptate eum minima architecto?Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, ut nemo sed quo, vel dignissimos officiis sit, hic quam voluptatem et totam rem qui facilis eligendi sapiente expedita modi nihil!</p>

    </section>

    <main class=" container text-center mx-auto mb-10">
        <h2 class="p-6 text-4xl md:text-7xl text-white font-bold bg-pink-500 rounded-xl mb-6 shadow-lg">Diseños</h2>

        <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-4 mb-6 justify-center text-center">
            @foreach ($postsFront as $post)
                <div class="flex justify-center items-center">
                    <a href="{{ route('posts.show', ['post' => $post]) }}">
                        <img class="w-full overflow-hidden hover:transform transition-transform ease-in-out duration-500 hover:scale-110 rounded" width="250px" height="250px" src="{{ asset('img/Front/' . $post->titulo . '-0.webp') }}" alt="Diseño de {{$post->titulo}}">
                    </a>
                </div>
            @endforeach
        </div>
        <a 
        class=" bg-pink-500 hover:bg-pink-600 px-6 py-2 text-2xl rounded-xl text-white m-8" href="/Front">Ver más...</a>
    </main>

    <section class=" container text-center mx-auto">
        <h2 class="p-6 text-4xl md:text-7xl text-white font-bold bg-blue-600 rounded-xl mb-6 shadow-lg">Aplicaciones</h2>
        <div class="grid lg:grid-cols-3 lg:gap-5 mb-6">
            <div class="flex flex-col items-center justify-center bg-blue-300 md:rounded-xl lg:m-auto p-5 shadow-lg mb-4"> 
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A tenetur vitae, temporibus dicta quidem neque nostrum et, tempora modi adipisci impedit est? Dolore labore magni reiciendis soluta perspiciatis hic vero!
                    <br>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti illo, modi veniam blanditiis voluptatem impedit nemo excepturi! Maiores vero ducimus necessitatibus inventore odio? Repellat nisi amet perferendis sit incidunt dolor?
                    <br>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugiat voluptatibus, adipisci doloribus iste velit ducimus odit ipsa fugit nemo dolore possimus, in nostrum quis accusantium harum sunt, excepturi illo? Tempore!
                </p>

                <a class=" bg-blue-500 hover:bg-blue-600 px-6 py-2 text-2xl rounded-xl text-white m-8" href="/Back">Ver más...</a>
            </div>
            <img class="col-span-2 rounded shadow-lg w-full" width="250px" height="250px" src="{{ asset('img/Back/1-1.webp') }}" alt="devstagram post">
        </div>
    </section>

    <section class=" container text-center mx-auto">
        <h2 class="p-6 text-4xl md:text-7xl text-black font-bold bg-yellow-300 rounded-xl mb-6 shadow-lg">Utilidades</h2>
        <div class="">
            @foreach ($postsJs as $post)
                <div class="grid lg:grid-cols-3 gap-4 w-full items-center mb-6 js">
                    <a class="col-span-2 w-full shadow-lg rounded" href="{{ route('posts.show', ['post' => $post]) }}">
                        <img class="w-full" width="250px" height="250px" src="{{ asset('img/Js/' . $post->titulo . '-0.webp') }}" alt="Utilidad de {{ $post->titulo }}">
                    </a>
                    <p class="col-span-2 lg:col-span-1 ">{{$post->descripcion}}</p>
                </div>
            @endforeach
            <a class=" bg-yellow-300 hover:bg-yellow-400 px-6 py-2 text-2xl rounded-xl text-black m-8" href="/Js">Ver más...</a>
        </div>
    </section>
@endsection