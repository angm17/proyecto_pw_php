<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventarioDetController extends Controller
{
    function agregar(){
        $producto = $request->input("producto");
        $cantidad = $request->input("cantidad");
        $costo = $request->input("costo");

        $arreglo = ["producto" => $producto, "cantidad" => $cantidad, "costo" => $costo];
    }
}
