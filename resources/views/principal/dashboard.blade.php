@extends('layouts.maindashboard')
@section('title','Dashboard')
@section('content')
<section class="secao_dash">
  <div class="col-md-6">
    <h1 class="mt-4" id="cabeca">Dashboard</h1>
  </div>
  <article class="article_geral">
    <div>
      <div class="row" id="caixa2">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Quantidade de Médicos Cadastrados</h5>
              @if(isset($quantidade))
                <p>Quantidade de Médicos Cadastrados: {{ $quantidade }}</p>
              @else        
                <p>Nenhum médico cadastrado.</p>
              @endif
            </div>
          </div>
          </div>
          <div class="col-md-6">                          
              <div class="card">
                <div class="card-body">                 
                  <h5 class="card-title">Data Atual</h5> 
                    {{-- <p>Data: {{ date('d/m/Y', strtotime(funcionarios->date)) }}</p>   --}}                              
                </div>
              </div>        
          </div>
      </div>
    </div>
  </article> 
</section>

@endsection