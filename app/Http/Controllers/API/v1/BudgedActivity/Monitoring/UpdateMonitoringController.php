<?php

namespace App\Http\Controllers\API\v1\BudgedActivity\Monitoring;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Monitoring\MonitoringResouce;
use App\Models\Monitoring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class UpdateMonitoringController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:monitorings,id'],
            'name' => ['required', 'string'],
            'milestone_id' => [
                'required',
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'milestone');
                })
            ],
            'start_date' => ['required', 'date'],
            'finish_date' => ['required', 'date'],
            'description' => ['nullable', 'string'],

            'monitoring_assigment' => ['required', 'array'],
            'monitoring_assigment.*.user_id' => ['required', 'exists:users,id'],
        ]);

        $input = $request->all();
        $monitoring = Monitoring::find($request->id);

        $result = DB::transaction(function () use ($input, $monitoring, $request) {
            $monitoring->update($input);
            $assigments = $this->monitoring_assigments($request->monitoring_assigment);
            $monitoring->users()->sync($assigments);
            return ResponseFormatter::success(new MonitoringResouce($monitoring));
        });
        return $result;
    }

    public function update_status(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:monitorings,id'],
            'status' => ['required', 'in:new,process,finish']
        ]);

        $monitoring = Monitoring::find($request->id);
        $monitoring->update([ 'status' => $request->status ]);

        return ResponseFormatter::success(new MonitoringResouce($monitoring), 'update status monitoring data success');
    }

    public function monitoring_assigments($monitoring_assigments)
    {
       foreach ($monitoring_assigments as $monitoring_assigment) {
           $assigments[] = [
               'id' => Str::uuid()->toString(),
               'user_id' => $monitoring_assigment['user_id'],
           ];
       }

       return $assigments;
    }
}
