<?php

namespace App\Http\Controllers\API\v1\ServiceCategory;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceCategory\ServiceCategoryResource;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    public function get_service_category(Request $request) 
    {
        $request->validate([
            'id' => ['nullable', 'exists:service_categories,id']
        ]);

        $message = 'get service category data success';
        if($request->id) {
            $service_category = ServiceCategory::find($request->id);
            return ResponseFormatter::success(new ServiceCategoryResource($service_category), $message);
        } else {
            $service_category = ServiceCategory::orderBy('alias', 'asc')->get();
            return ResponseFormatter::success(ServiceCategoryResource::collection($service_category), $message);
        }
    }
}
