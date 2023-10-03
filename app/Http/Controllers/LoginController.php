<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function auth(Request $request)
    {
        $credenciais = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string|min:6|regex:/[0-9]/',
        ]);
    
    if (Auth::attempt($credenciais)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }else{
        return redirect()->back()->with('msg','erro');
    }
    }

    public function dash()
    {
        return view('principal.dashboard');
    }
    public function dataagora()
    {
        // Obter a hora atual usando Carbon
        $dataAtual = Carbon::now();

        // Formatar a data para exibição
        $dataFormatada = $dataAtual->format('d/m/Y'); // Formato: Ano-Mês-Dia (ex: 2023-10-01)

        // Passar a data formatada para a sua visão
        return view('principal.dashboard', compact('dataFormatada'));
    }
   
    
}
