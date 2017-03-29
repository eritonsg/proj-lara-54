<?php

namespace App\Http\Controllers;

use App\Hobbie;
use App\Pessoa;
use App\Pessoa_Hobbie;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class PessoaController extends Controller
{

    public function index(){
        $lista = Pessoa::all();
        return view('/cadastro/lista-pessoas', ['pessoas' => $lista]);
    }

    public function create(){
        $hobbies = Hobbie::all();
        return view('/cadastro/nova-pessoa', ['hobbies' => $hobbies]);
    }

    public function edit($id){
        $pessoa = Pessoa::find($id);
        $hobbies_p = $pessoa->hobbies;
        $hobbies_all = Hobbie::all();

        return view('cadastro/edita-pessoa', ['pessoa' => $pessoa, 'hobbies_p' => $hobbies_p, 'hobbies_all' => $hobbies_all]);
    }

    public function store(Request $request){

        $campos = $request->all();
        $pessoa = Pessoa::create($campos);
        $hobbies = isset($campos['hobbie']) ? $campos['hobbie'] : [];

        $r = Pessoa_Hobbie::where('id_pessoa',$pessoa->id)->delete();

        foreach($hobbies as $h){
            $modelo = new Pessoa_Hobbie();
            $modelo->id_pessoa = $pessoa->id;
            $modelo->id_hobbie = $h;
            $modelo->save();
        }

        return redirect(Route('cadastro.pessoa.all'));

    }


    public function update(Request $request, $id){

        $campos = $request->all();
        Pessoa::find($id)->update($campos);

        $hobbies_request = (isset($campos['hobbie'])) ? $campos['hobbie'] : [];

        Pessoa_Hobbie::where('id_pessoa', $id);

        foreach($hobbies_request as $h){
            $modelo = new Pessoa_Hobbie();
            $modelo->id_pessoa = $id;
            $modelo->id_hobbie = $h;
            $modelo->save();
        }

        return redirect(Route('cadastro.pessoa.all'));
    }

    public function delete(Request $request, $id){
        Pessoa::find($id)->delete();
        return redirect(Route('cadastro.pessoa.all'));
    }

}
