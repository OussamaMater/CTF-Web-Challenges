<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    use RespondsWithHttpStatus;

    /**
     * Handle a registration request.
     */
    public function __invoke(RegisterRequest $request): Response
    {
        $validated = $request->all();
        $validated['password'] = Hash::make($request->input('password'));

        $user = User::create($validated);

        return $this->success([
            'access_token' => $user->createToken(Str::random(15))->plainTextToken,
            'token_type'   => 'Bearer',
        ], 201);
    }
}
