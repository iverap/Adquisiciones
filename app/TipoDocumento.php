<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'tipos_documento';
    protected $dates = ['delete_at'];
    public $timestamps = false;
    protected $fillable = [
        'nombre_tipodoc',
    ];
    protected $primaryKey = 'id_tipodoc';
}
