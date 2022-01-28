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

        $param = Param::where('parent_id', $request->eselon1_id)->get();
        return ResponseFormatter::success(ParamResource::collection($param), 'get eselon 2 data success');
    }   

    public function get_email_type(Request $request) {
        return $this->param($request, 'email_type', 'get message data success');
    }

    public function get_signature(Request $request) {
        return $this->param($request, 'signature', 'get signature data success');
    }

    public function get_class_type(Request $request) {
        return $this->param($request, 'class_type', 'get class data success');
    }

    public function get_update_type(Request $request) {
        return $this->param($request, 'update_type', 'get update data success');
    }

    public function get_complaint_type(Request $request) {
        return $this->param($request, 'complaint_type', 'get complaint type data success');
    }

    public function get_category_client(Request $request) {
        return $this->param($request, 'category_client', 'get category client data success');
    }

    public function get_milestone(Request $request) {
        return $this->param($request, 'milestone', 'get milestone data success');
    }

    public function param ($request, $category, $message) {
        $request->validate([
            'id' => [
                'nullable',
                Rule::exists('params', 'id')->where(function($query) use ($category) {
                    return $query->where('category', $category);
                })
            ]
        ]);

        if($request->id){
            $param = Param::find($request->id);
            return ResponseFormatter::success(new ParamResource($param), $message);
        } else {
            $param = Param::where('category', $category)->get();
            return ResponseFormatter::success(ParamResource::collection($param), $message);
        }
    }
}
