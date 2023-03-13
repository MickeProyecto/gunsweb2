<?php

namespace App\Http\Controllers;

use App\Models\puntoentrega;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class PuntoentregaController extends Controller
{
    public function indexpu(){
        $puntoentrega=puntoentrega::all();
        return $puntoentrega;
    }
    public function createpu(Request $request)
    {
        $request->validate([
            'tienda'=>'required',
            'provincia'=>'required',
            'cp'=>'required',
            'direccion'=>'required',
            'mapa'=>'required',
            'streeview'=>'required',
            'encargado'=>'required',
            'foto'=>'required',
        ]);

        $puntoentrega=new puntoentrega();
        $puntoentrega->tienda=$request->tienda;
        $puntoentrega->provincia=$request->provincia;
        $puntoentrega->cp=$request->cp;
        $puntoentrega->direccion=$request->direccion;
        $puntoentrega->mapa=$request->mapa;
        $puntoentrega->streeview=$request->streeview;
        $puntoentrega->encargado=$request->encargado;
        $puntoentrega->foto=$request->foto;
        $puntoentrega->save();
        return Response()->json([
            'message'=> 'Successfull crerated puntoentrega'
        ]);
    }
    public function readpu(Request $request)
    {

    }
    public function updatepu(Request $request)
    {
        $puntoentrega=puntoentrega::findOrFail($request->id);
        $puntoentrega->tienda=$request->tienda;
        $puntoentrega->provincia=$request->provincia;
        $puntoentrega->cp=$request->cp;
        $puntoentrega->direccion=$request->direccion;
        $puntoentrega->mapa=$request->mapa;
        $puntoentrega->streeview=$request->streeview;
        $puntoentrega->encargado=$request->encargado;
        $puntoentrega->foto=$request->foto;
        $puntoentrega->save();
        return $puntoentrega;

    }
    public function deletepu(Request $request)
    {
        puntoentrega::destroy($request->id);
    }
}
