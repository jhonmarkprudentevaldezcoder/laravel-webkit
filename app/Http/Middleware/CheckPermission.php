<?php

namespace App\Http\Middleware;

use App\Enums\RolePermissions;
use App\Enums\RolesEnums;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CheckPermission
 *
 * Middleware to check if the authenticated user has the specified permission.
 */
class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $ability
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $ability): Response
    {
        $this->authenticate();

        $this->authorize($ability);

        return $next($request);
    }

    /**
     * Ensure the user is authenticated.
     *
     * @return void
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function authenticate(): void
    {
        if (!Auth::check()) {
            throw new \Illuminate\Auth\AuthenticationException('Unauthenticated');
        }
    }

    /**
     * Authorize the user based on the provided ability.
     *
     * @param  string  $ability
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    protected function authorize(string $ability): void
    {
        $userRole = Auth::user()->user_role;

        if (!in_array($ability, RolePermissions::ABILITY[$userRole])) {
            throw new \Illuminate\Auth\Access\AuthorizationException('You don\'t have permission to access this resource', 403);
        }
    }
}