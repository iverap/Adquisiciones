<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Proveedor extends Authenticatable
{
    use Notifiable;
    protected $table = 'proveedores';
    protected $primaryKey = 'id';
    protected $dates = ['delete_at'];
    public $timestamps = false;
    protected $fillable = [
        'nombre_proveedor', 'rut_proveedor',
    ];

}
