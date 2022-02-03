<?php

namespace App\Http\Controllers\API\v1\BudgedActivity;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\BudgedActivity\BudgedActivityResource;
use App\Models\BudgedActivity;
use App\Models\ViewBudgedActivityDetail;
use Illuminate\Http\Request;

class GetBudgedActivityController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'id' => ['nullable', 'exists:budged_activities,id'],
            'search' => ['nullable', 'string'],
            'limit' => ['nullable', 'integer'],
        ]);
        $limit = $request->input('limit', 10);

        if($request->id) {
            $budged_activity = ViewBudgedActivityDetail::find($request->id);
            return ResponseFormatter::success(new BudgedActivityResource($budged_activity));
        }

        $budged_activity = ViewBudgedActivityDetail::query();
        if($request->search) {
            $budged_activity->where('activity_name', 'like', '%'.$request->search.'%');
        }

        return ResponseFormatter::success(BudgedActivityResource::collection($budged_activity->paginate($limit))->response()->getData(true), 'get budged activity data success');
    }
}
