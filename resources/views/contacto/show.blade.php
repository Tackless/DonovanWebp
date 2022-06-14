@extends('layouts.app')

@section('titulo')
    Listado
@endsection 

@section('contenido')
    <h1 class="p-6 text-4xl md:text-7xl text-white font-bold bg-orange-500 mb-6 shadow-lg">@yield('titulo')</h1>

    <div class="md:w-10/12 mx-auto">
        <div class="bg-white p-6 rounded-lg shadow-xl overflow-auto">
            <table class="table-fixed text-center">
                <thead>
                    <tr class="border-b-2 border-stone-900">
                        <th class="w-1/4 ">Nombre</th>
                        <th class="w-1/4 ">Email</th>
                        <th class="w-1/2 ">Asunto</th>
                        <th class="w-1/6 ">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contactos as $contacto)
                    <tr class="border-b-2 border-stone-700">
                        <td>{{ $contacto->nombre }}</td>
                        <td>{{ $contacto->email }}</td>
                        <td>{{ $contacto->asunto }}</td>
                        <td>
                            <form action="{{ route('contacto.destroy', ['contacto' => $contacto->id]) }}" method="POST">
                                @method('DELETE') {{-- Metodo Spoofing para usar metodos que el navegador nativamente no soporta --}}
                                @csrf {{-- Elemento de seguridad INDISPENSABLE --}}
                                <input type="submit" value="X" class=" bg-red-500 hover:bg-red-600 p-2 rounded-full text-white font-bold cursor-pointer">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="my-10">
                {{ $contactos->links() }}
            </div>
        </div>
    </div>

@endsection