<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function showWelcomePage(Request $request): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('welcome');
    }

    public function showApiList(Request $request)
    {
        return view('api.list');
    }

    public function showDashboardWithToken(Request $request)
    {
        $validToken = Auth::user()->createToken('test-token');
        $validTokenPlaintext = $validToken->plainTextToken;
        return view('dashboard', ['token' => $validTokenPlaintext]);
    }
}
