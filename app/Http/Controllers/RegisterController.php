<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() 
    {
        /* Returning the view `auth.register` */
        return view('auth.register');
    }

    public function store(Request $request) 
    {
        // dd($request); Todos los elementos
        // dd($request->get('username')); 1 SOLO elemento

        // Modificar el Request
        // $request->request->add(['username' => Str::slug($request->username)]);

        // Validacion
        $this->validate($request, [
            'name' => 'required|max:30',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        /* Logging the user in. */
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);

        // Otra forma de validar
        auth()->attempt($request->only('email', 'password'));


        /* Redirecting the user to the `post.index` route. */
        return redirect()->route('home');
    }
}
