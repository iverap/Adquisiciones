<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    //
    protected $fillable = [
        'categoria', 'documento', 'detalle', 'descripcion_gasto', 'monto_gasto'
    ];
    protected $dates = ['delete_at'];
    public $timestamps = false;
    protected $primaryKey = 'id_compra';

    public function categ(){
        return $this->BelongsTo(Categoria::class,'categoria', 'id_categoria');
    }
    public function docum(){
        return $this->BelongsTo(Documento::class,'documento', 'id_documento');
    }
}
