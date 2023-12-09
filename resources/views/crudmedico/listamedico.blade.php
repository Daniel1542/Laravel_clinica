@extends('layouts.maindashboard')
@section('title', 'Lista de Médicos')
@section('content')

<section class="secao_cria">
  <div class="container" id="caixa4">
    <h1 class="mt-4">Buscar Médico por cpf</h1>
    <div class="container mb-4">
      <form action="{{ route('medicos.buscarPorCPF') }}" method="GET">
        {{ csrf_field() }}
        <label for="cpf">cpf do Médico:</label>
        <input type="text" id="cpf" name="cpf" required>
        <button type="submit">Buscar</button>
      </form>
    </div>
  </div>
  <div class="container">
      <h1 class="mt-4" id="cabeca">Lista de Médicos</h1>
  </div>
  <div class="container mb-4">
      <a href="{{ route('medicos.create') }}" class="btn btn-primary">Adicionar Médico</a>
  </div>
  <!-- Tabela para listar os médicos -->
  <div class="container">
    <table class="table" id="caixa2">
      <tbody class="table_body">        
        @foreach($medicos as $medico)
          <tr id="caixa3">
              <td>Nome do Médico: {{ $medico->NomeCompleto }}</td>
              <td>Data de Nascimento do Médico: {{ $medico->DataNascimento }}</td>
              <td>CPF do Médico: {{ $medico->CPF }}</td>
              <td>Telefone do Médico: {{ $medico->Telefone }}</td>
              <td>Especialidade do Médico: {{ $medico->Especialidade }}</td>
              <td >
                <form action="{{ route('medicos.show', ['id' => $medico->id]) }}" method="GET" style="display: inline;">
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-primary">Ver Detalhes</button>
                </form>
                <form action="{{ route('medicos.edit', ['id' => $medico->id]) }}" method="GET" style="display: inline;">
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-primary">Editar</button>
                </form>
                <form action="{{ route('medicos.destroy', ['id' => $medico->id]) }}" method="POST" style="display: inline;">
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
