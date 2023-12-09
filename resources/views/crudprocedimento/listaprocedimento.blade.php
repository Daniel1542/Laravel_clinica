@extends('layouts.maindashboard')
@section('title', 'Lista de procedimentos')
@section('content')

<section class="secao_cria">
  <div class="container" id="caixa4">
    <h1 class="mt-4">Buscar procedimento por codigo</h1>
    <div class="container mb-4">
      <form action="{{ route('procedimentos.buscarPorCodigo') }}" method="GET">
        {{ csrf_field() }}
        <label for="Codigo">Codigo do procedimento:</label>
        <input type="text" id="Codigo" name="Codigo" required>
        <button type="submit">Buscar</button>
      </form>
    </div>
  </div>
  <div class="container">
      <h1 class="mt-4" id="cabeca">Lista de procedimentos</h1>
  </div>
  <div class="container mb-4">
      <a href="{{ route('procedimentos.create') }}" class="btn btn-primary">Adicionar procedimento</a>
  </div>
  <!-- Tabela para listar os procedimentos -->
  <div class="container">
    <table class="table" id="caixa2">
      <tbody class="table_body">
        @foreach($procedimentos as $procedimento)
          <tr id="caixa3">            
            <td>Codigo: {{ $procedimento->Codigo }}</td>
            <td>Descrição: {{ $procedimento->Descricao }}</td>
            <td>Valor: {{ $procedimento->Valor }}</td>
            <td>Observações: {{ $procedimento->Observacoes }}</td>
            <td>
              <form action="{{ route('procedimentos.show', ['id' => $procedimento->id]) }}" method="GET" style="display: inline;">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Ver Detalhes</button>
              </form>
              <form action="{{ route('procedimentos.edit', ['id' => $procedimento->id]) }}" method="GET" style="display: inline;">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Editar</button>
              </form>
              <form action="{{ route('procedimentos.destroy', ['id' => $procedimento->id]) }}" method="POST" style="display: inline;">
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
