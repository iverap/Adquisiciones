<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id_categoria';
    protected $dates = ['delete_at'];
    public $timestamps = false;
    protected $fillable = [
        'nombre_categoria',
    ];

}
