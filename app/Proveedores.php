<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedores extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'nombre_proveedor', 'rut_proveedor', 'nro_cuenta', 'banco'
    ];

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id_proveedor';

    public function documentos(){

        return $this->hasMany(Documento::class,'proveedor','id_proveedor');


    }
}
