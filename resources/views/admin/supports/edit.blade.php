<h1>Dúvida {{ $support->id }}</h1>

{{--  como nao estou passando nada dentro da classe posso ja fechar a tag --}}
<x-alter/>
<form action="{{ route('supports.update', $support->id) }}" method="POST">
    {{-- <input type="hidden" name="_method" value="PUT">  Ao invés de fazer dessa forma o laravel me da uma opção otimizada--}}
    @method('PUT')
    @include('admin.supports.partials.form', ['support' => $support])

</form>

<a href="{{ route('supports.index') }}">Voltar</a><br><br>