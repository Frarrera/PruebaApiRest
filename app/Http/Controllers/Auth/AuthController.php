<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\SignUpRequest;

class AuthController extends Controller
{
    /**
     * User register
     *
     * @param SignUpRequest $request
     */
    public function signUp(SignUpRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return $this->showOne($user, 201);
    }

    /**
     * Auth Login
     *
     * @param LoginRequest $request
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return $this->showError('No autorizado', [], 401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if ($request->has('remember_me') && $request->remember_me) {
            $token->expires_at = Carbon::not()->addWeeks(1);
        }

        return $this->showOne([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
        ]);
    }

    /**
     * Logout (Revoke token)
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return $this->showOne([
            'message' => 'Cierre de sesión exisoto'
        ]);
    }
}
