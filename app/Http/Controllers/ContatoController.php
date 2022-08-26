<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Http\Requests\SiteContatoRequest;

class ContatoController extends Controller
{
    public function contato(Request $request){

        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
        // $contato->save();

        // $contato = new SiteContato();
        // $contato->fill($request->all());
        // $contato->save();
        // print_r($contato->getAttributes());


        return view('site.contato');
    }

    public function salvar(SiteContatoRequest $request){
        SiteContato::create($request->all());
        
    }
}
