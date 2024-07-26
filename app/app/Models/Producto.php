<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'producto';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function categoria()
    {
        return $this->belongsTo(CategoriaProducto::class, 'id_categoria', 'id');
    }

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'id_unidad', 'id');
    }


    public function inventarios()
    {
        return $this->hasMany(InventarioDet::class, 'id_producto');
    }

    public function getEntradasAttribute()
    {
        return $this->inventarios()->whereHas('inventario.tipo', function($query) {
            $query->where('tipo', 1);
        })->sum('cantidad');
    }

    public function getSalidasAttribute()
    {
        return $this->inventarios()->whereHas('inventario.tipo', function($query) {
            $query->where('tipo', 0);
        })->sum('cantidad');
    }

    public function getStockAttribute()
    {
        return $this->entradas - $this->salidas;
    }

    public function getCostoPromedioAttribute()
    {
        $totalCosto = $this->inventarios()->whereHas('inventario.tipo', function($query) {
            $query->where('tipo', 1);
        })->sum(\DB::raw('cantidad * costo'));

        return $this->entradas > 0 ? $totalCosto / $this->entradas : 0;
    }

    public function getCostoTotalStockAttribute()
    {
        return $this->stock * $this->costo_promedio;
    }
}
