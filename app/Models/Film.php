<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
     //sem o fillable nao consigo cadastrar pela view cadastrar
    protected $fillable=['title','series','price','id_user'];
    protected $table='film';
   

    //criando medoto de relacionamento entre as tabelas
    public function relUsers(){//relacionamento com usuarios, hasone 1 filme pode ter apenas 1 diretor
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
}
