<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    //
    protected $fillable = [
        'numero_documento', 'proveedor', 'fecha_documento', 'fecha_vencimiento', 'tipo', 'monto_documento', 'documento_original'
    ];

    protected $primaryKey = 'id_documento';

    public function prov(){

        return $this->BelongsTo(Proveedores::class,'proveedor', 'id_proveedor');

    }
}
