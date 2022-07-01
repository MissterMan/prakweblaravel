<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only(
            'email',
            'password',
        );

        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->getMessageBag()], 200);
        }

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(
                    [
                        'success' => false,
                        'error' => 'Credential Invalid'
                    ],
                    400
                );
            }
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'error' => 'Could not create token'
            ], 500);
        }
        return response()->json(['success' => true, 'token' => $token]);
    }

    public function getAuthenticatedUser()
    {
        try {
            if (!$author = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (TokenExpiredException $e) {
            response()->json(['token_expired'], 401);
        } catch (TokenInvalidException $e) {
            response()->json(['token_invalid'], 401);
        } catch (JWTException $e) {
            return response()->json(['token_absent'], 401);
        }
        return response()->json(compact('author'));
    }

    public function index()
    {
        return view('stisla.pages.login-page');
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Logged out']);
    }
}
