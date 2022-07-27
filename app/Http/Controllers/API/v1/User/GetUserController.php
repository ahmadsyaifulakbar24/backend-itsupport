<?php

namespace App\Http\Controllers\API\v1\User;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserDetailResouce;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GetUserController extends Controller
{
    public function get (Request $request)
    {
        $request->validate([
            'id' => ['nullable', 'exists:users,id'],
            'role' => ['nullable', 'in:admin,general,it,statistic'],
            'search' => ['nullable', 'string'],
            'paginate' => ['nullable', 'in:0,1'],
            'limit' => [
                Rule::requiredIf($request->paginate == 1),
                'integer'
            ]
        ]);
        $search = $request->search;
        $limit = $request->input('limit', 10);

        $message = 'get user data success';
        iF($request->id) {
            $user = User::find($request->id);
            return ResponseFormatter::success(new UserDetailResouce($user), $message);
        }
        
        $user = User::where('id', '!=', $request->user()->id)->whereNotIn('role', ['super_admin', 'admin']);
        if($request->role) {
            $user->where('role', $request->role);
        }

        if($search) {
            $user->where(function($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%')
                    ->orWhere('phone_number', 'like', '%'.$search.'%');
            });
        }

        if($request->paginate) {
            $result =  UserDetailResouce::collection($user->paginate($limit))->response()->getData(true);
        } else {
            $result =  UserDetailResouce::collection($user->get());            
        }
        return ResponseFormatter::success($result, $message);
    }

    public function assignment(Request $request)
    {
        $user_id = $request->user()->id;
        $user = User::whereIn('role', ['it', 'kasubag'])->where('id', '!=', $user_id)->get();
        return ResponseFormatter::success(UserResource::collection($user), 'get user data success');
    }
}
