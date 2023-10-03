@extends('layouts.maindashboard')
@section('title','Editar funcionario')
@section('content')
<section class=secao_cria>
  <div>
    <h1 class="mt-4" id="cabeca">Editar funcionario</h1>
  </div>
  <!-- Formulário de Cadastro -->
  <form action="{{ route('funcionarios.update', $funcionario->id) }}" method="POST" enctype="multipart/form-data">
    <div id="caixa2" class="form-group">
      {{ csrf_field() }}
      @method('PUT')
      <div class="form-group">
        <label for="title">Nome do funcionario:</label>
        <input type="text" id="NomeCompleto" name="NomeCompleto" value="{{ $funcionario->NomeCompleto }}" required>
      </div>
      <div class="form-group">
        <label for="title">Data Nascimento:</label>
        <input type="date" id="DataNascimento" name="DataNascimento" value="{{ $funcionario->DataNascimento }}" required>
      </div>
      <div class="form-group"> 
        <label for="title">RG:</label>
        <input type="text" id="RG" name="RG" value="{{ $funcionario->RG }}" required>
      </div>
      <div class="form-group">
        <label for="title">CPF:</label>
        <input type="text" id="CPF" name="CPF" value="{{ $funcionario->CPF }}" required>
      </div>
      <div class="form-group">
        <label for="title">Endereço: Rua, Número, Bairro, Cidade:</label>
        <input type="text" id="Endereco" name="Endereco" value="{{ $funcionario->Endereco }}" required>
      </div>
      <div class="form-group">
        <label for="title">Telefone</label>
        <input type="text" id="Telefone" name="Telefone" value="{{ $funcionario->Telefone }}" required>
      </div>
      <div class="form-group">
        <label for="title">Email</label>
        <input type="text" id="Email" name="Email" value="{{ $funcionario->Email }}" required>
      </div>
      <div class="form-group">
        <label for="title">Data de Admissão</label>
        <input type="text" id="Email" name="Email" value="{{ $funcionario->DataAdmisssao }}" required>
      </div>
      <div class="form-group">
        <label for="title">Data de Demissão</label>
        <input type="text" id="Email" name="Email" value="{{ $funcionario->DataDemissao }}">
      </div>
      <div class="form-group">
        <label for="title">Cargo</label>
        <input type="text" id="Email" name="Email" value="{{ $funcionario->Cargo }}" required>
      </div>  
      <div class="form-group">
        <label for="image">FOTO do Funcionario</label>
        <img class="imagem" src="{{ asset('img/fotofuncionario/' . $funcionario->image) }}" alt="Foto do funcionario">
        <input type="file" id="image" name="image" class="from-control-file">
      </div>
      <div id="bota" class="form-group">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
      </div>
    </div>
  </form>
</section>
@endsection