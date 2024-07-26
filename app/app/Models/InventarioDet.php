<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarioDet extends Model
{
    use HasFactory;
    protected $table = 'inventario_det';
    protected $primaryKey = 'id';
    public $timestamps = false;
   
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id');
    }

    public function inventario()
    {
        return $this->belongsTo(InventarioCab::class, 'id_inventario');
    }

}
