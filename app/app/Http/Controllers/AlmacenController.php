<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    function index(){
        $almacen = Almacen::all();
        return view("almacen.listar", ["almacen" => $almacen]);
    }

    function nuevoalmacen(){
        return view("almacen.crear");
    }

    function guardaralmacen(Request $request){
        $nombres = $request->input("nombres");
        $estado = $request->input("estado");

        $almacen = new almacen;

        $almacen->nombre = $nombres;
        $almacen->estado = $estado;
        $almacen->fecha_creado = date('Y-m-d');
        $almacen->creado_por = 1;
        $almacen->save();
        return redirect("/almacen");
    }

    function verEditar($id){
        $almacen = almacen::find($id);
        return view("almacen.editar", ["almacen" => $almacen]);
    }

    function editaralmacen(Request $request, $id){
        $nombres = $request->input("nombres");
        $estado = $request->input("estado");
        $almacen = Almacen::find($id);
        
        $almacen->nombre = $nombres;
        $almacen->estado = $estado;

        $almacen->save();
        return redirect("/almacen");

    }

    function eliminaralmacen(Request $request, $id){
        $almacen = Almacen::find($id);
        $almacen->estado = $estado = !$almacen->estado;
        $almacen->save();
        return redirect("/almacen");
    }
}
