@if ($mensagem = Session::get('erro'))
    <div>{{ $mensagem }}</div>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
@endif

<form action="{{ route('register.store') }}" method="POST">
    @csrf

    Nome: <br>
    <input type="text" name="name" value="{{ old('name') }}"> <br>

    Email: <br>
    <input type="email" name="email" value="{{ old('email') }}"> <br>

    Senha: <br>
    <input type="password" name="password"> <br>

    Confirmar Senha: <br>
    <input type="password" name="password_confirmation"> <br>

    <button type="submit">Registrar</button>
</form>

<p>Já tem uma conta? <a href="{{ route('login.form') }}">Faça login</a></p>
