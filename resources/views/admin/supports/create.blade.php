<h1>Nova Dúvida</h1>

@if($errors->any())
@foreach($errors->all() as $error)
    <p>{{ $error }}</p>
@endforeach
@endif

<form action="{{ route('supports.store') }}" method="POST">
    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
    @include('admin.supports.partials.form')
</form>
<a href="{{ route('supports.index') }}">Voltar</a><br><br>