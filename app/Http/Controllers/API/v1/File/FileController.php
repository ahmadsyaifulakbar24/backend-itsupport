<?php

namespace App\Http\Controllers\API\v1\File;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\File\FileResource;
use App\Models\File;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class FileController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'id' => ['nullable', 'exists:files,id'], 
            'type' => [
                Rule::requiredIf(empty($request->id)), 
                'in:helpdesk,helpdesk_step,monitoring'
            ],
            'helpdesk_id' => [
                Rule::requiredIf($request->type == 'helpdesk'),
                'exists:helpdesks,id'
            ],
            'helpdesk_step_id' => [
                Rule::requiredIf($request->type == 'helpdesk_step'),
                'exists:helpdesk_steps,id'
            ],
            'monitoring_id' => [
                Rule::requiredIf($request->type == 'monitoring'),
                'exists:monitorings,id'
            ],
        ]);

        $message = 'get file data success';
        if($request->file) {
            $file = File::find($request->file);
            return ResponseFormatter::success(new FileResource($file), $message);
        }

        $file = File::query();
        if($request->type == 'helpdesk') {
            $file->where('helpdesk_id', $request->helpdesk_id);
        } else if($request->type == 'helpdesk_step') {
            $file->where('helpdesk_step_id', $request->helpdesk_step_id);
        } else if($request->type == 'monitoring') {
            $file->where('monitoring_id', $request->monitoring_id);
        }

        return ResponseFormatter::success(FileResource::collection($file->get()), $message);
    }

    public function destroy(Request $request)
    {
        $request->validate([ 'id' => ['required', 'exists:files,id'] ]);
        $file = File::find($request->id);
        try {
            Storage::disk('public')->delete($file->path);
            $file->delete();
            return ResponseFormatter::success(null, 'detele file success');
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'message' => $e->getMessage(),
            ], 'delete file failed');
        }
    }
}
