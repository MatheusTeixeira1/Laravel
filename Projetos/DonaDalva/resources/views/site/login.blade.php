@extends('site.layout')

@section('nomePagina', 'Login')

@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card">
                <div class="card-content">
                    <span class="card-title center-align">Login</span>
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">email</i>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <label for="email">E-mail</label>
                                @error('email')
                                    <span class="red-text text-darken-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">lock</i>
                                <input id="password" type="password" name="password" required autocomplete="current-password">
                                <label for="password">Senha</label>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col s12">
                                <label>
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span>Lembrar-me</span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col s12 center-align">
                                <button type="submit" class="btn waves-effect waves-light blue">
                                    Entrar
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div class="card-action center-align">
                    <a href="#">Esqueci minha senha</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inicializa os campos do formulário
        M.updateTextFields();
    });
</script>
@endsection