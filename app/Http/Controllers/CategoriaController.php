<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function indexc(){
        $categoria=categoria::all();
        return $categoria;
    }

    public function indexcex($id)
    {
        $sql = "select id, nombre, descripcion, tipo
        from categorias
        where id = $id;";
        $categorias = DB::select($sql);
        return $categorias;
    }

    public function createc(Request $request)
    {
        $request->validate([
            'nombre'=>'required | unique:categorias',
            'descripcion'=>'required',
            'tipo'=>'required',
        ]);

        $categoria = new categoria();
        $categoria->nombre=$request->nombre;
        $categoria->descripcion=$request->descripcion;
        $categoria->tipo=$request->tipo;
        $categoria->save();
        return response()->json([
            'message' => 'Successfully created category!'
        ]);

    }
    public function readc(Request $request)
    {

    }

    public function updatenombre(Request $request, $id)
    { //Permite actualizar solo el numero de telefone
        $categoria_id = $id;
        if (categoria::where(["id" => $categoria_id])->exists()) {
            $updatecategoria = categoria::find($categoria_id);
            $updatecategoria->nombre = $request->nombre;
            $updatecategoria->save();
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
            ]);
        } else {
            return response()->json([
                "status" => 1,
                "message" => "No se pùdo actucalizar",
            ]);
        }
    }

    public function updatedescripcion(Request $request, $id)
    { //Permite actualizar solo el numero de telefone
        $categoria_id = $id;
        if (categoria::where(["id" => $categoria_id])->exists()) {
            $updatecategoria = categoria::find($categoria_id);
            $updatecategoria->descripcion = $request->descripcion;
            $updatecategoria->save();
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
            ]);
        } else {
            return response()->json([
                "status" => 1,
                "message" => "No se pùdo actucalizar",
            ]);
        }
    }

    public function updatetipo(Request $request, $id)
    { //Permite actualizar solo el numero de telefone
        $categoria_id = $id;
        if (categoria::where(["id" => $categoria_id])->exists()) {
            $updatecategoria = categoria::find($categoria_id);
            $updatecategoria->tipo = $request->tipo;
            $updatecategoria->save();
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
            ]);
        } else {
            return response()->json([
                "status" => 1,
                "message" => "No se pùdo actucalizar",
            ]);
        }
    }
    public function updatec(Request $request)
    {
        $categoria=categoria::findOrFail($request->id);
        $categoria->nombre=$request->nombre;
        $categoria->descripcion=$request->descripcion;
        $categoria->tipo=$request->tipo;
        $categoria->save();
        return $categoria;
    }
    public function deletec($id)
    {
        categoria::destroy($id);
    }
}
