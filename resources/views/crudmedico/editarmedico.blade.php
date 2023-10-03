@extends('layouts.maindashboard')
@section('title','Editar Medico')
@section('content')
<section class=secao_cria>
  <div>
    <h1 class="mt-4" id="cabeca">Editar Médico</h1>
  </div>
  <!-- Formulário de Cadastro -->
  <form action="{{ route('medicos.update', $medico->id) }}" method="POST" enctype="multipart/form-data">
    <div id="caixa2" class="form-group">
      {{ csrf_field() }}
      @method('PUT')
      <div class="form-group">
        <label for="title">Nome do Médico:</label>
        <input type="text" id="NomeCompleto" name="NomeCompleto" value="{{ $medico->NomeCompleto }}" required>
      </div>
      <div class="form-group">
        <label for="title">Data Nascimento:</label>
        <input type="date" id="DataNascimento" name="DataNascimento" value="{{ $medico->DataNascimento }}" required>
      </div>
      <div class="form-group"> 
        <label for="title">RG:</label>
        <input type="text" id="RG" name="RG" value="{{ $medico->RG }}" required>
      </div>
      <div class="form-group">
        <label for="title">CPF:</label>
        <input type="text" id="CPF" name="CPF" value="{{ $medico->CPF }}" required>
      </div>
      <div class="form-group">
        <label for="title">Endereço: Rua, Número, Bairro, Cidade:</label>
        <input type="text" id="Endereco" name="Endereco" value="{{ $medico->Endereco }}" required>
      </div>
      <div class="form-group">
        <label for="title">Telefone</label>
        <input type="text" id="Telefone" name="Telefone" value="{{ $medico->Telefone }}" required>
      </div>
      <div class="form-group">
        <label for="title">Email</label>
        <input type="text" id="Email" name="Email" value="{{ $medico->Email }}" required>
      </div>
      <div class="form-group">
        <label for="title">Data de cadastro</label>
        <input type="date" id="Datacadastro" name="Datacadastro" value="{{ $medico->Datacadastro }}" required>
      </div>
      <div class="form-group">
        <label for="title">Especialidade</label>
        <input type="text" id="Especialidade" name="Especialidade" value="{{ $medico->Especialidade }}" required>
      </div>
      <div class="form-group">
        <label for="image">FOTO DO MÉDICO</label>
        <img class="imagem" src="{{ asset('img/fotomedico/' . $medico->image) }}" alt="Foto do Médico">
        <input type="file" id="image" name="image" class="from-control-file">
      </div>
      <div id="bota" class="form-group">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
      </div>
    </div>
  </form>
</section>
@endsection