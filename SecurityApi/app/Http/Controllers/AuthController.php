<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
     * Registro de usuario
     */
    public function signUps(Request $request)
    {
        try{
            $request->validate([
                'machineName' => 'required|string',
                'mac' => 'required|string',
                'password' => 'required|string'
            ]);

            $client = Client::create([
                'id' => sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535)),
                'machine_name' => $request->machineName,
                'ip' => $request->ip,
                'mac' => $request->mac,
                'password' => bcrypt($request->password)
            ]);
    
            return response()->json([
                'message' => 'Successfully created client!',
                'clientId' => $client->id
            ], 201);
        }catch(Exception $ex){
            return response()->json([
                'message' => 'Error interno, comuniquese con Machinsoft al +57 311 213 3233'
            ], 400);
        }
    }

    /**
     * Inicio de sesión y creación de token
     */
    public function login(Request $request)
    {
        try{
            $request->validate([
                'clientId' => 'required|string',
                'mac' => 'required|string',
                'password' => 'required|string'
            ]);

            $credentials = [
                'id' => $request->clientId,
                'mac' => $request->mac,
                'password' =>$request->password
            ];

            if (!Auth::attempt($credentials)){
                return response()->json([
                    'message' => 'Unauthorized'
                ], 401);
            }
            
            $user = $request->user();
            $tokenResult = $user->createToken('Personal Access Token');

            $token = $tokenResult->token;
            if ($request->rememberMe)
                $token->expires_at = Carbon::now()->addMonth(1);
            $token->save();

            return response()->json([
                'accessToken' => $tokenResult->accessToken,
                'tokenType' => 'Bearer',
                'expiresAt' => Carbon::parse($token->expires_at)->toDateTimeString()
            ]); 
        }catch(Exception $ex){
            return response()->json([
                'message' => 'invalid credentials'
            ], 400); 
        }
    }

    /**
     * Cierre de sesión (anular el token)
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Obtener el objeto User como json
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

     /**
     * Obtener el objeto Client como json
     */
    public function client(Request $request)
    {
        return response()->json($request->user());
    }
}
