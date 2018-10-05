<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'tipos_documento';
    protected $primaryKey = 'id_tipodoc';
    protected $dates = ['delete_at'];
    public $timestamps = false;
    protected $fillable = [
        'nombre_tipodoc',
    ];

}
