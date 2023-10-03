@extends('layouts.maindashboard')
@section('title', 'Detalhes do procedimento')
@section('content')

<section class="secao_cria">
    <div>
        <h1 class="mt-4" id="cabeca">Detalhes do procedimento</h1>
    </div>
    <!-- Exibição dos Detalhes do procedimento -->
    <div id="caixa2" class="row mt-4">
        <div class="col-md-6">
            <label for="Codigo">Código:</label>
            <p>{{ $procedimentos->Codigo }}</p>
        </div>
        <div class="col-md-6">
            <label for="Descricao">Descrição:</label>
            <p>{{ $procedimentos->Descricao }}</p>
        </div>
        <div class="col-md-6">
            <label for="Valor">Valor:</label>
            <p>{{ $procedimentos->Valor }}</p>
        </div>
        <div class="col-md-6">
            <label for="Observacoes">Observações:</label>
            <p>{{ $procedimentos->Observacoes }}</p>
        </div>        
    </div>
</section>
@endsection
