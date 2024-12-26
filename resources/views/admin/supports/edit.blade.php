<h1>Dúvida {{ $support->id }}</h1>
<form action="{{ route('supports.update', $support->id) }}" method="POST">
    @csrf()
    {{-- <input type="hidden" name="_method" value="PUT">  Ao invés de fazer dessa forma o laravel me da uma opção otimizada--}}
    @method('PUT')
    <input type="text" name="subject" placeholder="Assunto" value='{{$support->subject}}'>
    <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{ $support->body }}</textarea>
    <button type="submit">Enviar</button>
</form>