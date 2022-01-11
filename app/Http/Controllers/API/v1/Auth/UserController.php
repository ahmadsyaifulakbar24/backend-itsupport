<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __invoke(Request $request)
    {
        return ResponseFormatter::success(
            $request->user(),
            'success get user profile',
        );
    }
}
