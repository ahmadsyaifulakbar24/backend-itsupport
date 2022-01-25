<?php

namespace App\Http\Controllers\API\v1\Helpdesk\HelpdeskStep;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Helpdesk\HelpdeskStep\HelpdeskStepDetailResource;
use App\Models\HelpdeskStep;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class GetHelpdeskStepController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:helpdesk_steps,id'],
        ]);

        $helpdesk_step = HelpdeskStep::find($request->id);
        return ResponseFormatter::success(new HelpdeskStepDetailResource($helpdesk_step), 'get helpdesk step data success');
    }
}
