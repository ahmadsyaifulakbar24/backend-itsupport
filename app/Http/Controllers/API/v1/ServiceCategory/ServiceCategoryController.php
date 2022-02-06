<?php

namespace App\Http\Controllers\API\v1\ServiceCategory;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceCategory\ServiceCategoryResource;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServiceCategoryController extends Controller
{
    public function get_service_category(Request $request) 
    {
        $request->validate([
            'id' => ['nullable', 'exists:service_categories,id'],
            'group_id' => [
                'nullable',
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'service_category_group');
                })
            ]
        ]);

        $message = 'get service category data success';
        if($request->id) {
            $service_category = ServiceCategory::find($request->id);
            return ResponseFormatter::success(new ServiceCategoryResource($service_category), $message);
        } else {
            $service_category = ServiceCategory::query();
            if($request->group_id) {
                $service_category->where('group_id', $request->group_id);
            }
            $result = $service_category->orderBy('order', 'asc')->get();
            return ResponseFormatter::success(ServiceCategoryResource::collection($result), $message);
        }
    }
}
