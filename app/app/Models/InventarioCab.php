<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarioCab extends Model
{
    use HasFactory;
    protected $table = 'inventario_cab';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function tipo()
    {
        return $this->belongsTo(TipoComprobante::class, 'id_tipo_comprobante', 'id');
    }

    public function detalles()
    {
        return $this->hasMany(InventarioDet::class, 'id_inventario');
    }
}
