<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    function index(){
        $usuarios = Usuario::all();

        return view("usuario.listar", ["usuarios" => $usuarios]);
    }

    function nuevoUsuario(){
        return view("usuario.crear");
    }
    function guardarUsuario(Request $request){
        

        $nombres = $request->input("nombres");
        $clave = $request->input("clave");
        // $pin = $request->input("pin");
        $estado = $request->input("estado");
        // $fecha_creado =$request->input("fecha_creado");

        $usuario = new Usuario;
        
        $usuario->nombre = $nombres;
        $usuario->clave = $clave;
        $usuario->pin = "";
        $usuario->estado = $estado;
        $usuario->fecha_creado = date('Y-m-d');
        $usuario->save();

        return redirect("/usuarios");
    }
    function verEditar($id){
        $usuario = Usuario::find($id);

        return view("usuario.editar", ["usuario" => $usuario]);
    }

    function editarUsuario(Request $request, $id){
        $nombres = $request->input("nombres");
        $clave = $request->input("clave");
        // $pin = $request->input("pin");
        $estado = $request->input("estado");
        // $fecha_creado =$request->input("fecha_creado");
        $usuario = Usuario::find($id);
        
        $usuario->nombre = $nombres;
        $usuario->clave= $clave;
        $usuario->pin= "";
        $usuario->estado = $estado;
        $usuario->fecha_creado = date('Y-m-d');

        $usuario->save();
        return redirect("/usuarios");
    }

    function eliminarUsuario(Request $request, $id){
        $usuario = Usuario::find($id);
        $usuario->estado = $estado = !$usuario->estado;
        $usuario->save();
        return redirect("/usuarios");
    }
}
