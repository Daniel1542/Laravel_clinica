@extends('layouts.maindashboard')
@section('title', 'Detalhes do funcionario')
@section('content')

<section class="secao_cria">
    <div>
        <h1 class="mt-4" id="cabeca">Detalhes do funcionario</h1>
    </div>
    <!-- Exibição dos Detalhes do funcionario -->
    <div id="caixa2" class="row mt-4">     
        <div class="col-md-6">
            <label for="NomeCompleto">Nome do funcionario: {{ $funcionario->NomeCompleto }}</label>
            <p></p>
        </div>
        <div class="col-md-6">
            <label for="DataNascimento">Data de Nascimento:</label>
            <p>{{ $funcionario->DataNascimento }}</p>
        </div>
        <div class="col-md-6">
            <label for="RG">RG:</label>
            <p>{{ $funcionario->RG }}</p>
        </div>
        <div class="col-md-6">
            <label for="CPF">CPF:</label>
            <p>{{ $funcionario->CPF }}</p>
        </div>
        <div class="col-md-6">
            <label for="Endereco">Endereço:</label>
            <p>{{ $funcionario->Endereco }}</p>
        </div>
        <div class="col-md-6">
            <label for="Telefone">Telefone:</label>
            <p>{{ $funcionario->Telefone }}</p>
        </div>
        <div class="col-md-6">
            <label for="Email">Email:</label>
            <p>{{ $funcionario->Email }}</p>
        </div>
        <div class="form-group">
            <label for="DataAdmisssao">Data de Admissão</label>
            <p>{{ $funcionario->DataAdmisssao }}</p>
        </div>
        <div class="form-group">
            <label for="DataDemissao">Data de Demissão</label>
            <p>{{ $funcionario->DataDemissao }}</p>
        </div>
        <div class="form-group">
            <label for="Cargo">Cargo</label>
            <p>{{ $funcionario->Cargo }}</p>
        </div>  
        <div class="form-group">
            <label for="image">FOTO do Funcionario</label>
            <img class="imagem" src="{{ asset('img/fotofuncionario/' . $funcionario->image) }}" alt="Foto do funcionario" class="img-fluid">
        </div>
    </div>
</section>
@endsection
