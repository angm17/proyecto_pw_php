<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidad;

class UnidadController extends Controller
{
    function index(){
        $unidades = Unidad::all();
        return view("unidad.index", ["unidades" => $unidades, 'title' => 'Unidades']);
    }

    function nuevaUnidad(){
        return view("unidad.crear", ['title' => 'Agregar Unidad']);
    }

    function guardarUnidad(Request $request){
        $descripcion = $request->input("descripcion");
        $estado = $request->input("estado");

        $unidad = new Unidad;
        $unidad -> descripcion = $descripcion;
        $unidad -> estado = $estado;
        $unidad -> fecha_creado = NOW();
        $unidad -> creado_por = 1;

        $unidad -> save();

        return redirect("/unidad");
    }

    function editarUnidad($id){
        $unidad = Unidad::find($id);
        return view("unidad.editar", ["unidad" => $unidad, 'title' => 'Editar Unidad']);
    }

    function guardarUnidadEditada($id, Request $request){
        $unidad = Unidad::find($id);
        $unidad -> descripcion = $request->input("descripcion");
        $unidad -> estado = $request->input("estado");
        $unidad -> fecha_modificado = NOW();
        $unidad -> modificado_por = 1;

        $unidad -> save();
    
        return redirect("/unidad");
    }

    public function eliminarUnidad($id){
        $unidad = Unidad::find($id);
        $unidad->estado = !$unidad->estado;
        $unidad->save();
        return redirect('/unidad');
    }
}
