<?php

namespace App\Http\Controllers\API\v1\BudgedActivity;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Mak\MakResource;
use App\Models\BudgedActivity;
use App\Models\Mak;
use App\Models\ViewMakDetail;
use Illuminate\Http\Request;

class MakController extends Controller
{
    public function get (Request $request)
    {
        $request->validate([
            'id' => ['nullable', 'exists:maks,id'],
            'budged_activity_id' => ['nullable', 'exists:budged_activities,id'],
            'search' => ['nullable', 'string'],
            'limit' => ['nullable', 'integer']
        ]);
        $limit = $request->input('limit', 10);

        if($request->id) {
            $mak = ViewMakDetail::find($request->id);
            return ResponseFormatter::success(new MakResource($mak), 'get mak data success');
        }

        
        $mak = ViewMakDetail::query();
        if($request->budged_activity_id) {
            $mak->where('budged_activity_id', $request->budged_activity_id);
        }

        if($request->search) {
            $mak->where('code_mak', 'like', '%'.$request->search.'%');
        }

        return ResponseFormatter::success(MakResource::collection($mak->orderBy('created_at', 'desc')->paginate($limit))->response()->getData(true), 'get mak data success');
    }

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
        if($mak->monitoring->isNotEmpty()) {
            return ResponseFormatter::error([
                'message' => 'cannot update this data'
            ], 'update mak data failed');
        } else {
            $request->validate([
                'code_mak' => ['required', 'unique:maks,code_mak,'.$request->id],
                'budged' => ['required', 'integer']
            ]);
            $mak->update($request->all());
            return ResponseFormatter::success(new MakResource($mak), 'update mak data success');
        }

    }

    public function delete (Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:maks,id'],
        ]);
        $mak = Mak::find($request->id);
        if($mak->monitoring->isNotEmpty()) {
            return ResponseFormatter::error([
                'message' => 'cannot delete this data'
            ], 'delete mak data failed');
        } else {
            $mak->delete();
            return ResponseFormatter::success(null, 'delete mak data success');
        }
    }
}
