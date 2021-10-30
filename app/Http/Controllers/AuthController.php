<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'user' => 'required|string|unique:users,user',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'user' => $fields['user'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('FerreSurWebToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
            'res' => true,
            'msg' => 'Usuario creado con éxito'
        ];

        return response($response, 201);
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check user
        $user = User::where('email', $fields['email'])->first();

        // Check pass
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'res' => false,
                'msg' => 'Credenciales incorrectas'
            ], 401);
        }

        $token = $user->createToken('FerreSurWebToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
            'res' => true,
            'msg' => 'Ingreso correcto'
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'res' => true,
            'msg' => 'Salida correcta'
        ];
    }

}
