@extends('layouts.maindashboard')
@section('title','Editar procedimento')
@section('content')

<section class=secao_cria>
  <div>
    <h1 class="mt-4" id="cabeca">Editar procedimento</h1>
  </div>
  <!-- Formulário de Cadastro -->
  <form action="{{ route('procedimentos.update', $procedimentos->id) }}" method="POST" enctype="multipart/form-data">
    <div id="caixa2" class="form-group">
      {{ csrf_field() }}
      @method('PUT')
      <div class="form-group">
        <label for="title">Código:</label>
        <input type="text" id="Codigo" name="Codigo" value="{{ $procedimentos->Codigo }}" required>
      </div>
      <div class="form-group">
        <label for="title">Descrição:</label>
        <input type="text" id="Descricao" name="Descricao" value="{{ $procedimentos->Descricao }}" required>
      </div>
      <div class="form-group"> 
        <label for="title">Valor:</label>
        <input type="text" id="Valor" name="Valor" value="{{ $procedimentos->Valor }}" required>
      </div>
      <div class="form-group">
        <label for="title">Observações gerais:</label>
        <input type="text" id="Observacoes" name="Observacoes" value="{{ $procedimentos->Observacoes }}" required>
      </div>
      <div id="bota" class="form-group">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
      </div>
    </div>
  </form>
</section>
@endsection