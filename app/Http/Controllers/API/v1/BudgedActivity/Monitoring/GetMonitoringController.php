<?php

namespace App\Http\Controllers\API\v1\BudgedActivity\Monitoring;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Monitoring\MonitoringDetailresource;
use App\Http\Resources\Monitoring\MonitoringResouce;
use App\Models\Monitoring;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GetMonitoringController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'id' => ['nullable', 'exists:monitorings,id'],
            'mak_id' => [
                Rule::requiredIf(empty($request->id)), 
                'exists:maks,id'
            ],
            'status' => ['nullable', 'in:new,process,finish'],
        ]);

        $message = 'get monitoring data success';
        if($request->id) {
            $monitoring = Monitoring::find($request->id);
            return ResponseFormatter::success(new MonitoringDetailresource($monitoring), $message);
        }

        $monitoring = Monitoring::query();
        if($request->mak_id)
        {
            $monitoring->where('mak_id', $request->mak_id);
        }

        if($request->status)
        {
            $monitoring->where('status', $request->status);
        }

        return ResponseFormatter::success(MonitoringResouce::collection($monitoring->get()), $message);
    }
}
