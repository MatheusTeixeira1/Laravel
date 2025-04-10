<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('nomePagina')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
</head>
<body>
    <ul id="dropdown1" class="dropdown-content">
        @foreach ($categoriasGlobal as $categoriaGlo)
            <li><a href="{{ route('site.categoria', $categoriaGlo->id) }}">{{ $categoriaGlo->nome }}</a></li>
        @endforeach

    </ul>
    <nav>
        <div class="nav-wrapper">
          <a href="#" class="brand-logo right">Logo</a>
          <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a href="{{ route('site.index') }}">Home</a></li>
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Categorias<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a href="">Carrinho</a></li>
          </ul>
        </div>
      </nav>

    @yield('conteudo')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var dropdowns = document.querySelectorAll('.dropdown-trigger');
        M.Dropdown.init(dropdowns, {
            coverTrigger: false, // Opção para não cobrir o trigger
            constrainWidth: false // Opção para não limitar a largura
        });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>