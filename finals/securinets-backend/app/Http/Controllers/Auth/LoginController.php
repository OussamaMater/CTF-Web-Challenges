<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    use RespondsWithHttpStatus;

    /**
     * Handle an incoming authentication request.
     */
    public function __invoke(LoginRequest $request): Response
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->failure(
                'The provided credentials are incorrect.',
                401
            );
        }

        if (auth()->user()->hasTokens()) {
            auth()->user()->revokeTokens();
        }

        return $this->success([
            'access_token' => auth()->user()->createToken(Str::random(15))->plainTextToken,
            'token_type'   => 'Bearer',
        ], 201);
    }
}
