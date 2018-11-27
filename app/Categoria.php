<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;
    protected $table = 'categorias';
    protected $primaryKey = 'id_categoria';
    protected $dates = ['delete_at'];
    protected $fillable = [
        'nombre_categoria',
    ];

}
