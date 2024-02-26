<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Services\Auth\AuthServices;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    /**
     * The authentication service instance.
     *
     * @var \App\Services\Auth\AuthServices
     */
    private $authServices;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Services\Auth\AuthServices  $authServices
     * @return void
     */
    public function __construct(AuthServices $authServices)
    {
        $this->authServices = $authServices;
    }

    /**
     * Handle user registration.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(AuthRequest $request, AuthServices $authServices): JsonResponse
    {
        return $authServices->registerData($request);
    }

  
}