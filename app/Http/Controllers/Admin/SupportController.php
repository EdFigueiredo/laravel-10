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

    public function store(Request $request)
    {
        //dd('Estou aqui');
        //dd($request->all());
        dd($request->only('subject','status', 'body'));
    }
}
