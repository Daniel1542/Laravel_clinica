<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Storage;


class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funcionario = Funcionario::all();
        return view('principal.dashboard', compact('funcionario'));
    }
    public function mostra()
    {
        $funcionario = Funcionario::all();
        return view('crudfuncionario.mostrafuncionario' , compact('funcionario'));
    }
    public function lista()
    {
        $funcionario = Funcionario::all();
        return view('crudfuncionario.listafuncionario', compact('funcionario'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crudfuncionario.criafuncionario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NomeCompleto' => 'required|string|max:25',
            'DataNascimento' => 'required|string|date',
            'RG' => 'required|numeric|digits:7|unique:funcionario',
            'CPF' => 'required|digits:11|unique:funcionario|numeric',
            'Endereco' => 'required|string|max:25',
            'Telefone' => 'required|unique:funcionario|numeric',
            'Email' => 'required|string|email|unique:funcionario|max:20',
            'DataAdmisssao' => 'required|date',
            'DataDemissao' => 'date',
            'Cargo' => 'required|string|max:25',

        ]);
        $funcionari = new funcionario;
        $funcionari->NomeCompleto = $request->NomeCompleto;
        $funcionari->DataNascimento = $request->DataNascimento;
        $funcionari->RG = $request->RG;
        $funcionari->CPF = $request->CPF;
        $funcionari->Endereco = $request->Endereco;
        $funcionari->Telefone = $request->Telefone;
        $funcionari->Email = $request->Email;
        $funcionari->DataAdmisssao = $request->DataAdmisssao;
        $funcionari->DataDemissao = $request->DataDemissao;
        $funcionari->Cargo = $request->Cargo;

        if($request->hasfile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension =  $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/fotofuncionario'), $imageName);
            $funcionari->image = $imageName;
        }

        $funcionari->save();
        return redirect('/listafuncionario')->with('msg', 'funcionario cadastrado com sucesso.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $funcionario = Funcionario::find($id);

        if (!$funcionario) {
            return abort(404); 
    }

        return view('crudfuncionario.mostrafuncionario', compact('funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $funcionario = Funcionario::where('id', $id)->first();
        if (!$funcionario) {
            return redirect()->route('dashboard')->with('msg', 'funcionario não encontrado.');
        }

        return view('crudfuncionario.editarfuncionario', compact('funcionario'));
    }

    public function buscarPorCPF(Request $request)
    {
        $cpf = $request->input('cpf');
        $funcionario = Funcionario::where('CPF', $cpf)->first();

        if (!$funcionario) {
            return redirect()->back()->with('msg', 'funcionario não encontrado pelo CPF: ' . $cpf);
        }

        return view('crudfuncionario.editarfuncionario', compact('funcionario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'NomeCompleto' => 'required|string|max:25',
            'DataNascimento' => 'required|string|date',
            'RG' => 'required|numeric|digits:7',
            'CPF' => 'required|digits:11|numeric',
            'Endereco' => 'required|string|max:25',
            'Telefone' => 'required|numeric',
            'Email' => 'required|string|email|max:20',
            'DataAdmisssao' => 'required|date',
            'DataDemissao' => 'date',
            'Cargo' => 'required|string|max:25',

        ]);
        $funcionario = Funcionario::find($id);
        $funcionario->NomeCompleto = $request->NomeCompleto;
        $funcionario->DataNascimento = $request->DataNascimento;
        $funcionario->RG = $request->RG;
        $funcionario->CPF = $request->CPF;
        $funcionario->Endereco = $request->Endereco;
        $funcionario->Telefone = $request->Telefone;
        $funcionario->Email = $request->Email;
        $funcionario->DataAdmisssao = $request->DataAdmisssao;
        $funcionario->DataDemissao = $request->DataDemissao;
        $funcionario->Cargo = $request->Cargo;

        if($request->hasfile('image') && $request->file('image')->isValid()){
            if ($funcionario->image) {
                Storage::delete('img/fotofuncionario/' . $funcionario->image);
            }

            $requestImage = $request->image;
            $extension =  $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/fotofuncionario'), $imageName);
            $funcionario->image = $imageName;
        }
        $funcionario->save();
        return redirect('/dashboard')->with('msg', 'funcionario atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $funcionario = Funcionario::find($id);

        if (!$funcionario) {
            return redirect('/dashboard')->with('msg', 'funcionario não excluido');
        }
        $funcionario->delete();
        return redirect('/dashboard')->with('msg', 'funcionario excluido com sucesso.');
    }

}
