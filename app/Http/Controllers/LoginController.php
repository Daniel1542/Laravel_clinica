<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medico;
use App\Models\Paciente;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function auth(Request $request)
    {
        $credenciais = $request->validate([
            'name' => 'required|string|min:6|regex:/[0-9]/',
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
        $dataAtual = Carbon::now();
        $medicos = Medico::count(); 
        $pacientes = Paciente::count(); 

        return view('principal.dashboard', compact('dataAtual', 'medicos', 'pacientes'));
    }
    
    
}
