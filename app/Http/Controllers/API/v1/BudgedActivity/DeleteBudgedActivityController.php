<?php

namespace App\Http\Controllers\API\v1\BudgedActivity;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\BudgedActivity;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class DeleteBudgedActivityController extends Controller
{
    public function delete(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:budged_activities,id']
        ]);
        
        $budged_activity = BudgedActivity::find($request->id);
        $should_delete = true;

        foreach($budged_activity->mak as $mak) {
            if($mak->monitoring->isNotEmpty()) {
                $should_delete = false;
                break;
            }
        }

        if($should_delete) {
            $budged_activity->delete();
            return ResponseFormatter::success(null, 'delete budged activity data success');
        } else {
            return ResponseFormatter::error([
                'message' => 'cannot delete this data'
            ], 'delete budged activity data failed');
        }
    }
}
