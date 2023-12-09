@extends('layouts.maindashboard')
@section('title', 'Lista de prontuário')
@section('content')

<section class="secao_cria">
  <div class="container" id="caixa4">
    <h1 class="mt-4">Buscar prontuário por codigo</h1>
    <div class="container mb-4">
      <form action="{{ route('prontuarios.buscarPorCodigo') }}" method="GET">
        {{ csrf_field() }}
        <label for="Codigo">Codigo do prontuário:</label>
        <input type="text" id="Codigo" name="Codigo" required>
        <button type="submit">Buscar</button>
      </form>
    </div>
  </div>
  <div class="container">
      <h1 class="mt-4" id="cabeca">Lista de prontuário</h1>
  </div>
  <!-- Tabela para listar os prontuarios -->
  <div class="container">
    <table class="table" id="caixa2">
      <tbody class="table_body">
        @foreach($prontuarios as $prontuario)
          <tr id="caixa3">            
            <td>Codigo: {{ $prontuario->Codigo }}</td>
            <td>Data de Cadastro: {{ $prontuario->DataCadastro }}</td>
            <td>Código Paciente: {{ $prontuario->CodPaciente }}</td>
            <td>Telefone: {{ $prontuario->Telefone }}</td>
            <td >
              <form action="{{ route('prontuarios.show', ['id' => $prontuario->id]) }}" method="GET" style="display: inline;">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Ver Detalhes</button>
              </form>
              <form action="{{ route('prontuarios.edit', ['id' => $prontuario->id]) }}" method="GET" style="display: inline;">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Editar</button>
              </form>
              <form action="{{ route('prontuarios.destroy', ['id' => $prontuario->id]) }}" method="POST" style="display: inline;">
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
