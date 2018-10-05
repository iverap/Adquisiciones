<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedores extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'nombre_proveedor', 'rut_proveedor'
    ];

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id_proveedor';
}
