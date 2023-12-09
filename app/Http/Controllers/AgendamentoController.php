<?php

namespace App\Http\Controllers;
use App\Models\Agendamento;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendamentos = Agendamento::all();
        return view('dashboard', compact('agendamentos'));
    }
    public function mostra()
    {
        $agendamentos = Agendamento::all();
        return view('crudagendamento.mostraagendamentos' , compact('agendamentos'));
    }
    public function lista()
    {
        $agendamentos = Agendamento::all();
        return view('crudagendamento.listaagendamento', compact('agendamentos'));
    }

    public function updateRetorno($id)
    {
        $agendamentos = Agendamento::findOrFail($id);
        $agendamentos->is_retorno = !$agendamentos->is_retorno; // Inverte o valor do campo is_retorno
        $agendamentos->save();

        return response()->json(['success' => true, 'is_retorno' => $agendamentos->is_retorno]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $novoAgendamento  = new Agendamento();
        return view('crudagendamento.criaagendamento', compact('novoAgendamento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Codigo' => 'required|string|max:10|unique:agendamento',
            'data_hora_agendamento' => 'required|date',
            'tipo_consulta' => 'required|boolean',
            'retorno' => 'required|boolean',
            
        ]);
        $agendamento = new Agendamento;
        $agendamento->Codigo = $request->Codigo;
        $agendamento->data_hora_agendamento = $request->data_hora_agendamento;
        $agendamento->tipo_consulta = $request->tipo_consulta;
        $agendamento->retorno = $request->retorno;

        $agendamento->save();
        return redirect('/listaagendamento')->with('msg', 'Agendamento cadastrado com sucesso.');

    }

    /**
     * Display the specified resource.
     */

    
    public function show($id)
    {
        $agendamento = Agendamento::find($id);

        if (!$agendamentos) {
            return abort(404); 
    }

        return view('crudagendamento.criaagendamento', compact('agendamento'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {      
        $procedimentos = Procedimento::where('id', $id)->first();
        if (!$procedimentos) {
            return redirect()->route('dashboard')->with('msg', 'procedimento não encontrado.');
        }

        return view('crudprocedimento.editarprocedimento', compact('procedimentos'));
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
        $procedimento = Procedimento::find($id);
        $procedimento->Codigo = $request->Codigo;
        $procedimento->Descricao = $request->Descricao;
        $procedimento->Valor = $request->Valor;
        $procedimento->Observacoes = $request->Observacoes;

        $procedimento->save();
        return redirect('/dashboard')->with('msg', 'Procedimento atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $agendamentos = Agendamento::find($id);

        if (!$agendamentos) {
            return redirect('/dashboard')->with('msg', 'Agendamento não encontrado.');
        }
        $agendamentos->delete();
        return redirect('/dashboard')->with('msg', 'Agendamento excluido com sucesso.');
    }
}
