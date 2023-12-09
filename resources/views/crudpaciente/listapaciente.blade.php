@extends('layouts.maindashboard')
@section('title', 'Lista de paciente')
@section('content')

<section class="secao_cria">
    <div class="container" id="caixa4">
      <h1 class="mt-4">Buscar paciente por cpf</h1>
      <div class="container mb-4">
        <form action="{{ route('pacientes.buscarPorCPF') }}" method="GET">
          {{ csrf_field() }}
          <label for="cpf">cpf do paciente:</label>
          <input type="text" id="cpf" name="cpf" required>
          <button type="submit">Buscar</button>
        </form>
      </div>
    </div>
    <div class="container">
        <h1 class="mt-4" id="cabeca">Lista de pacientes</h1>
    </div>
    <div class="container mb-4">
        <a href="{{ route('pacientes.create') }}" class="btn btn-primary">Adicionar paciente</a>
    </div>
    <!-- Tabela para listar os pacientes -->
    <div class="container">
      <table class="table" id="caixa2">
        <tbody>
            @foreach($paciente as $pacientes)
              <tr id="caixa3">
                  <td>Nome do paciente:{{ $pacientes->NomeCompleto }}</td>
                  <td>Data de Nascimento do paciente: {{ $pacientes->DataNascimento }}</td>
                  <td>CPF do paciente: {{ $pacientes->CPF }}</td>
                  <td>Telefone do paciente: {{ $pacientes->Telefone }}</td>
                  <td>Email do paciente: {{ $pacientes->Email }}</td>
                  <td id="bota">
                    <form action="{{ route('pacientes.show', ['id' => $pacientes->id]) }}" method="GET" style="display: inline;">
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-primary">Ver Detalhes</button>
                    </form>
                    <form action="{{ route('pacientes.edit', ['id' => $pacientes->id]) }}" method="GET" style="display: inline;">
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-primary">Editar</button>
                    </form>
                    <form action="{{ route('pacientes.destroy', ['id' => $pacientes->id]) }}" method="POST" style="display: inline;">
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
