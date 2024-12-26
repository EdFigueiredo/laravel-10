<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class SupportController extends Controller
{
    public function index(Support $support) // Aqui o laravel já cria o objeto do tipo Support e injeta na varivel $support
    {
        //$support = new Support(); // Sem eu precisar criar o objeto, o laravel já faz isso pra mim
        $supports = $support->all();
        //dd($supports);

        return view('admin.supports.index', compact('supports')); // aqui posso usar tanto o . quando / para separar os diretórios
    }

    public function create()
    {
        return view('admin/supports/create');
    }

    public function store(Request $request, Support $support)
    {
        //dd($request->all());
        //dd($request->body); // Aqui eu pego o valor do campo body
        //dd($request->only('subject','status', 'body'));
        //dd($request->get('xpto', 'default')); // Aqui eu pego o valor do campo xpto, se não existir, ele retorna o valor default
        $data = $request->all();
        $data['status'] = 'a';
        //Support::created($data); //Chama o model Support e chama o método create passando o array $data
        //$support = $support->create($data); // Aqui eu crio um objeto do tipo Support e chamo o método create passando o array $data
        //dd($support);
        $support->create($data);

        return redirect()->route('supports.index');
    }

    public function show(string | int $id)
    {
        //Support::where('id', $id)->first(); // Aqui eu chamo o model Support e chamo o método where passando o id e chamo o método first
        //Support::where('id', '!=' ,$id)->first(); // Quando náo passo nada conforme acima ele já coloca como igual
        if(!$support = Support::find($id))
        {
            return back();
        }
        return view('admin.supports.show', compact('support')); // compact('support') é a mesma coisa que ['support' => $support]

    }

    public function edit(Support $support, string | int $id)
    {
        if(!$support = $support->where('id', $id)->first())
        {
            return back();
        }
        return view('admin.supports.edit', compact('support'));
    }

    public function update(Request $request, Support $support, string | int $id)
    {
        if(!$support = $support->find($id))
        {
            return back();
        }

        //$support->subject = $request->subject; //posso faver dessa forma também passando direto o que quero editar
        //$support->body = $request->body;
        //$support->save(); // Aqui eu chamo o método save para salvar as alterações feitas acima, porém para muitos campos tem que fazer um a uma, por isso é melhor usar o método update
        $support->update($request->only(
            'subject',
            'body'
        ));

        return redirect()->route('supports.index');
    }

    public function destroy(Support $support, string | int $id)
    {
        if(!$support = $support->find($id))
        {
            return back();
        }
        $support->delete();
        return redirect()->route('supports.index');
    }

}
