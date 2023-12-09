@extends('layouts.maindashboard')
@section('title','Prontuário')
@section('content')

<section class=secao_cria>
  <div>
    <h1 class="mt-4" id="cabeca">Cadastro de Prontuário</h1>
  </div>
  <!-- Formulário de Cadastro -->
  <form action="{{ route('prontuarios.store') }}" method="POST">
    <div id="caixa2" class="form-group">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="title">Código:</label>
        <input type="text" id="Codigo" name="Codigo" required>
      </div>
      <div class="form-group">
        <label for="title">Data de Cadastro:</label>
        <input type="date" id="DataCadastro" name="DataCadastro" required>
      </div>
      <div class="form-group"> 
        <label for="title">Código Paciente:</label>
        <input type="text" id="CodPaciente" name="CodPaciente" required>
      </div>
      <div class="form-group">
        <label for="title">Nome do paciente:</label>
        <input type="text" id="Nome" name="Nome" required>
      </div>
      <div class="form-group">
        <label for="title">CPF:</label>
        <input type="text" id="CPF" name="CPF" required>
      </div>
      <div class="form-group">
        <label for="title">Telefone:</label>
        <input type="text" id="Telefone" name="Telefone" required>
      </div>
      <div id="bota" class="form-group">
        <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
      </div>
    </div>
  </form>
</section>

@endsection