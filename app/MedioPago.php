<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedioPago extends Model
{
    //
    protected $fillable = [
        'medio'
    ];
    protected $dates = ['delete_at'];
    public $timestamps = false;
    protected $primaryKey = 'id_mediopago';
}
