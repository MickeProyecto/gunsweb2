<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function indexusuarios()
    {
        $usuarios = User::all();
        return response()->json($usuarios);
    }

    public function signup(Request $request)
    {
        $request->validate([
            'photo' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'password' => 'required',
            'email' => 'required | email | unique:users',
            'phone' => 'required | unique:users',
            'dni' => 'required | unique:users',
            'role',
        ]);

        $user = new User();
        $user->photo = $request->photo;
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->dni = $request->dni;

        $existing_users_count = User::count();
        if ($existing_users_count == 0) {
            $user->rol = 'admin';
        } else {
            $user->rol = 'cliente';
        }

        $user->save();
        return response()->json([
            "status" => 1,
            'message' => 'Successfully created user!',
            "value" => $user
        ]);
    }
    public function login(Request $request)
    {
        $request->validate([
            "dni" => "required",
            "password" => "required"
        ]);
        $user = user::where("dni", "=", $request->dni)->first();
        if (isset($user->id)) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken("auth_token")->plainTextToken;
                return response()->json([
                    "value" => $user,
                    "access_token" => $token
                ]);
            } else {
                return response()->json(
                    "Password_bad"
                );
            }
        } else {
            return response()->json(
                "Username_bad"
            );
        }
    }
    public function userprofile()
    {
        return response()->json([
            "status" => 0,
            "message" => "Acerca del perfil del usuario",
            "data" => auth()->user()
        ]);
    }
        Public function updateuser(Request $request){//Permite actualizar los datos del cliente requeridos
        $user_id = auth()->user()->id;
        if (user::where(["id" => $user_id])->exists()) {
            $updateuser = user::find($user_id);
            $updateuser->photo = $request->photo;
            $updateuser->name = $request->name;
            $updateuser->lastname = $request->lastname;
            $updateuser->password = Hash::make($request->password);
            $updateuser->email = $request->email;
            $updateuser->phone = $request->phone;
            $updateuser->dni = $request->dni;
            $updateuser->save();
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
    public function update(Request $request, $id)
    {
        $user_id = auth()->user()->id;
        if (user::where(["id" => $user_id])->exists()) {
            $update = user::find($user_id);
            $update->password = Hash::make($request->password);
            $update->save();
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
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            "status" => 1,
            "message" => "cierre de session",
        ]);
    }
}
