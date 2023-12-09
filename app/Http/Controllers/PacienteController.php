<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Paciente;
use Illuminate\Support\Facades\Storage;


class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paciente = Paciente::all();
        return view('crudpaciente.criapacientes', compact('paciente'));
    }
    public function mostra()
    {
        $paciente = Paciente::all();
        return view('crudpaciente.mostrapaciente' , compact('paciente'));
    }
    public function lista()
    {
        $paciente = Paciente::all();
        return view('crudpaciente.listapaciente', compact('paciente'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crudpaciente.criapacientes');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NomeCompleto' => 'required|string|max:20',
            'DataNascimento' => 'required|string|date',
            'RG' => 'required|numeric|digits:7|unique:pacientes',
            'CPF' => 'required|digits:11|unique:pacientes|numeric',
            'Endereco' => 'required|string|max:25',
            'Telefone' => 'required|unique:pacientes|numeric',
            'Email' => 'required|string|email|unique:pacientes|max:20',
            'Datacadastro' => 'required|date',
            'Historico' => 'required|string|max:25',
            'Informacoes' => 'required|string',

        ]);
        $pacient = new paciente;
        $pacient->NomeCompleto = $request->NomeCompleto;
        $pacient->DataNascimento = $request->DataNascimento;
        $pacient->RG = $request->RG;
        $pacient->CPF = $request->CPF;
        $pacient->Endereco = $request->Endereco;
        $pacient->Telefone = $request->Telefone;
        $pacient->Email = $request->Email;
        $pacient->Datacadastro = $request->Datacadastro;
        $pacient->Historico = $request->Historico;
        $pacient->Informacoes = $request->Informacoes;

        if($request->hasfile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension =  $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/fotopaciente'), $imageName);
            $pacient->image = $imageName;
        }
        $pacient->save();
        return redirect()->route('prontuarios.create', ['paciente_id' => $pacient->id])->with('msg', 'Paciente cadastrado com sucesso.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pacientes = Paciente::find($id);

        if (!$pacientes) {
            return abort(404); 
    }

        return view('crudpaciente.mostrapaciente', compact('pacientes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paciente = Paciente::where('id', $id)->first();
        if (!$paciente) {
            return redirect()->route('dashboard')->with('msg', 'paciente não encontrado.');
        }
        return view('crudpaciente.editarpaciente', compact('paciente'));

    }

    public function buscarPorCPF(Request $request)
    {
        $cpf = $request->input('cpf');
        $paciente = Paciente::where('CPF', $cpf)->first();

        if (!$paciente) {
            return redirect()->back()->with('msg', 'paciente não encontrado pelo CPF: ' . $cpf);
        }

        return view('crudpaciente.editarpaciente', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'NomeCompleto' => 'required|string|max:20',
            'DataNascimento' => 'required|string|date',
            'RG' => 'required|numeric|digits:7',
            'CPF' => 'required|digits:11|numeric',
            'Endereco' => 'required|string|max:25',
            'Telefone' => 'required|numeric',
            'Email' => 'required|string|email|max:20',
            'Datacadastro' => 'required|date',
            'Historico' => 'required|string|max:25',
            'Informacoes' => 'required|string',
        ]);

        $paciente = Paciente::find($id);
        $paciente->NomeCompleto = $request->NomeCompleto;
        $paciente->DataNascimento = $request->DataNascimento;
        $paciente->RG = $request->RG;
        $paciente->CPF = $request->CPF;
        $paciente->Endereco = $request->Endereco;
        $paciente->Telefone = $request->Telefone;
        $paciente->Email = $request->Email;
        $paciente->Datacadastro = $request->Datacadastro;
        $paciente->Historico = $request->Historico;
        $paciente->Informacoes = $request->Informacoes;

        if($request->hasfile('image') && $request->file('image')->isValid()){
            if ($paciente->image) {
                Storage::delete('img/fotopaciente/' . $paciente->image);
            }

            $requestImage = $request->image;
            $extension =  $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/fotopaciente'), $imageName);
            $paciente->image = $imageName;
        }
        $paciente->save();
        return redirect()->route('prontuarios.edit', ['id' => $paciente-> id])->with('msg', 'Paciente editado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pacientes = Paciente::find($id);

        if (!$pacientes) {
            return redirect('/dashboard')->with('msg', 'paciente atualizado com sucesso.');
        }
        $pacientes->delete();
        return redirect('/dashboard')->with('msg', 'paciente excluido com sucesso.');
    }
    public function contapaciente()
    {     
        $quantidadeDepaciente = Paciente::count();
             
        return view('principal.dashboard', compact('quantidadeDepaciente'));
    }
}
