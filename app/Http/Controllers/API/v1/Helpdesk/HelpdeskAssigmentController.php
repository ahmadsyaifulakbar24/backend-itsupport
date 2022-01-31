<?php

namespace App\Http\Controllers\API\v1\Helpdesk;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Helpdesk\HelpdeskAssigmentsResource;
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
        $helpdesk_assigment = $helpdesk->helpdesk_assigment()->create($input);
        return ResponseFormatter::success(new HelpdeskAssigmentsResource($helpdesk_assigment), 'create helpdesk assigment data success');
    }

    public function get(Request $request)
    {
        $request->validate([
            'helpdesk_id' => ['required', 'exists:helpdesks,id']
        ]);

        $helpdesk = Helpdesk::find($request->helpdesk_id);
        return ResponseFormatter::success(HelpdeskAssigmentsResource::collection($helpdesk->helpdesk_assigment), 'get helpdesk assgiment data success');
    }
}
