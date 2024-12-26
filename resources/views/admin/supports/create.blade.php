<h1>Nova Dúvida</h1>

@if($errors->any())
@foreach($errors->all() as $error)
    <p>{{ $error }}</p>
@endforeach
@endif

<form action="{{ route('supports.store') }}" method="POST">
    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
    @csrf()
    <input type="text" name="subject" placeholder="Assunto" value="old('subject')">
    <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{ old('body'); }}</textarea>
    <button type="submit">Enviar</button>
</form>
<a href="{{ route('supports.index') }}">Voltar</a><br><br>