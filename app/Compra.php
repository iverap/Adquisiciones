<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Compra extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'categoria', 'documento', 'detalle', 'descripcion_gasto', 'monto_gasto'
    ];
    protected $dates = ['delete_at'];
    protected $primaryKey = 'id_compra';

    public function categ(){
        return $this->BelongsTo(Categoria::class,'categoria', 'id_categoria')->withTrashed();
    }
    public function docum(){
        return $this->BelongsTo(Documento::class,'documento', 'id_documento')->withTrashed();
    }
}
