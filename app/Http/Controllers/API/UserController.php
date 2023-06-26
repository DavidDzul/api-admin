<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::with('images')->get();
        $users = User::where('admin', false)->get();
        return response()->json($users);
    }

    public function createUser(SaveUserRequest $request)
    {
        $user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->workPosition = $request->workPosition;
        $user->campus = $request->campus;
        $user->admin = $request->admin;
        $user->active = $request->active;
        $user->save();
        return response()->json([
            "res" => true,
            "msg" => "Usuario registrado correctamente",
            "user" => $user
        ], 200);
    }

    public function updateUser(UpdateUserRequest $request)
    {
        $user = User::find($request->id);
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->workPosition = $request->workPosition;
        $user->campus = $request->campus;
        $user->admin = $request->admin;
        $user->active = $request->active;
        $user->save();
        return response()->json([
            'res' => true,
            "msg" => "Actualización con  éxito",
            "user" => $user
        ], 200);
    }

    public function destroyUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json([
                'res' => true,
                "msg" => "Eliminado con  éxito",
            ], 200);
        } else {
            return response()->json([
                'res' => true,
                "msg" => "Error al eliminar",
            ], 200);
        }
    }
}
