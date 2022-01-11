<?php

namespace App\Http\Controllers\API\v1\Params;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Params\ParamResource;
use App\Models\Param;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ParamsController extends Controller
{
    public function get_eselon1() {
        $param = Param::where('category', 'eselon1')->get();
        return ResponseFormatter::success(ParamResource::collection($param), 'get eselon 1 data success');
    }

    public function get_eselon2(Request $request) {
        $request->validate([
            'eselon1_id' => [
                'required',
                Rule::exists('params', 'id')->where(function ($query) {
                    return $query->where('category', 'eselon1');
                })
            ],
        ]);

        return $param = Param::where('parent_id', $request->eselon1_id)->get();
        return ResponseFormatter::success(ParamResource::collection($param), 'get eselon 2 data success');
    }
}
