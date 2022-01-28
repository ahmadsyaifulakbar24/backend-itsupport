<?php

namespace App\Http\Controllers\API\v1\BudgedActivity\Monitoring;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Monitoring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteMonitoringController extends Controller
{
    public function delete(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:monitorings,id']
        ]);

        $monitoring = Monitoring::find($request->id);
        foreach($monitoring->file as $file) {
            Storage::disk('public')->delete($file->path);
        }
        $monitoring->delete();
        return ResponseFormatter::success(null, 'delete monitoring data success');
    }
}
