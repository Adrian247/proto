<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiSessionController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse|null
     */
    public function login(Request $request): JsonResponse|null
    {
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);
        $user       = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            $state      = 404;
            $message    = 'The provided credentials are incorrect.';
            return response()->json(compact('message'), $state);
        }

        $state      = 200;
        $message    = 'Login success';
        $token      = $user->createToken('auth_token')->plainTextToken;
        return response()->json(compact('message', 'token'), $state);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Session closed'
        ]);
    }
}
