<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/app.css">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
  <title>@yield('title')</title>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Bootstrap JavaScript (jQuery e Popper.js) -->
  <script src="/js/app.js"></script>
</head>
<body class="corpo">
  <header>
    <div class="dropdown" id="dropdowntodo">
      <div class="dropdown-menu custom-dropdown-menu" id="dropdownmenu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item custom-dropdown-item" href="/dashboard">Dashboard</a>
        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          Médico
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ route('pacientes.create') }}">Cadastrar</a></li>
          <li><a class="dropdown-item" href="/listapaciente">Editar</a></li>
          <li><a class="dropdown-item" href="/listapaciente">Excluir</a></li>
        </ul>    
      </div>
    </div>
  </header>
  @if (session('msg'))
    <div class="alert alert-danger">
      {{ session('msg') }}
    </div>
  @endif
  @if ($errors->any())
  <div class="alert alert-danger mt-4">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif 
  @yield('content')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  
</body>
</html>