<h1>listagem dos suportes</h1>
<a href="{{ route('supports.create') }}">Criar Dúvida</a>
<table>
    <thead>
        <th>assunto</th>
        <th>status</th>
        <th>descrição</th>
        <th>ações</th>
    </thead>
    <tbody>
        @foreach($supports->items() as $support)
            <tr>
                {{-- <td> {{ $support->subject }} </td> //Aqui chama como objeto e devemos chamar como array --}}
                <td> {{ $support->subject }} </td>
                <td> {{ $support->status }} </td>
                <td> {{ $support->body }} </td>
                <td> 
                    <a href="{{ route('supports.show', $support->id) }}">Ir</a>
                </td>
                <td>
                    <a href="{{ route('supports.edit', $support->id) }}">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<x-pagination 
:paginator="$supports" :appends="$filters" />
