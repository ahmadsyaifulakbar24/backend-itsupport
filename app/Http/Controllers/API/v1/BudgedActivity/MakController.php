<?php

namespace App\Http\Controllers\API\v1\BudgedActivity;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Mak\MakResource;
use App\Models\BudgedActivity;
use App\Models\Mak;
use Illuminate\Http\Request;

class MakController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'budged_activity_id' => ['required', 'exists:budged_activities,id'],
            'code_mak' => ['required', 'unique:maks,code_mak'],
            'budged' => ['required', 'integer']
        ]);

        $budged_activity = BudgedActivity::find($request->budged_activity_id);
        $input = $request->all();
        $input['status'] = 'process';

        $mak = $budged_activity->mak()->create($input);
        return ResponseFormatter::success(new MakResource($mak), 'create mak data success');
    }

    
    public function update(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:maks,id'],
        ]);
        $mak = Mak::find($request->id);
        if($mak->monitoring->isNotEmpmty()) {
            return ResponseFormatter::error([
                'message' => 'cannot update this data'
            ], 'update mak data failes');
        } else {
            $request->validate([
                'code_mak' => ['required', 'unique:maks,code_mak,'.$request->id],
                'budged' => ['required', 'integer']
            ]);
            $mak->update($request->all());
            return ResponseFormatter::success(new MakResource($mak), 'update mak data success');
        }

    }
}
