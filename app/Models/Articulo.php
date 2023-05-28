<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    //table name
    protected $table = 'articulos';
    //primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;



    public function entradas() {
        return $this->hasMany('App\Models\Entrada', 'idArticulo', 'id');
    }

    public function salidas() {
        return $this->hasMany('App\Models\Salida', 'idArticulo', 'id');
    }

}
