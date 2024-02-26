<?php

namespace App\Services\Auth;

use App\Http\Requests\Auth\AuthRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\User;

/**
 * Class AuthServices.
 */
class AuthServices
{
    /**
     * Register a new user.
     *
     * @param  \App\Http\Requests\Auth\AuthRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function registerData(AuthRequest $request): JsonResponse
    {
        $user = $this->storeData($request->validated());

        if (!$user) {
            return response()->json(['errors' => 'Failed to Register'], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(['message' => 'User Registered Successfully', 'data' => new UserResource($user)], Response::HTTP_CREATED);
    }

    /**
     * Store user data.
     *
     * @param  array  $userData
     * @return \App\Models\User|null
     */
    public function storeData(array $userData)
    {
        return User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => Hash::make($userData['password'])
        ]);
    }
}