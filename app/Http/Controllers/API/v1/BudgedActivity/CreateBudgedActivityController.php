<?php

namespace App\Http\Controllers\API\v1\BudgedActivity;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\BudgedActivity\BudgedActivityResource;
use App\Models\BudgedActivity;
use App\Models\Param;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CreateBudgedActivityController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'category_id' => [
                'required',
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'category_client');
                })
            ],
        ]);

        $param = Param::find($request->category_id);
        $request->validate([
            'activity_name' => ['required', 'string'],
            'client_id' => ['required', 'exists:clients,id'],
            'code_mak' => [
                Rule::requiredIf(function() use ($param) {
                    return $param->alias == 'kontraktual';
                }),
                'unique:maks,code_mak'
            ],
            'budged' => [
                Rule::requiredIf(function() use ($param) {
                    return $param->alias == 'kontraktual';
                }),
                'integer',
            ]
        ]);

        $input = $request->all();
        $budged_activity = BudgedActivity::create($input);
        if($param->alias == 'kontraktual') {
            $budged_activity->mak()->create([
                'code_mak' => $request->code_mak,
                'budged' => $request->budged,
                'status' => 'process',
            ]);
        }
        return ResponseFormatter::success(new BudgedActivityResource($budged_activity), 'create budged activity data success');
    }
}
