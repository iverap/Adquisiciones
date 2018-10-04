<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Categorias extends Authenticatable
{
    use Notifiable;
    protected $table = 'categorias';
    protected $primaryKey = 'id';
    protected $dates = ['delete_at'];
    public $timestamps = false;
    protected $fillable = [
        'nombre_categoria',
    ];

}
