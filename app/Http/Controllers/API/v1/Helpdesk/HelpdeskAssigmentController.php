<?php

namespace App\Http\Controllers\API\v1\Helpdesk;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Helpdesk\HelpdeskAssigmentsResource;
use App\Models\Helpdesk;
use App\Models\HelpdeskAssigment;
use App\Models\User;
use App\Notifications\NewHelpdeskAssignment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HelpdeskAssigmentController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'helpdesk_id' => ['required', 'exists:helpdesks,id']
        ]);

        $helpdesk = Helpdesk::find($request->helpdesk_id);
        return ResponseFormatter::success(HelpdeskAssigmentsResource::collection($helpdesk->helpdesk_assigment), 'get helpdesk assgiment data success');
    }

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

        // sent notification
        $assignment_from = User::find($request->user()->id);
        $user = User::find($request->user_id);
        $user->notify(new NewHelpdeskAssignment($helpdesk_assigment, $assignment_from, $user));

        return ResponseFormatter::success(new HelpdeskAssigmentsResource($helpdesk_assigment), 'create helpdesk assigment data success');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:helpdesk_assigments,id']
        ]);

        $helpdesk_assigment = HelpdeskAssigment::find($request->id);
        $helpdesk_assigment->delete();

        return ResponseFormatter::success(null, 'delete helpdesk assigment data success');
    }
}
