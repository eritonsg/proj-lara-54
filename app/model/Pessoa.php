<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = 'pessoas';
    /*
    * The attributes that aren't mass assignable.
    *
    */
    protected $fillable=['nome', 'email', 'cidade', 'estado'];

    public function hobbies(){
        return $this->belongsToMany('App\Hobbie','pessoa_hobbie', 'id_pessoa', 'id_hobbie')->orderBy('nome')->get();
    }

}
