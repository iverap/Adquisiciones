<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuenta extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id_cuenta';
    protected $dates = ['delete_at'];
    protected $fillable = [
        'nombre_cuenta'
    ];

}
