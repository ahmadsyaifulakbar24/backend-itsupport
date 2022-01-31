<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserDetailResouce;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __invoke(Request $request)
    {
        return ResponseFormatter::success(
            new UserDetailResouce($request->user()),
            'success get user profile',
        );
    }
}
