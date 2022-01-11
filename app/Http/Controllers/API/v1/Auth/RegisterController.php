<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'nip' => ['required', 'unique:users,nip'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone_number' => ['required', 'numeric', 'digits_between:7,15'],
            'eselon1_id' => [
                'required',
                Rule::exists('params', 'id')->where(function ($query) {
                    return $query->where('category', 'eselon1');
                })
            ],
            'eselon2_id' => [
                'required',
                Rule::exists('params', 'id')->where(function ($query) use ($request) {
                    return $query->where('parent_id', $request->eselon1_id);
                })
            ],
            'position' => ['required', 'string'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required', 'min:8'],
            'role' => ['required', 'exists:roles,role']
        ]);

        $input = $request->all();
        $user = User::create($input);
        return ResponseFormatter::success(new UserResource($user), 'register user success');
    }
}
