<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pago extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'banco',
        'monto',
        'fecha_pago',
        'observacion',
        'cuenta',
        'nro_cuenta',
        'nro_transaccion',
        'medio_pago'
    ];

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id_pago';

    public function documentos(){

        return $this->BelongsToMany(Documento::class)->withPivot('monto');

    }

    public function medios(){

        return $this->BelongsTo(MedioPago::class,'medio_pago', 'id_mediopago')->withTrashed();

    }
    public function pagoss(){

        return $this->BelongsTo(Cuenta::class,'cuenta', 'id_cuenta')->withTrashed();

    }
}
