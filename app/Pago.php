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
}
