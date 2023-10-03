@extends('layouts.maindashboard')
@section('title','Agendamento')
@section('content')

<section class=secao_cria>
  <div>
    <h1 class="mt-4" id="cabeca">Cadastro de agendamento</h1>
  </div>
  <!-- Formulário de agendamento -->
  <form action="{{ route('agendamentos.store') }}" method="POST" enctype="multipart/form-data">
    <div id="caixa2" class="form-group">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="title">Código:</label>
        <input type="text" id="Codigo" name="Codigo" required>
      </div>
      <div class="form-group">
        <label for="title">Data do agendamento:</label>
        <input type="date" id="Data do agendamento" name="Data do agendamento" required>
      </div>
      <div class="form-group"> 
        <label for="title">Paciente:</label>
        <input type="text" id="paciente" name="paciente" required>
      </div>
      <div class="form-group">
        <label for="title">Médico:</label>
        <input type="text" id="medico" name="medico" required>
      </div>
      <div class="form-group">
        <label for="title">tipo de consulta:</label>
        <input type="text" id="medico" name="medico" required>
      </div>
     
      <div id="bota" class="form-group">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
      </div>
    </div>
  </form>
</section>
<script>
    $(document).ready(function () {
        $('input[type="checkbox"]').on('change', function () {
            var agendamentoId = $(this).data('id');

            $.ajax({
                type: 'PATCH',
                url: '/agendamentos/' + agendamentoId + '/retorno',
                success: function (response) {
                    if (response.success) {
                        // Atualiza o estado do checkbox
                        $('input[data-id="' + agendamentoId + '"]').prop('checked', response.is_retorno);
                    } else {
                        console.log('Erro ao atualizar o estado do retorno.');
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });
</script>

@endsection