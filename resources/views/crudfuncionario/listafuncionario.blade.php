@extends('layouts.maindashboard')
@section('title', 'Lista de funcionarios')
@section('content')

<section class="secao_cria">
  <div class="container" id="caixa4">
    <h1 class="mt-4">Buscar funcionario por cpf</h1>
    <div class="container mb-4">
      <form action="{{ route('funcionarios.buscarPorCPF') }}" method="GET">
        {{ csrf_field() }}
        <label for="cpf">cpf do funcionario:</label>
        <input type="text" id="cpf" name="cpf" required>
        <button type="submit">Buscar</button>
      </form>
    </div>
  </div>
  <div class="container">
      <h1 class="mt-4" id="cabeca">Lista de funcionarios</h1>
  </div>
  <div class="container mb-4">
      <a href="{{ route('funcionarios.create') }}" class="btn btn-primary">Adicionar funcionario</a>
  </div>
  <!-- Tabela para listar os funcionarios -->
  <div class="container">
    <table class="table" id="caixa2">
      <tbody class="table_body">
        @foreach($funcionario as $funcionarios)
          <tr id="caixa3">            
            <td>Nome: {{ $funcionarios->NomeCompleto }}</td>
            <td>Data de Nascimento: {{ $funcionarios->DataNascimento }}</td>
            <td>CPF: {{ $funcionarios->CPF }}</td>
            <td>Telefone: {{ $funcionarios->Telefone }}</td>
            <td>Email: {{ $funcionarios->Email }}</td>
            <td>
              <form action="{{ route('funcionarios.show', ['id' => $funcionarios->id]) }}" method="GET" style="display: inline;">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Ver Detalhes</button>
              </form>
              <form action="{{ route('funcionarios.edit', ['id' => $funcionarios->id]) }}" method="GET" style="display: inline;">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Editar</button>
              </form>
              <form action="{{ route('funcionarios.destroy', ['id' => $funcionarios->id]) }}" method="POST" style="display: inline;">
                {{ csrf_field() }}
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>
@endsection
