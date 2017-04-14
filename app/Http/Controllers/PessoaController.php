<?php

namespace App\Http\Controllers;

use App\Hobbie;
use App\Pessoa;
use App\Pessoa_Hobbie;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class PessoaController extends Controller
{

    public function index(){
        $pessoas = Pessoa::with('hobbies')->orderBy('nome', 'asc')->paginate(5);
        return view('/cadastro/lista-pessoas', ['pessoas' => $pessoas]);
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
        $pessoa->hobbies()->attach($hobbies);

        return redirect(Route('cadastro.pessoa.all'));

    }


    public function update(Request $request, $id){

        $campos = $request->all();
        $pessoa = Pessoa::find($id);
        $pessoa->update($campos);
        $hobbies_request = (isset($campos['hobbie'])) ? $campos['hobbie'] : [];
        $pessoa->hobbies()->sync($hobbies_request);

        return redirect(Route('cadastro.pessoa.all'));
    }

    public function delete(Request $request, $id){
        Pessoa::find($id)->delete();
        return redirect(Route('cadastro.pessoa.all'));
    }

}
