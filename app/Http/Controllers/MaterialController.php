<?php

namespace App\Http\Controllers;

use App\Models\material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function indexm()
    {
        $material = material::all();
        return response()->json($material);
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
    public function deletem(Request $request)
    {
        material::destroy($request->id);
    }
}
