<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $token = $user->createToken('authToken')->accessToken;

                return response()->json([
                    'message' => 'Login Success',
                    'user' => $user,
                    'token' => $token
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Invalid email or password',
                ], 401);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Unknown Error', 
                'message' => $e->getMessage()
            ], 500);
        }
    }



    public function register(Request $request)
    {
        $data = $request->only('name', 'email', 'password');
        try {
            $data['password'] = bcrypt($data['password']);
            if(User::where('email', $data['email'])->exists()){
                return response()->json(['message' => 'User already exists'], 401);
            }
            $user = User::create($data);
            $token = $user->createToken('authToken')->accessToken;
            return response()->json(
                [   'message' => 'Registation Success',
                    'user' => $user,
                    'token' => $token],
                 200);
        } catch (\Exception $e) {
            \Log::error('Register Error: '.$e->getMessage());
            return response()->json(['error' => 'Unknown Error', 'message' => $e->getMessage()], 500);
        }
    }
}
