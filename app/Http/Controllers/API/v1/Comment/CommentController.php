<?php

namespace App\Http\Controllers\API\v1\Comment;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;
use App\Models\HelpdeskStep;
use App\Models\Monitoring;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CommentController extends Controller
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
            ],
        ]);

        if($request->type == 'helpdesk_step') {
            $query = HelpdeskStep::find($request->helpdesk_step_id);
        } else if($request->type == 'monitoring') {
            $query = Monitoring::find($request->monitoring_id);
        }
        $comment = $query->comment;
        return ResponseFormatter::success(CommentResource::collection($comment), 'get comment data success');
    }

    public function create(Request $request)
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
            ],
            'parent_id' => ['nullable', 'exists:comments,id'],
            'comment' => ['required', 'string']
        ]);

        if($request->type == 'helpdesk_step') {
            $query = HelpdeskStep::find($request->helpdesk_step_id);
            $input['type'] = 'helpdesk_step';
            $historyInput['type'] = 'helpdesk_step';
        } else if($request->type == 'monitoring') {
            $query = Monitoring::find($request->monitoring_id);
            $input['type'] = 'monitoring';
            $historyInput['type'] = 'monitoring';
        }

        $input = $request->all();
        $input['user_id'] = $request->user()->id;
        $comment = $query->comment()->create($input);

        $historyInput['action_by'] = $request->user()->id;
        $historyInput['history'] = 'comment';
        $query->history()->create($historyInput);

        return ResponseFormatter::success(new CommentResource($comment), 'create comment success');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:comments,id']
        ]);

        $comment = Comment::find($request->id);
        $comment->delete();

        return ResponseFormatter::success(null, 'delete comment success');
    }
}
