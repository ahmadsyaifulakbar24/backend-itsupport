<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __invoke(Request $request)
    {
        $token = $request->user()->token()->revoke();
        return ResponseFormatter::success($token, 'Token Revoked');
    }
}
