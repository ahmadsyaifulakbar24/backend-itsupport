<?php

namespace App\Http\Controllers\API\v1\File;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\File;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    
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
