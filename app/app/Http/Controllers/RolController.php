<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    function index(){
        $rol = rol::all();

        return view("rol.listar", ["rol" => $rol]);
    }

    function nuevorol(){
        return view("rol.crear");
    }

    function guardarrol(Request $request){

        $descripcion = $request->input("descripcion");
        $estado = $request->input("estado");
        // $fecha_creado =$request->input("fecha_creado");
        // $creado_por =$request->input("creado_por");

        $rol = new rol;
        
        $rol->descripcion = $descripcion;
        $rol->estado = $estado;
        $rol->fecha_creado = date('Y-m-d');
        $rol->creado_por = 1;

        $rol->save();
        return redirect("/rol");
    }

    function verEditar($id){
        $rol = rol::find($id);

        return view("rol.editar", ["rol" => $rol]);
    }

    function editarrol(Request $request, $id){

        $descripcion = $request->input("descripcion");
        $estado = $request->input("estado");
      

        $rol = rol::find($id);
        
        $rol->descripcion = $descripcion;
        $rol->estado = $estado;
       

        $rol->save();
        return redirect("/rol");

    }

    function eliminarrol(Request $request, $id){
        $rol = rol::find($id);
        $rol->estado = $estado = !$rol->estado;
        $rol->save();
        return redirect("/rol");
    }
}
