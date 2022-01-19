<?php

namespace App\Http\Controllers\API\v1\Helpdesk;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Helpdesk\HelpdeskDetailResource;
use App\Http\Resources\Helpdesk\HelpdeskResource;
use App\Models\Helpdesk;
use Illuminate\Http\Request;

class GetHelpdeskController extends Controller
{
    public function get_helpdesk(Request $request)
    {
        $request->validate([
            'id' => ['nullable', 'exists:helpdesks,id'],
            'ticket_number' => ['nullable', 'exists:helpdesks,ticket_number'],
            'user_id' => ['nullable', 'exists:users,id'],
            'search' => ['nullable', 'string'],
            'limit' => ['nullable', 'numeric']
        ]);

        $message = 'get helpdesk data success';
        if($request->id || $request->ticket_number) {
            if($request->id) {
                $helpdesk = Helpdesk::find($request->id);
            } else if($request->ticket_number) {
                $helpdesk = Helpdesk::where('ticket_number', $request->ticket_number)->first();
            }
            return ResponseFormatter::success(new HelpdeskDetailResource($helpdesk), $message);
        } else {
            $limit = $request->input('limit', 10);
            $helpdesk = Helpdesk::query();
            if($request->user_id) {
                $helpdesk->where('user_id', $request->user_id);
            }

            if($request->search) {
                $helpdesk->where('title', 'like', '%'. $request->search .'%');
            }
            return ResponseFormatter::success(HelpdeskResource::collection($helpdesk->paginate($limit))->response()->getData(true), $message);
        }

    }
}
