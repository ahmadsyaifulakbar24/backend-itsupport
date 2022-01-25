<?php

namespace App\Http\Controllers\API\v1\History;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\History\HistoryResource;
use App\Models\HelpdeskStep;
use App\Models\Monitoring;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HistoryController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'type' => ['required', 'in:helpdesk_step,monitoring'],
            'helpdesk_step_id' => [
                Rule::requiredIf($request->type == 'helpdesk_step'),
                'exists:helpdesk_steps,id'
            ],
            'monitoring_id' => [
                Rule::requiredIf($request->type == 'monitoring'),
                'exists:monitorings,id'
            ]
        ]);

        if($request->type == 'helpdesk_step') {
            $query = HelpdeskStep::find($request->helpdesk_step_id);
        } else if($request->type == 'monitoring') {
            $query = Monitoring::find($request->monitoring_id);
        }
        return ResponseFormatter::success(HistoryResource::collection($query->history), 'get history data success');
    }
}
