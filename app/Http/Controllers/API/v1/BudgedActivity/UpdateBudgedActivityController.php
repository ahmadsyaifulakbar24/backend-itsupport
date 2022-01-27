<?php

namespace App\Http\Controllers\API\v1\BudgedActivity;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\BudgedActivity\BudgedActivityResource;
use App\Models\BudgedActivity;
use App\Models\Param;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateBudgedActivityController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:budged_activities,id'],
            'client_id' => ['required', 'exists:clients,id'],
            'code_mak' => [
                Rule::requiredIf(function() use ($request) {
                    $budged_activity = BudgedActivity::find($request->id);
                    $param = Param::find($budged_activity->category_id);
                    return $param->alias == 'kontraktual';
                }),
                Rule::unique('maks', 'code_mak')->ignore($request->id, 'budged_activity_id')
            ],
            'budged' => [
                Rule::requiredIf(function() use ($request) {
                    $budged_activity = BudgedActivity::find($request->id);
                    $param = Param::find($budged_activity->category_id);
                    return $param->alias == 'kontraktual';
                }),
                'integer',
            ]
        ]);

        $budged_activity = BudgedActivity::find($request->id);
        $param = Param::find($budged_activity->category_id);
        $input = $request->all();
        $budged_activity->update($input);

        if($param->alias == 'kontraktual') {
            $budged_activity->mak()->update([
                'code_mak' => $request->code_mak,
                'budged' => $request->budged
            ]);
        }

        return ResponseFormatter::success(new BudgedActivityResource($budged_activity), 'create budged activity data success');
    }
}
