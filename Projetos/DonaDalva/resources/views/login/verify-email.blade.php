<h1>Verifique seu e-mail</h1>

<p>Enviamos um link de verificação para seu e-mail.</p>

@if (session('message'))
    <div>{{ session('message') }}</div>
@endif

<form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button type="submit">Reenviar e-mail de verificação</button>
</form>
