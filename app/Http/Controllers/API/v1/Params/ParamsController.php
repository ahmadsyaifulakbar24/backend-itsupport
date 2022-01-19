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
        $request->validate([
            'id' => [
                'nullable',
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'email_type');
                })
            ]
        ]);

        $message = 'get message data success';
        if($request->id){
            $param = Param::find($request->id);
            return ResponseFormatter::success(new ParamResource($param), $message);
        } else {
            $param = Param::where('category', 'email_type')->get();
            return ResponseFormatter::success(ParamResource::collection($param), $message);
        }
    }

    public function get_signature(Request $request) {
        $request->validate([
            'id' => [
                'nullable',
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'signature');
                })
            ]
        ]);

        $message = 'get signature data success';
        if($request->id){
            $param = Param::find($request->id);
            return ResponseFormatter::success(new ParamResource($param), $message);
        } else {
            $param = Param::where('category', 'signature')->get();
            return ResponseFormatter::success(ParamResource::collection($param), $message);
        }
    }

    public function get_class_type(Request $request) {
        $request->validate([
            'id' => [
                'nullable',
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'class_type');
                })
            ]
        ]);

        $message = 'get class type data success';
        if($request->id){
            $param = Param::find($request->id);
            return ResponseFormatter::success(new ParamResource($param), $message);
        } else {
            $param = Param::where('category', 'class_type')->get();
            return ResponseFormatter::success(ParamResource::collection($param), $message);
        }
    }

    public function get_update_type(Request $request) {
        $request->validate([
            'id' => [
                'nullable',
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'update_type');
                })
            ]
        ]);

        $message = 'get update type data success';
        if($request->id){
            $param = Param::find($request->id);
            return ResponseFormatter::success(new ParamResource($param), $message);
        } else {
            $param = Param::where('category', 'update_type')->get();
            return ResponseFormatter::success(ParamResource::collection($param), $message);
        }
    }

    public function get_complaint_type(Request $request) {
        $request->validate([
            'id' => [
                'nullable',
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'complaint_type');
                })
            ]
        ]);

        $message = 'get complaint type data success';
        if($request->id){
            $param = Param::find($request->id);
            return ResponseFormatter::success(new ParamResource($param), $message);
        } else {
            $param = Param::where('category', 'complaint_type')->get();
            return ResponseFormatter::success(ParamResource::collection($param), $message);
        }
    }
}
