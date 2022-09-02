<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {

        //realizar a validação dos dados do formulário recebidos no request

        $regras = [
                            'nome' => 'required|min:3|max:40|unique:site_contatos',
                'telefone' => 'required',
                'email' => 'email',
                'motivo_contatos_id' => 'required',
                'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
            'min' => 'O Campo :attribute precisa ter o mínimo de 3 caracteres',
            'max' => 'O Campo :attribute ultrapassou o máximo de caracteres permitido',
            'unique' => 'Nome já cadastrado no nosso sistema',
            'email' => 'Campo email inválido',
        ];
        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
