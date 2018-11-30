<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'numero_documento', 'proveedor', 'fecha_documento', 'fecha_vencimiento', 'tipo', 'monto_documento', 'documento_original','monto_restante','monto_pagado'
    ];

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id_documento';

    public function prov(){

        return $this->BelongsTo(Proveedores::class,'proveedor', 'id_proveedor')->withTrashed();

    }
    public function tipodoc(){

        return $this->BelongsTo(TipoDocumento::class,'tipo', 'id_tipodoc')->withTrashed();

    }
    public function pagos(){

        return $this->BelongsToMany(Pago::class)->withPivot('monto');

    }
    public function compras(){

        return $this->hasMany(Compra::class,'documento','id_documento');


    }

}
