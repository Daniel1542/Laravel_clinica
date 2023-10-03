@extends('layouts.main')
@section('title','Login')
@section('content')

<section class=secao_cria>
  <div>
    <h1 class="mt-4" id="cabeca">Login</h1>
  </div>
  <form action="/auth" method="POST">
    <div id="caixa" class="form-group">
      {{ csrf_field() }}
      <div class="form-group">
        <label>Usuário:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label>Senha:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <a href="/cadastro">Cadastre-se</a>
      </div>
      <div class="form-group">
        <input type="submit" id="botao" class="btn btn-danger btn-sm" value="Logar">
      </div>
    </div>
  </form>
</section> 


@endsection
