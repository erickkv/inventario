<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    //table name
    protected $table = 'entradas';
    //primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function articulo() {
        return $this->belongsTo('App\Models\Articulo', 'idArticulo', 'id');
    }

    public function user() {
        return $this->belongsTo('App\Models\User', 'idUsuario', 'id');
    }

}
