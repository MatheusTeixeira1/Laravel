<h1>Esqueci minha senha</h1>

@if (session('status'))
    <div>{{ session('status') }}</div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <label for="email">E-mail</label><br>
    <input type="email" name="email" required><br><br>
    <button type="submit">Enviar link de redefinição</button>
</form>
