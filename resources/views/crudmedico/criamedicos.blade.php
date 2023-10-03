@extends('layouts.maindashboard')
@section('title','medico')
@section('content')

<section class=secao_cria>
  <div>
    <h1 class="mt-4" id="cabeca">Cadastro de Médicos</h1>
  </div>
  <!-- Formulário de Cadastro -->
  <form action="{{ route('medicos.store') }}" method="POST" enctype="multipart/form-data">
    <div id="caixa2" class="form-group">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="title">Nome do Médico:</label>
        <input type="text" id="NomeCompleto" name="NomeCompleto" required>
      </div>
      <div class="form-group">
        <label for="DataNascimento">Data Nascimento:</label>
        <input type="date" id="DataNascimento" name="DataNascimento" required>
      </div>
      <div class="form-group"> 
        <label for="title">RG:</label>
        <input type="text" id="RG" name="RG" required>
      </div>
      <div class="form-group">
        <label for="title">CPF:</label>
        <input type="text" id="CPF" name="CPF" required>
      </div>
      <div class="form-group">
        <label for="title">Endereço: Rua, Número, Bairro, Cidade:</label>
        <input type="text" id="Endereco" name="Endereco" required>
      </div>
      <div class="form-group">
        <label for="title">Telefone</label>
        <input type="text" id="Telefone" name="Telefone" required>
      </div>
      <div class="form-group">
        <label for="title">Email</label>
        <input type="text" id="Email" name="Email" required>
      </div>
      <div class="form-group">
        <label for="Datacadastro">Data de cadastro</label>
        <input type="date" id="Datacadastro" name="Datacadastro" required>
      </div>
      <div class="form-group">
        <label for="title">Especialidade</label>
        <input type="text" id="Especialidade" name="Especialidade" required>
      </div>
      <div class="form-group">
        <label for="image">FOTO DO MÉDICO</label>
        <input type="file" id="image" name="image" class="from-control-file" required>
      </div>
      <div id="bota" class="form-group">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
      </div>
    </div>
  </form>
</section>
@endsection