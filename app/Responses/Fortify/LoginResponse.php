<?php

declare(strict_types=1);

namespace App\Responses\Fortify;
 
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request) : RedirectResponse
    {
        $redirectRoute = "";

        if (session()->has('users')) {
            $redirectRoute = session()->pull('url.intended');
        } else {
            $redirectRoute = RouteServiceProvider::HOME;
        }

        return redirect()->intended($redirectRoute);
    }
}
