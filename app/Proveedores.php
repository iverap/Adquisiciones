<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    //
    protected $fillable = [
        'nombre_proveedor', 'rut_proveedor'
    ];

    protected $primaryKey = 'id_proveedor';
}
