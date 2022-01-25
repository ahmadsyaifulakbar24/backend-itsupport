<?php

namespace App\Http\Controllers\API\v1\Helpdesk\HelpdeskStep;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Helpdesk\HelpdeskStep\HelpdeskStepResource;
use App\Models\HelpdeskStep;
use Illuminate\Http\Request;

class UpdateHelpdeskStepController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:helpdesk_steps,id'],
            'description' => ['nullable', 'string']
        ]);

        $helpdesk_step = HelpdeskStep::find($request->id);

        $input = [
            'description' => $request->description
        ];
        $helpdesk_step->update($input);

        $historyInput = [
            'type' => 'helpdesk_step',
            'action_by' => $request->user()->id,
            'history' => 'update helpdesk step',
        ];
        $helpdesk_step->history()->create($historyInput);

        return ResponseFormatter::success(new HelpdeskStepResource($helpdesk_step), 'update helpdesk step success');
    }
}
