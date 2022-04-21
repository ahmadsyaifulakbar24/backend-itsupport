<?php

namespace App\Http\Controllers\API\v1\BudgedActivity;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\BudgedActivity\BudgedActivityResource;
use App\Models\ViewBudgedActivityDetail;
use Illuminate\Http\Request;

class GetBudgedActivityController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'id' => ['nullable', 'exists:budged_activities,id'],
            'client_id' => ['nullable', 'exists:clients,id'],
            'range' => ['nullable', 'in:<50,50-99,100'],
            'search' => ['nullable', 'string'],
            'limit' => ['nullable', 'integer'],
        ]);
        $limit = $request->input('limit', 10);

        if($request->id) {
            $budged_activity = ViewBudgedActivityDetail::find($request->id);
            return ResponseFormatter::success(new BudgedActivityResource($budged_activity));
        }

        $budged_activity = ViewBudgedActivityDetail::query();
        if($request->client_id) {
            $budged_activity->where('client_id', $request->client_id);
        }

        if($request->range) {
            if($request->range == '<50') {
                $budged_activity->whereBetween('progress', [0, 49]);
            } else if ($request->range == '50-99') {
                $budged_activity->whereBetween('progress', [50, 99.99]);
            } else if($request->range == '100') {
                $budged_activity->where('progress', 100);
            }
        }
        if($request->search) {
            $budged_activity->where('activity_name', 'like', '%'.$request->search.'%');
        }

        $result = $budged_activity->orderBy('created_at', 'desc')->paginate($limit);
        return ResponseFormatter::success(BudgedActivityResource::collection($result)->response()->getData(true), 'get budged activity data success');
    }
}
