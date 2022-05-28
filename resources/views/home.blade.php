@extends('layouts.app')

@section('titulo')
    Programador Web
@endsection

@section('contenido')

    <section class=" container text-center mx-auto mb-10">
        <h1 class="p-6 text-7xl text-white font-bold bg-green-600 rounded-xl rounded-t-none mb-6 shadow-lg">@yield('titulo')</h1>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, distinctio nobis. Laboriosam facilis id delectus non voluptatem reprehenderit laborum, illo quis eveniet aut totam tenetur quas a sequi ea distinctio?Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim sit facere velit neque perferendis repudiandae nisi est itaque, autem, modi cupiditate alias! Impedit, dolores at quod voluptate eum minima architecto?Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, ut nemo sed quo, vel dignissimos officiis sit, hic quam voluptatem et totam rem qui facilis eligendi sapiente expedita modi nihil!</p>

    </section>

    <main class=" container text-center mx-auto mb-10">
        <h2 class="p-6 text-7xl text-white font-bold bg-pink-500 rounded-xl mb-6 shadow-lg">Front-End</h2>

        <div class="grid md:grid-cols-3 gap-4 mb-6">
            <div>
                <a href="http://localhost/posts/Rock%20&%20EDM%20Festival">
                    <img class="hover:transform transition-transform ease-in-out duration-500 hover:scale-110 rounded" src="{{ asset('img/Front/2-1.png') }}" alt="frontend festival musica">
                </a>
            </div>
            <div>
                <a href="http://localhost/posts/DevStagram">
                    <img class="hover:transform transition-transform ease-in-out duration-500 hover:scale-110 rounded" src="{{ asset('img/Front/6.png') }}" alt="frontend festival musica">
                </a>
            </div>
            <div>
                <a href="http://localhost/posts/Tip%20Splitter">
                    <img class="hover:transform transition-transform ease-in-out duration-500 hover:scale-110 rounded" src="{{ asset('img/Front/2.png') }}" alt="frontend festival musica">
                </a>
            </div>
            <div class="">
                <img class="hover:transform transition-transform ease-in-out duration-500 hover:scale-110 rounded" src="{{ asset('img/Front/3.png') }}" alt="frontend sunnyside">
            </div>
            <div>
                <img class="hover:transform transition-transform ease-in-out duration-500 hover:scale-110 rounded" src="{{ asset('img/Front/4.png') }}" alt="frontend festival musica">
            </div>
            <div class="">
                <img class="hover:transform transition-transform ease-in-out duration-500 hover:scale-110 rounded" src="{{ asset('img/Front/5.png') }}" alt="frontend Udemy clon">
            </div>
        </div>
        <a 
        class=" bg-pink-500 hover:bg-pink-600 px-6 py-2 text-2xl rounded-xl text-white m-8" href="/Front">Ver más...</a>
    </main>

    <section class=" container text-center mx-auto">
        <h2 class="p-6 text-7xl text-white font-bold bg-blue-600 rounded-xl mb-6 shadow-lg">Back-End</h2>
        <div class="grid md:grid-cols-3 md:gap-6 mb-6">
            <div class="flex flex-col items-center justify-center bg-blue-300 md:rounded-xl md:m-auto p-5 shadow-lg mb-4"> 
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A tenetur vitae, temporibus dicta quidem neque nostrum et, tempora modi adipisci impedit est? Dolore labore magni reiciendis soluta perspiciatis hic vero!
                    <br>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti illo, modi veniam blanditiis voluptatem impedit nemo excepturi! Maiores vero ducimus necessitatibus inventore odio? Repellat nisi amet perferendis sit incidunt dolor?
                    <br>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugiat voluptatibus, adipisci doloribus iste velit ducimus odit ipsa fugit nemo dolore possimus, in nostrum quis accusantium harum sunt, excepturi illo? Tempore!
                </p>

                <a class=" bg-blue-500 hover:bg-blue-600 px-6 py-2 text-2xl rounded-xl text-white m-8" href="/Back">Ver más...</a>
            </div>
            <img class="col-span-2 rounded shadow-lg" src="{{ asset('img/Back/1-1.png') }}" alt="devstagram post">
        </div>
    </section>

    <section class=" container text-center mx-auto">
        <h2 class="p-6 text-7xl text-black font-bold bg-yellow-300 rounded-xl mb-6 shadow-lg">Utilidades JS</h2>
        <div class="">
            <div class="grid grid-cols-3 gap-4  items-center mb-6">
                <img class="col-span-2 w-full shadow-lg rounded" src="{{ asset('img/Js/3-1.png') }}" alt="tip generator">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore nesciunt doloribus laboriosam voluptatibus maiores sunt sit, voluptatum vitae debitis sapiente iure aliquid doloremque voluptate fuga fugiat reiciendis. Totam, officiis itaque?</p>
            </div>
            <div class="grid grid-cols-3 gap-4  items-center mb-6">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore nesciunt doloribus laboriosam voluptatibus maiores sunt sit, voluptatum vitae debitis sapiente iure aliquid doloremque voluptate fuga fugiat reiciendis. Totam, officiis itaque?</p>
                <img class="col-span-2 w-full shadow-lg rounded " src="{{ asset('img/Js/2.png') }}" alt="email sender">
            </div>
            <a class=" bg-yellow-300 hover:bg-yellow-400 px-6 py-2 text-2xl rounded-xl text-black m-8" href="/Js">Ver más...</a>
        </div>
    </section>
@endsection