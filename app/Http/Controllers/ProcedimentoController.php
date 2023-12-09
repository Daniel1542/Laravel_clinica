<?php

namespace App\Http\Controllers;
use App\Models\Procedimento;
use Illuminate\Http\Request;
class ProcedimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $procedimentos = Procedimento::all();
        return view('dashboard', compact('procedimentos'));
    }
    public function mostra()
    {
        $procedimentos = Procedimento::all();
        return view('crudprocedimento.mostraprocedimento' , compact('procedimentos'));
    }
    public function lista()
    {
        $procedimentos = Procedimento::all();
        return view('crudprocedimento.listaprocedimento', compact('procedimentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crudprocedimento.criaprocedimento');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Codigo' => 'required|string|max:10|unique:procedimento',
            'Descricao' => 'required|string',
            'Valor' => 'required|numeric',
            'Observacoes' => 'required|string',
            
        ]);
        $procedimento = new Procedimento;
        $procedimento->Codigo = $request->Codigo;
        $procedimento->Descricao = $request->Descricao;
        $procedimento->Valor = $request->Valor;
        $procedimento->Observacoes = $request->Observacoes;

        $procedimento->save();
        return redirect('/listaprocedimento')->with('msg', 'Procedimento cadastrado com sucesso.');

    }

    /**
     * Display the specified resource.
     */

    
    public function show($id)
    {
        $procedimentos = Procedimento::find($id);

        if (!$procedimentos) {
            return abort(404); 
    }

        return view('crudprocedimento.mostraprocedimento', compact('procedimentos'));
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
        $request->validate([
            'Codigo' => 'required|string|max:10',
            'Descricao' => 'required|string',
            'Valor' => 'required|numeric',
            'Observacoes' => 'required|string',
            
        ]);
        
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

        $procedimento = Procedimento::find($id);

        if (!$procedimento) {
            return redirect('/dashboard')->with('msg', 'Procedimento não encontrado.');
        }
        $procedimento->delete();
        return redirect('/dashboard')->with('msg', 'Procedimento excluido com sucesso.');
    }

}
