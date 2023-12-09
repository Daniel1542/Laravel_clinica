@extends('layouts.maindashboard')
@section('title','Dashboard')
@section('content')
<section class="secao_dash">
  <div class="col-md-6">
    <h1 class="mt-4" id="cabeca">Dashboard</h1>
  </div>
  <article class="article_geral">
    <div class="row" id="caixa2">
      <div class="col-md-6" id="organiza">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Quantidade de Médicos Cadastrados</h5>        
            <p>Quantidade de Médicos Cadastrados: {{ $medicos }}</p>          
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Quantidade de Médicos Cadastrados</h5>
            <p>Quantidade de pacientes Cadastrados: {{ $pacientes }}</p>         
          </div>
        </div>                       
        <div class="card">
          <div class="card-body">                 
            <h5 class="card-title">Data Atual</h5> 
            <p>Data: {{ $dataAtual }}</p>
          </div>
        </div>
      </div>        
    </div>
  </article> 
</section>

@endsection