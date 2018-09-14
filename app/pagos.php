<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pagos extends Model
{
    protected $fillable = [
        'detalle',
        'monto',
        'fecha_vencimiento',
        'observacion',
        'pagado'
    ];
}
