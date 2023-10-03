@extends('layouts.maindashboard')
@section('title', 'Detalhes do paciente')
@section('content')

<section class="secao_cria">
    <div>
        <h1 class="mt-4" id="cabeca">Detalhes do paciente</h1>
    </div>
    <!-- Exibição dos Detalhes do Médico -->
    <div id="caixa2" class="row mt-4">
        <div class="col-md-6">
            <label for="NomeCompleto">Nome do paciente:</label>
            <p>{{ $pacientes->NomeCompleto }}</p>
        </div>
        <div class="col-md-6">
            <label for="DataNascimento">Data de Nascimento:</label>
            <p>{{ $pacientes->DataNascimento }}</p>
        </div>
        <div class="col-md-6">
            <label for="RG">RG:</label>
            <p>{{ $pacientes->RG }}</p>
        </div>
        <div class="col-md-6">
            <label for="CPF">CPF:</label>
            <p>{{ $pacientes->CPF }}</p>
        </div>
        <div class="col-md-6">
            <label for="Endereco">Endereço:</label>
            <p>{{ $pacientes->Endereco }}</p>
        </div>
        <div class="col-md-6">
            <label for="Telefone">Telefone:</label>
            <p>{{ $pacientes->Telefone }}</p>
        </div>
        <div class="col-md-6">
            <label for="Email">Email:</label>
            <p>{{ $pacientes->Email }}</p>
        </div>
        <div class="col-md-6">
            <label for="Datacadastro">Data de Cadastro:</label>
            <p>{{ $pacientes->Datacadastro }}</p>
        </div>
        <div class="col-md-6">
            <label for="Historico">Historico:</label>
            <p>{{ $pacientes->Historico }}</p>
        </div>
        <div class="col-md-6">
            <label for="image">Foto do paciente:</label>
            <img class="imagem" src="{{ asset('img/fotopaciente/' . $pacientes->image) }}" alt="Foto do paciente" class="img-fluid">
        </div>
        <div class="col-md-6">
            <label for="Informacoes">Informações:</label>
            <p>{{ $pacientes->Informacoes }}</p>
        </div>   
    </div>
</section>
@endsection
