<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
        $usu=User::all();
        return view('welcome',compact('usu'));
    }
    /* cadastro*/ 
    public function create()
    {
        return view('criacao.cadastro');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:6|regex:/[0-9]/|unique:users',
            'password' => 'required|string|min:6|regex:/[0-9]/',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->password = $request->password;
        $user->save();
        return redirect('/login')->with('msg', 'Médico cadastrado com sucesso.');
    }
    /*logar*/ 
    public function loga()
    {
        return view('criacao.logar');
    }

}
