<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobbie extends Model
{
    protected $table = 'hobbies';
    protected $fillable=['nome'];

    public function pessoas(){
        return $this->belongsToMany('App\Pessoa','pessoa_hobbie', 'id_hobbie', 'id_pessoa')->orderBy('nome')->get();
    }

}
