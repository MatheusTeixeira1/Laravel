<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('nomePagina')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
        main {
            flex: 1 0 auto;
        }
        .auth-card {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    @if(!request()->is('login'))
    <nav>
        <div class="nav-wrapper">
            <form action="{{ route('logout') }}" class="right" method="POST" style="display: inline;">
                @csrf
                <button type="submit">Sair</button>
            </form>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="{{ route('site.home') }}">Home</a></li>
                @auth
                <li>
                    {{-- <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-flat white-text">Sair</button>
                    </form> --}}
                </li>
                @endauth
            </ul>
        </div>
    </nav>
    @endif

    <main>
        @yield('conteudo')
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    @stack('scripts')
</body>
</html>