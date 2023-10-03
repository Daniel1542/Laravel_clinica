@extends('layouts.maindashboard')
@section('title', 'Detalhes do Médico')
@section('content')

<section class="secao_cria">
    <div>
        <h1 class="mt-4" id="cabeca">Detalhes do Médico</h1>
    </div>
    <!-- Exibição dos Detalhes do Médico -->
    <div id="caixa2" class="row mt-4">
        <div class="col-md-6">
            <label for="NomeCompleto">Nome do Médico:</label>
            <p>{{ $medico->NomeCompleto }}</p>
        </div>
        <div class="col-md-6">
            <label for="DataNascimento">Data de Nascimento:</label>
            <p>{{ $medico->DataNascimento }}</p>
        </div>
        <div class="col-md-6">
            <label for="RG">RG:</label>
            <p>{{ $medico->RG }}</p>
        </div>
        <div class="col-md-6">
            <label for="CPF">CPF:</label>
            <p>{{ $medico->CPF }}</p>
        </div>
        <div class="col-md-6">
            <label for="Endereco">Endereço:</label>
            <p>{{ $medico->Endereco }}</p>
        </div>
        <div class="col-md-6">
            <label for="Telefone">Telefone:</label>
            <p>{{ $medico->Telefone }}</p>
        </div>
        <div class="col-md-6">
            <label for="Email">Email:</label>
            <p>{{ $medico->Email }}</p>
        </div>
        <div class="col-md-6">
            <label for="Datacadastro">Data de Cadastro:</label>
            <p>{{ $medico->Datacadastro }}</p>
        </div>
        <div class="col-md-6">
            <label for="Especialidade">Especialidade:</label>
            <p>{{ $medico->Especialidade }}</p>
        </div>
        <div class="col-md-6">
            <label for="image">Foto do Médico:</label>
            <img class="imagem" src="{{ asset('img/fotomedico/' . $medico->image) }}" alt="Foto do Médico" class="img-fluid">
        </div>
    </div>
</section>
@endsection
