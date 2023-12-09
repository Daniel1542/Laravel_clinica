<?php

namespace App\Http\Controllers;
use App\Models\Prontuario;
use App\Models\Paciente;
use Illuminate\Http\Request;

class ProntuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prontuarios = Prontuario::all();
        return view('dashboard', compact('prontuarios'));
    }
    public function mostra()
    {
        $prontuarios = Prontuario::all();
        return view('crudprontuario.mostraprontuario' , compact('prontuarios'));
    }
    public function lista()
    {
        $prontuarios = Prontuario::all();
        return view('crudprontuario.listaprontuario', compact('prontuarios'));
    }
   
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $paciente_id)
    {       
        $paciente = Paciente::find($paciente_id);

        // Se o paciente não existir, redirecione ou retorne uma resposta de erro
        if (!$paciente) {
            return redirect()->route('pagina_de_erro')->with('msg', 'Paciente não encontrado.');
        }    

        return view('crudprontuario.criaprontuario', compact('paciente'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Codigo' => 'required|string|max:10|unique:prontuarios',
            'DataCadastro' => 'required|date',
            'CodPaciente' => 'required|string|unique:prontuarios',
            'Nome' => 'required|string',
            'CPF' => 'required|digits:11|unique:prontuarios|numeric',
            'Telefone' => 'required|unique:prontuarios|numeric',
            'paciente_id' => 'required|exists:pacientes,id',   // Verifica se o paciente_id existe na tabela de pacientes
            
        ]);
        $prontuario = new Prontuario;
        $prontuario->Codigo = $request->Codigo;
        $prontuario->DataCadastro = $request->DataCadastro;
        $prontuario->CodPaciente = $request->CodPaciente;
        $prontuario->Nome = $request->Nome;
        $prontuario->CPF = $request->CPF;
        $prontuario->Telefone = $request->Telefone;
        $prontuario->paciente_id = $request->paciente_id; // Associa o prontuário ao paciente
      
        $prontuario->save();
        return redirect('/listaprontuario')->with('msg', 'Prontuario cadastrado com sucesso.');

    }

    /**
     * Display the specified resource.
     */
    
    public function show($id)
    {      
        $prontuarios = Prontuario::find($id);

        if (!$prontuarios) {
            return abort(404); 
    }
        return view('crudprontuario.mostraprontuario', compact('prontuarios'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {      
        $paciente = Paciente::where('id', $id)->first();

        if (!$paciente) {
            return redirect()->route('dashboard')->with('msg', 'prontuario não encontrado.');
        }
        
        return view('crudprontuario.editarprontuario', compact('paciente'));
    }

    public function buscarPorCodigo(Request $request)
    {
        $Codigo = $request->input('Codigo');
        $procedimentos = Procedimento::where('Codigo', $Codigo)->first();

        if (!$procedimentos) {
            
            return redirect()->back()->with('msg', 'procedimento não encontrado: ');
        }

    return view('crudprocedimento.editarprocedimento', compact('procedimentos'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Codigo' => 'required|string|max:10',
            'DataCadastro' => 'required|date',
            'CodPaciente' => 'required|string',
            'Nome' => 'required|string',
            'CPF' => 'required|digits:11|numeric',
            'Telefone' => 'required|numeric',        
        ]);

        $prontuario = Prontuario::where('paciente_id', $id)->first();

        if (!$prontuario) {
            return redirect('/dashboard')->with('error', 'Prontuário não encontrado para o paciente com ID: ' . $id);
        }
    
        $prontuario->Codigo = $request->Codigo;
        $prontuario->DataCadastro = $request->DataCadastro;
        $prontuario->CodPaciente = $request->CodPaciente;
        $prontuario->Nome = $request->Nome;
        $prontuario->CPF = $request->CPF;
        $prontuario->Telefone = $request->Telefone;
      

        $prontuario->save();
        return redirect('/dashboard')->with('msg', 'Prontuario atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $prontuario = Prontuario::find($id);

        if (!$prontuario) {
            return redirect('/dashboard')->with('msg', 'Prontuario não encontrado.');
        }
        $prontuario->delete();
        return redirect('/dashboard')->with('msg', 'Prontuario excluido com sucesso.');
    }
}
