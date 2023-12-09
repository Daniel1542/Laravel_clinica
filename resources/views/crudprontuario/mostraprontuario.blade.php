@extends('layouts.maindashboard')
@section('title', 'Detalhes do Prontuário')
@section('content')

<section class="secao_cria">
    <div>
        <h1 class="mt-4" id="cabeca">Detalhes do Prontuário</h1>
    </div>
    <!-- Exibição dos Detalhes do Prontuário -->
    <div id="caixa2" class="row mt-4">
        <div class="col-md-6">
            <label for="Codigo">Código:</label>
            <p>{{ $prontuarios->Codigo }}</p>
        </div>
        <div class="col-md-6">
            <label for="DataCadastro">DataCadastro:</label>
            <p>{{ $prontuarios->DataCadastro }}</p>
        </div>
        <div class="form-group"> 
          <label for="title">Código Paciente:</label>
          <p>{{ $prontuarios->CodPaciente }}</p>
        </div>
        <div class="form-group">
          <label for="title">Nome do paciente:</label>
          <p>{{ $prontuarios->Nome }}</p>
        </div>
        <div class="form-group">
          <label for="title">CPF:</label>
          <p>{{ $prontuarios->CPF }}</p>
        </div>
        <div class="form-group">
          <label for="title">Telefone:</label>
          <p>{{ $prontuarios->Telefone }}</p>
        </div>        
    </div>
</section>
@endsection
