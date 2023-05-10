<?php

namespace App\Http\Controllers;

use App\Models\material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
    public function indexm()
    {
        $material = material::all();
        return response()->json($material);
    }

    public function indexmex($id)
    {
        $sql = "select id, img, nombre, marca, descripcion, cantidad, precio, id_categoria
        from materials
        where id = $id;";
        $materials = DB::select($sql);
        return $materials;
    }

    public function createm(Request $request)
    {
        $request->validate([
            'img' => 'required',
            'nombre' => 'required | unique:materials',
            'marca' => 'required',
            'descripcion' => 'required',
            'cantidad' => 'required',
            'precio' => 'required',
            'id_categoria',
        ]);

        $material = new material();
        /*if($request->hasFile('img')){
            $file= $request->file('img');
            $destinationpath='img/';
            $filname = time().'-'.$file->getClientOriginalName();
            $uploadsuccess= $request->file('img')->move($destinationpath,$filname);
            $material->img = $destinationpath.$filname;
        }*/
        $material->img = $request->img;
        $material->nombre = $request->nombre;
        $material->marca = $request->marca;
        $material->descripcion = $request->descripcion;
        $material->cantidad = $request->cantidad;
        $material->precio = $request->precio;
        $material->id_categoria = $request->id_categoria;
        $material->save();
        return response()->json([
            'message' => 'Successfully created material!'
        ]);
    }
    public function readm(Request $request)
    {
    }
    public function updatem(Request $request)
    {
        $material = material::findOrFail($request->id);
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $destinationpath = 'img/';
            $filname = time() . '-' . $file->getClientOriginalName();
            $uploadsuccess = $request->file('img')->move($destinationpath, $filname);
            $material->img = $destinationpath . $filname;
        }
        //$material->img=$request->img;
        $material->nombre = $request->nombre;
        $material->marca = $request->marca;
        $material->descripcion = $request->descripcion;
        $material->cantidad = $request->cantidad;
        $material->precio = $request->precio;
        $material->id_categoria = $request->id_categoria;
        $material->save();
        return $material;
    }

    public function updatefoto(Request $request, $id)
    { //Permite actualizar solo el numero de telefone
        $material_id = $id;
        if (material::where(["id" => $material_id])->exists()) {
            $updatematerial = material::find($material_id);
            $updatematerial->img = $request->img;
            $updatematerial->save();
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

    public function updatenombre(Request $request, $id)
    { //Permite actualizar solo el numero de telefone
        $material_id = $id;
        if (material::where(["id" => $material_id])->exists()) {
            $updatematerial = material::find($material_id);
            $updatematerial->nombre = $request->nombre;
            $updatematerial->save();
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

    public function updatemarca(Request $request, $id)
    { //Permite actualizar solo el numero de telefone
        $material_id = $id;
        if (material::where(["id" => $material_id])->exists()) {
            $updatematerial = material::find($material_id);
            $updatematerial->marca = $request->marca;
            $updatematerial->save();
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
        $material_id = $id;
        if (material::where(["id" => $material_id])->exists()) {
            $updatematerial = material::find($material_id);
            $updatematerial->descripcion = $request->descripcion;
            $updatematerial->save();
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

    public function updatecantidad(Request $request, $id)
    { //Permite actualizar solo el numero de telefone
        $material_id = $id;
        if (material::where(["id" => $material_id])->exists()) {
            $updatematerial = material::find($material_id);
            $updatematerial->cantidad = $request->cantidad;
            $updatematerial->save();
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

    public function updateprecio(Request $request, $id)
    { //Permite actualizar solo el numero de telefone
        $material_id = $id;
        if (material::where(["id" => $material_id])->exists()) {
            $updatematerial = material::find($material_id);
            $updatematerial->precio = $request->precio;
            $updatematerial->save();
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

    public function updateidcategoria(Request $request, $id)
    { //Permite actualizar solo el numero de telefone
        $material_id = $id;
        if (material::where(["id" => $material_id])->exists()) {
            $updatematerial = material::find($material_id);
            $updatematerial->id_categoria = $request->id_categoria;
            $updatematerial->save();
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

    public function deletem(Request $request)
    {
        material::destroy($request->id);
    }
}
