<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoDocumento extends Model
{
    use SoftDeletes;

    protected $table = 'tipos_documento';
    protected $primaryKey = 'id_tipodoc';
    protected $dates = ['delete_at'];
    protected $fillable = [
        'nombre_tipodoc',
    ];

}
