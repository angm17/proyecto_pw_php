<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoComprobante;

class TipoComprobanteController extends Controller
{
    function index(){
        $tipo_comprobantes = TipoComprobante::all();
        return view("tipo_comprobante.index", ["tipo_comprobantes" => $tipo_comprobantes, 'title' => 'Tipo de Comprobante']);
    }

    function nuevoTipoComprobante(){
        return view("tipo_comprobante.crear", ['title' => 'Agregar Tipo de Comprobante']);
    }

    function guardarTipoComprobante(Request $request){
        $descripcion = $request->input("descripcion");
        $tipo = $request->input("tipo");
        $estado = $request->input("estado");

        $tipo_comprobante = new TipoComprobante;
        $tipo_comprobante -> descripcion = $descripcion;
        $tipo_comprobante -> tipo = (int)$tipo;
        $tipo_comprobante -> estado = $estado;
        $tipo_comprobante -> fecha_creado = NOW();
        $tipo_comprobante -> creado_por = 1;

        $tipo_comprobante -> save();

        return redirect("/tipo-comprobante");
    }

    function editarTipoComprobante($id){
        $tipo_comprobante = TipoComprobante::find($id);
        return view("tipo_comprobante.editar", ["tipo_comprobante" => $tipo_comprobante, 'title' => 'Editar Tipo de Comprobante']);
    }

    function guardarTipoComprobanteEditado($id, Request $request){
        $tipo_comprobante = TipoComprobante::find($id);
        $tipo_comprobante -> descripcion = $request->input("descripcion");
        $tipo_comprobante -> tipo = (int)$request->input("tipo");
        $tipo_comprobante -> estado = $request->input("estado");
        $tipo_comprobante -> fecha_modificado = NOW();
        $tipo_comprobante -> modificado_por = 1;

        $tipo_comprobante -> save();
    
        return redirect("/tipo-comprobante");
    }

    public function eliminarTipoComprobante($id){
        $tipo_comprobante = TipoComprobante::find($id);
        $tipo_comprobante->estado = !$tipo_comprobante->estado;
        $tipo_comprobante->save();
        return redirect('/tipo-comprobante');
    }
}

