<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'store']);
    }

    public function index()
    {
        return view('contacto.index', [
            
        ]);
    }

    public function store(Request $request)
    {
        // Validacion
        $this->validate($request, [
            'nombre' => 'required|max:30|alpha',
            'email' => 'required|email|max:60',
            'asunto' => 'required|max:255'
        ]);

        Contacto::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'asunto' => $request->asunto
        ]);

        return back()->with('mensaje', 'Enviado Correctamente');
    }

    public function show()
    {
        $contactos = DB::table('contactos')->latest()->paginate(10);

        return view('contacto.show', [
            'contactos' => $contactos
        ]);
    }

    public function destroy(Contacto $contacto)
    {
        $contacto->delete();
        
        return back();
    }
}