<?php

namespace App\Http\Controllers;
use App\Models\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
    
        $medicos = Medico::all();
        
        return view('principal.dashboard', compact('medicos'));
    }

    public function mostra()
    {
        $medicos = Medico::all();
        return view('crudmedico.mostramedico' , compact('medicos'));
    }
    public function lista()
    {
        $medicos = Medico::all();
        return view('crudmedico.listamedico', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crudmedico.criamedicos');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NomeCompleto' => 'required|string|max:20',
            'DataNascimento' => 'required|date',
            'RG' => 'required|numeric|digits:7|unique:medicos',
            'CPF' => 'required|digits:11|unique:medicos|numeric',
            'Endereco' => 'required|string|max:20',
            'Telefone' => 'required|unique:medicos|numeric',
            'Email' => 'required|string|email|unique:medicos|max:20',
            'Datacadastro' => 'required|date',
            'Especialidade' => 'required|string|max:25',
        ]);
        $medic = new medico;
        $medic->NomeCompleto = $request->NomeCompleto;
        $medic->DataNascimento = $request->DataNascimento;
        $medic->RG = $request->RG;
        $medic->CPF = $request->CPF;
        $medic->Endereco = $request->Endereco;
        $medic->Telefone = $request->Telefone;
        $medic->Email = $request->Email;
        $medic->Datacadastro = $request->Datacadastro;
        $medic->Especialidade = $request->Especialidade;
        $medic->medico_id = $request->medico_id;

        if($request->hasfile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension =  $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/fotomedico'), $imageName);
            $medic->image = $imageName;
        }

        $medic->save();
        return redirect('/listamedico')->with('msg', 'Médico cadastrado com sucesso.');

    }

    /**
     * Display the specified resource.
     */

    
    public function show($id)
    {
        $medico = Medico::find($id);

        if (!$medico) {
            return abort(404); 
    }

        return view('crudmedico.mostramedico', compact('medico'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {      
        $medico = Medico::where('id', $id)->first();
        if (!$medico) {
            return redirect()->route('dashboard')->with('msg', 'Médico não encontrado.');
        }

        return view('crudmedico.editarmedico', compact('medico'));
    }

    public function buscarPorCPF(Request $request)
    {
        $cpf = $request->input('cpf');
        $medico = Medico::where('CPF', $cpf)->first();

        if (!$medico) {
            
            return redirect()->back()->with('msg', 'Médico não encontrado pelo CPF: ' . $cpf);
        }

    return view('crudmedico.editarmedico', compact('medico'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $medic = Medico::find($id);
        $medic->NomeCompleto = $request->NomeCompleto;
        $medic->DataNascimento = $request->DataNascimento;
        $medic->RG = $request->RG;
        $medic->CPF = $request->CPF;
        $medic->Endereco = $request->Endereco;
        $medic->Telefone = $request->Telefone;
        $medic->Email = $request->Email;
        $medic->Datacadastro = $request->Datacadastro;
        $medic->Especialidade = $request->Especialidade;

        if($request->hasfile('image') && $request->file('image')->isValid()){
            if ($medic->image) {
                Storage::delete('img/fotomedico/' . $medic->image);
            }

            $requestImage = $request->image;
            $extension =  $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/fotomedico'), $imageName);
            $medic->image = $imageName;
        }
        $medic->save();
        return redirect('/dashboard')->with('msg', 'Médico atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $medic = Medico::find($id);

        if (!$medic) {
            return redirect('/dashboard')->with('msg', 'Médico atualizado com sucesso.');
        }
        $medic->delete();
        return redirect('/dashboard')->with('msg', 'Médico excluido com sucesso.');
    }
   
    
}
