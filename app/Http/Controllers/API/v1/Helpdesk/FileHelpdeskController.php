<?php

namespace App\Http\Controllers\API\v1\Helpdesk;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\File\FileResource;
use App\Models\Helpdesk;
use Illuminate\Http\Request;

class FileHelpdeskController extends Controller
{
    public function create (Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:helpdesks,id'],
            'type' => ['required', 'in:approval_document,flyer,document,latter'],
            'file' => ['required', 'file']
        ]);

        $Helpdesk = Helpdesk::find($request->id);

        $file_input = $request->file;
        $path = FileHelpers::upload_file('helpdesk', $file_input);
        $file_name = $file_input->getClientOriginalName();
        $file['type'] = $request->type;
        $file['file_name'] = $file_name;
        $file['path'] = $path;
        $result = $Helpdesk->file()->create($file);

        return ResponseFormatter::success(new FileResource($result));
    }
}
