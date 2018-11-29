<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedioPago extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'medio'
    ];
    protected $dates = ['delete_at'];
    public $timestamps = false;
    protected $primaryKey = 'id_mediopago';
}
