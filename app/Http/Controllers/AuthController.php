<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    public function register(Request $request) {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'user' => 'required|string|unique:users,user',
            'password' => 'required|string|confirmed'
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());       
        }

        try {
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'user' => $input['user'],
                'password' => bcrypt($input['password'])
            ]);
    
            $response = [
                'user' => $user,
                'res' => true,
                'msg' => 'Usuario creado con éxito'
            ];
    
            return response($response, 201);            
        } catch (\Throwable $th) {
            return $this->handleResponse($th->getMessage());
        }
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

    public function logout() {
        auth()->user()->tokens()->delete();

        return [
            'res' => true,
            'msg' => 'Salida correcta'
        ];
    }

}
