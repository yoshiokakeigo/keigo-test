<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;

class Authenticate extends Middleware {
  /**
   * Get the path the user should be redirected to when they are not authenticated.
   */
  protected function unauthenticated($request, array $guards) {
    throw new AuthenticationException(
      'Unauthenticated.',
      $guards,
      $this->redirectToOriginal($request, $guards)
    );
  }

  protected function redirectToOriginal($request, array $guards) {
    foreach ($guards as $guard) {
      if ($guard === 'admin') {
        return route('admin.login');
      }
    }
  }
}
