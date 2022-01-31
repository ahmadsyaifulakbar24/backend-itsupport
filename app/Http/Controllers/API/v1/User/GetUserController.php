<?php

namespace App\Http\Controllers\API\v1\User;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserDetailResouce;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class GetUserController extends Controller
{
    public function get (Request $request)
    {
        $request->validate([
            'id' => ['nullable', 'exists:users,id'],
            'role' => ['nullable', 'in:admin,general,it,statistic']
        ]);

        $message = 'get user data success';
        iF($request->id) {
            $user = User::find($request->id);
            return ResponseFormatter::success(new UserDetailResouce($user), $message);
        }

        $user = User::query();
        if($request->role) {
            $user->where('role', $request->role);
        }
        return ResponseFormatter::success(UserResource::collection($user->get()), $message);
    }
}
