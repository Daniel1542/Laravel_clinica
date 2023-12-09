@extends('layouts.maindashboard')
@section('title','Editar paciente')
@section('content')
<section class=secao_cria>
  <div>
    <h1 class="mt-4" id="cabeca">Editar paciente</h1>
  </div>
  <!-- Formulário de Cadastro -->
  <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST" enctype="multipart/form-data">
    <div id="caixa2" class="form-group">
      {{ csrf_field() }}
      @method('PUT')
      <div class="form-group">
        <label for="title">Nome do paciente:</label>
        <input type="text" id="NomeCompleto" name="NomeCompleto" value="{{ $paciente->NomeCompleto }}" required>
      </div>
      <div class="form-group">
        <label for="title">Data Nascimento:</label>
        <input type="date" id="DataNascimento" name="DataNascimento" value="{{ $paciente->DataNascimento }}" required>
      </div>
      <div class="form-group"> 
        <label for="title">RG:</label>
        <input type="text" id="RG" name="RG" value="{{ $paciente->RG }}" required>
      </div>
      <div class="form-group">
        <label for="title">CPF:</label>
        <input type="text" id="CPF" name="CPF" value="{{ $paciente->CPF }}" required>
      </div>
      <div class="form-group">
        <label for="title">Endereço: Rua, Número, Bairro, Cidade:</label>
        <input type="text" id="Endereco" name="Endereco" value="{{ $paciente->Endereco }}" required>
      </div>
      <div class="form-group">
        <label for="title">Telefone</label>
        <input type="text" id="Telefone" name="Telefone" value="{{ $paciente->Telefone }}" required>
      </div>
      <div class="form-group">
        <label for="title">Email</label>
        <input type="text" id="Email" name="Email" value="{{ $paciente->Email }}" required>
      </div>
      <div class="form-group">
        <label for="title">Data de cadastro</label>
        <input type="date" id="Datacadastro" name="Datacadastro" value="{{ $paciente->Datacadastro }}" required>
      </div>
      <div class="form-group">
        <label for="title">Historico</label>
        <input type="text" id="Historico" name="Historico" value="{{ $paciente->Historico }}" required>
      </div>
      <div class="form-group">
        <label for="image">FOTO do paciente</label>
        <img class="imagem" src="{{ asset('img/fotopaciente/' . $paciente->image) }}" alt="Foto do paciente">
        <input type="file" id="image" name="image" class="from-control-file">
      </div>
      <div class="form-group">
        <label for="title">Informações</label>
        <input type="text" id="Informacoes" name="Informacoes" value="{{ $paciente->Informacoes }}" required>
      </div>
      <div id="bota" class="form-group">
        <button type="submit" class="btn btn-primary mr-2">Salvar Alterações</button>
      </div>
  </form>
</section>
@endsection