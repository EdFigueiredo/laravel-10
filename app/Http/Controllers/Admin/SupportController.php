<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class SupportController extends Controller
{

    public function __construct(protected SupportService $service)
    {
        
    }
    
    public function index(Request $request) // Aqui o laravel já cria o objeto do tipo Support e injeta na varivel $support
    {
        //$support = new Support(); // Sem eu precisar criar o objeto, o laravel já faz isso pra mim
        $supports = $this->service->getAll($request->filter); // Aqui eu chamo o método getAll do service e passo o filtro que eu quero
        //dd($supports);

        return view('admin.supports.index', compact('supports')); // aqui posso usar tanto o . quando / para separar os diretórios
    }

    public function create()
    {
        return view('admin/supports/create');
    }

    public function store(StoreUpdateSupport $request, Support $support)
    {

        $this->service->new(CreateSupportDTO::makeFromRequest($request)
);
        //dd($request->all());
        //dd($request->body); // Aqui eu pego o valor do campo body
        //dd($request->only('subject','status', 'body'));
        //dd($request->get('xpto', 'default')); // Aqui eu pego o valor do campo xpto, se não existir, ele retorna o valor default
        //$data = $request->all();
        $data = $request->validated(); // Aqui eu valido os campos conforme as regras que eu defini no arquivo StoreUpdateSupport.php
        $data['status'] = 'a';
        //Support::created($data); //Chama o model Support e chama o método create passando o array $data
        //$support = $support->create($data); // Aqui eu crio um objeto do tipo Support e chamo o método create passando o array $data
        //dd($support);
        //$support->create($data);
        return redirect()->route('supports.index');
    }

    public function show(string | int $id)
    {
        //Support::where('id', $id)->first(); // Aqui eu chamo o model Support e chamo o método where passando o id e chamo o método first
        //Support::where('id', '!=' ,$id)->first(); // Quando náo passo nada conforme acima ele já coloca como igual
        //if(!$support = Support::find($id)) // antes com mvc
        if(!$support = $this->service->findOne($id)) // agora com restful
        {
            return back();
        }
        return view('admin.supports.show', compact('support')); // compact('support') é a mesma coisa que ['support' => $support]

    }

    public function edit(string $id)
    {
        //if(!$support = $support->where('id', $id)->first())
        if(!$support = $this->service->findOne($id))
        {
            return back();
        }
        return view('admin.supports.edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request, Support $support, string | int $id)
    {
        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request));

        if(!$support)
        {
            return back();
        }

        //$support->subject = $request->subject; //posso faver dessa forma também passando direto o que quero editar
        //$support->body = $request->body;
        //$support->save(); // Aqui eu chamo o método save para salvar as alterações feitas acima, porém para muitos campos tem que fazer um a uma, por isso é melhor usar o método update
        
        // $support->update($request->only( //usar o only ou validate para validar os campos
        //     'subject',
        //     'body'
        // ));

        return redirect()->route('supports.index');
    }

    public function destroy(string $id)
    {
        //if(!$support = $support->find($id))
        // if(!$support = )
        // {
        //     return back();
        // }
        $this->service->delete($id);
        return redirect()->route('supports.index');
    }

}
