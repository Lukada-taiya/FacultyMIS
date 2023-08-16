<?php

namespace App\Http\Responses;

use Inertia\Inertia;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
  /**
   * @param  $request
   * @return mixed
   */
  public function toResponse($request)
  {
    // $home = auth()->user()->is_admin ? '/admin' : '/dashboard'; 
    return Inertia::location('/dashboard');
  }
}
