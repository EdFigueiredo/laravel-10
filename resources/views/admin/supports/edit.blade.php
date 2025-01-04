<h1>Dúvida {{ $support->id }}</h1>

@if($errors->any())
@foreach($errors->all() as $error)
    <p> {{ $error }}</p>
@endforeach
@endif

<form action="{{ route('supports.update', $support->id) }}" method="POST">
    {{-- <input type="hidden" name="_method" value="PUT">  Ao invés de fazer dessa forma o laravel me da uma opção otimizada--}}
    @method('PUT')
    @include('admin.supports.partials.form', ['support' => $support])

</form>

<a href="{{ route('supports.index') }}">Voltar</a><br><br>