<?php

namespace App\Http\Controllers\API\v1\BudgedActivity\Monitoring;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\File\FileResource;
use App\Http\Resources\Monitoring\MonitoringResouce;
use App\Models\Mak;
use App\Models\Monitoring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class CreateMonitoringController extends Controller
{
    public function create (Request $request)
    {
        $request->validate([
            'mak_id' => ['required', 'exists:maks,id'],
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
        $input['status'] = 'new';

        $mak = Mak::find($request->mak_id);
        
        $result = DB::transaction(function () use ($input, $mak, $request) {
            $monitoring = $mak->monitoring()->create($input);
            $assigments = $this->monitoring_assigments($request->monitoring_assigment);
            $monitoring->users()->sync($assigments);
    
            return ResponseFormatter::success(new MonitoringResouce($monitoring));
        });

        return $result;
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

    public function upload_file(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:monitorings,id'],
            'file' => ['required', 'file']
        ]);

        $monitoring = Monitoring::find($request->id);
        
        $path = FileHelpers::upload_file('monitoring', $request->file);
        $file_name = $request->file->getClientOriginalName();
        $file = [
            'type' => 'support_file',
            'file_name' => $file_name,
            'path' => $path
        ];
        $file = $monitoring->file()->create($file);

        return ResponseFormatter::success(new FileResource($file), 'upload file data success');
    }
}
