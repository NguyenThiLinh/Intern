<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\LogoutService;
use Illuminate\Http\Request;


class LogoutController extends Controller
{
    protected $adminLogout;

    public function __construct(LogoutService $adminLogout)
    {
        $this->adminLogout = $adminLogout;
    }
    public function logout(Request $request)
    {
        return $this->adminLogout->logout($request);
    }
}
