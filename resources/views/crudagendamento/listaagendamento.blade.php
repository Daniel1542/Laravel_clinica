@extends('layouts.maindashboard')
@section('title', 'Lista de agendamentos')
@section('content')

<section class="secao_cria">
  <div class="container" id="caixa4">
    <h1 class="mt-4">Buscar agendamento código</h1>
    <div class="container mb-4">
      <form action="{{ route('agendamentos.buscarPorCodigo') }}" method="GET">
        {{ csrf_field() }}
        <label for="Codigo">Codigo do agendamento:</label>
        <input type="text" id="Codigo" name="Codigo" required>
        <button type="submit">Buscar</button>
      </form>
    </div>
  </div>
  <div class="container">
      <h1 class="mt-4" id="cabeca">Lista de agendamento</h1>
  </div>
  <div class="container mb-4">
      <a href="{{ route('agendamentos.create') }}" class="btn btn-primary">Adicionar agendamento</a>
  </div>
  <!-- Tabela para listar os agendamento -->
  <div class="container">
    <table class="table" id="caixa2">
      <tbody class="table_body">
        @foreach($agendamentos as $agendamento)
          <tr id="caixa3">            
            <td>Codigo: {{ $agendamento->Codigo }}</td>
            <td>Descrição: {{ $agendamento->Descricao }}</td>
            <td>Valor: {{ $agendamento->Valor }}</td>
            <td>Observações: {{ $agendamento->Observacoes }}</td>
            <td>
              <form action="{{ route('agendamento.show', ['id' => $agendamento->id]) }}" method="GET" style="display: inline;">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Ver Detalhes</button>
              </form>
              <form action="{{ route('agendamento.edit', ['id' => $agendamento->id]) }}" method="GET" style="display: inline;">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Editar</button>
              </form>
              <form action="{{ route('agendamento.destroy', ['id' => $agendamento->id]) }}" method="POST" style="display: inline;">
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
