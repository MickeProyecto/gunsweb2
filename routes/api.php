<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\PuntoentregaController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post("signup", [Controller::class, "signup"]);
Route::post("login", [Controller::class, "login"]);

Route::group(['middleware' => ["auth:sanctum"]], function () {
    Route::get("userprofile", [Controller::class, "userprofile"]);
    Route::get("logout", [Controller::class, "logout"]);
    Route::get("indexusuarios", [Controller::class, "indexusuarios"]);
    Route::get("indexespecifico/{id}", [Controller::class, "indexespecifico"]);
    Route::put("updatephoto/{id}", [Controller::class, "updatephoto"]);
    Route::put("updatephone/{id}", [Controller::class, "updatephone"]);
    Route::put("updateemail/{id}", [Controller::class, "updateemail"]);
    Route::put("updatepassword/{id}", [Controller::class, "updatepassword"]);

    Route::get("indexm", [MaterialController::class, "indexm"]);
    Route::middleware('cliente')->prefix('cliente')->group(function () {
    });
    Route::get("indexmex/{id}", [MaterialController::class, "indexmex"]);
    Route::post("createc", [CategoriaController::class, "createc"]);
    Route::post("createm", [MaterialController::class, "createm"]);

    // Route::group(['middleware' => ["auth", "admin"]], function () {
    // Route::get("indexu", [UserController::class, "indexu"]);
    // Route::post("createu", [UserController::class, "createu"]);
    //Route::get("readu",[UserController::class,"readu"]);
    // Route::delete("deleteu/{id}", [Controller::class, "deleteu"]);

    Route::get("indexpu", [PuntoentregaController::class, "indexpu"]);
    Route::get("indexpuex/{id}", [PuntoentregaController::class, "indexpuex"]);
    Route::post("createpu", [PuntoentregaController::class, "createpu"]);
    //Route::get("readpu",[PuntoentregaController::class,"readpu"]);
    Route::put("updatefoto/{id}", [PuntoentregaController::class, "updatefoto"]);
    Route::put("updatetienda/{id}", [PuntoentregaController::class, "updatetienda"]);
    Route::put("updateprovincia/{id}", [PuntoentregaController::class, "updateprovincia"]);
    Route::put("updatecp/{id}", [PuntoentregaController::class, "updatecp"]);
    Route::put("updatedireccion/{id}", [PuntoentregaController::class, "updatedireccion"]);
    Route::put("updatemapa/{id}", [PuntoentregaController::class, "updatemapa"]);
    Route::put("updatestreeview/{id}", [PuntoentregaController::class, "updatestreeview"]);
    Route::put("updateencargado/{id}", [PuntoentregaController::class, "updateencargado"]);
    Route::delete("deletepu/{id}", [PuntoentregaController::class, "deletepu"]);

    Route::get("indexpe", [PedidosController::class, "indexpe"]);
    Route::post("createpe", [PedidosController::class, "createpe"]);
    //Route::get("readpe",[PedidosController::class,"readpe"]);
    Route::put("updatepe/{id}", [PedidosController::class, "updatepe"]);
    Route::delete("deletepe/{id}", [PedidosController::class, "deletepe"]);
    Route::put('updatestock/{id_material}', [PedidosController::class, "updatestock"]);

    //Route::get("readm",[MaterialController::class,"readm"]);
    Route::put("updatem/{id}", [MaterialController::class, "updatem"]);
    Route::put("updatefotom/{id}", [MaterialController::class, "updatefoto"]);
    Route::put("updatenombrem/{id}", [MaterialController::class, "updatenombre"]);
    Route::put("updatemarcam/{id}", [MaterialController::class, "updatemarca"]);
    Route::put("updatedescripcionm/{id}", [MaterialController::class, "updatedescripcion"]);
    Route::put("updatecantidadm/{id}", [MaterialController::class, "updatecantidad"]);
    Route::put("updatepreciom/{id}", [MaterialController::class, "updateprecio"]);
    Route::put("updateidcategoriam/{id}", [MaterialController::class, "updateidcategoria"]);

    Route::delete("deletem/{id}", [MaterialController::class, "deletem"]);

    Route::get("indexc", [CategoriaController::class, "indexc"]);
    Route::get("indexcex/{id}", [CategoriaController::class, "indexcex"]);
    //Route::get("readc",[CategoriaController::class,"readc"])
    Route::put("updatecnombre/{id}", [CategoriaController::class, "updatenombre"]);
    Route::put("updatecdescripcion/{id}", [CategoriaController::class, "updatedescripcion"]);
    Route::put("updatectipo/{id}", [CategoriaController::class, "updatetipo"]);

    Route::put("updatec/{id}", [CategoriaController::class, "updatec"]);
    Route::delete("deletec/{id}", [CategoriaController::class, "deletec"]);
    Route::get('indexo/{id}', [PedidosController::class, "indexo"]);
    Route::get('index', [PedidosController::class, "index"]);


    Route::get('indexca', [CarritoController::class, "indexca"]);
    Route::post('createca', [CarritoController::class, "createca"]);
    //Route::get('readca',[CarritoController::class,"readca"]);
    Route::put('updateca/{id}', [CarritoController::class, "updateca"]);
    Route::delete('deleteca/{id}', [CarritoController::class, "deleteca"]);
});
