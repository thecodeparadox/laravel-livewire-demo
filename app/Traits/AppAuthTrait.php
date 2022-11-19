<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RuntimeException;

trait AppAuthTrait
{
    /**
     * User Logout
     *
     * @param Request $req
     * @return void
     * @throws RuntimeException
     */
    public function logoutUser(Request $req): void
    {
        Auth::logout();

        // recommended
        $req->session()->invalidate();
        $req->session()->regenerateToken();
    }
}
