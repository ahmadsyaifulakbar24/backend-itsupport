<?php

namespace App\Http\Controllers\API\v1\Helpdesk\HelpdeskStep;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\File\FileResource;
use App\Models\HelpdeskStep;
use Illuminate\Http\Request;

class FileHelpdeskStepController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:helpdesk_steps,id'],
            'file' => ['required', 'file']
        ]);

        $Helpdesk_step = HelpdeskStep::find($request->id);

        $file_input = $request->file;
        $path = FileHelpers::upload_file('helpdesk_step', $file_input);
        $file_name = $file_input->getClientOriginalName();
        $file['type'] = 'file_support';
        $file['file_name'] = $file_name;
        $file['path'] = $path;
        $result = $Helpdesk_step->file()->create($file);

        return ResponseFormatter::success(new FileResource($result), 'upload file helpdesk step success');
    }
}
