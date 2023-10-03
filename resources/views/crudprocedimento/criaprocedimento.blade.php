@extends('layouts.maindashboard')
@section('title','Procedimentos')
@section('content')

<section class=secao_cria>
  <div>
    <h1 class="mt-4" id="cabeca">Cadastro de Procedimentos</h1>
  </div>
  <!-- Formulário de Cadastro -->
  <form action="{{ route('procedimentos.store') }}" method="POST" enctype="multipart/form-data">
    <div id="caixa2" class="form-group">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="title">Código:</label>
        <input type="text" id="Codigo" name="Codigo" required>
      </div>
      <div class="form-group">
        <label for="title">Descrição:</label>
        <input type="text" id="Descricao" name="Descricao" required>
      </div>
      <div class="form-group"> 
        <label for="title">Valor:</label>
        <input type="text" id="Valor" name="Valor" required>
      </div>
      <div class="form-group">
        <label for="title">Observações gerais:</label>
        <input type="text" id="Observacoes" name="Observacoes" required>
      </div>
      <div id="bota" class="form-group">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
      </div>
    </div>
  </form>
</section>

@endsection