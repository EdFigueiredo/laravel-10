<h1>Detalhes da dúvida {{ $support->id }}</h1>

<ul>
    <li>Assunto: {{ $support->subject }}</li>
    <li>Status: {{ $support->status }}</li>
    <li>Descricao: {{ $support->body }}</li>
</ul>
<a href="{{ route('supports.index') }}">Voltar</a><br><br>

<form action="{{ route('supports.destroy', $support->id) }}" method="POST">
    @csrf()
    @method('DELETE')
    <button type="submit">Deletar</button>
</form>