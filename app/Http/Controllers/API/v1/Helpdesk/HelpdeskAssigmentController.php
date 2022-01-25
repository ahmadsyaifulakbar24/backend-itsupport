<?php

namespace App\Http\Controllers\API\v1\Helpdesk;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\Helpdesk;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HelpdeskAssigmentController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:helpdesks,id'],
            'user_id' => [
                'required',
                'exists:users,id',
                Rule::unique('helpdesk_assigments', 'user_id')->where(function ($query) use ($request) {
                    return $query->where('helpdesk_id', $request->id);
                })
            ]
        ]);

        $helpdesk = Helpdesk::find($request->id);
        $input = $request->all();
        $user = $helpdesk->helpdesk_assigment()->create($input);
        return ResponseFormatter::success(new UserResource($user), 'create user data success');
    }
}
