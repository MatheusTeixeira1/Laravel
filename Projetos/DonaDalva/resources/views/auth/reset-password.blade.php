<h1>Redefinir senha</h1>

<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ request()->route('token') }}">
    <input type="email" name="email" value="{{ old('email') }}" required><br><br>
    <input type="password" name="password" placeholder="Nova senha" required><br><br>
    <input type="password" name="password_confirmation" placeholder="Confirmar nova senha" required><br><br>
    <button type="submit">Salvar nova senha</button>
</form>
