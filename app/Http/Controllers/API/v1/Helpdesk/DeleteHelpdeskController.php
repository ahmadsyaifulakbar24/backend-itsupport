<?php

namespace App\Http\Controllers\API\v1\Helpdesk;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Helpdesk;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class DeleteHelpdeskController extends Controller
{
    public function __invoke(Request $request) 
    {
        $request->validate([
            'id' => ['required', 'exists:helpdesks,id']
        ]);

        $helpdesk = Helpdesk::find($request->id);
        if($helpdesk->status == 'pending') {
            $result = $helpdesk->delete();
            if($result) {
                return ResponseFormatter::success(null, 'delete helpdesk success');
            } else {
                return ResponseFormatter::error(null, 'error delete this helpdesk');
            }
        } else {
            return ResponseFormatter::error(null, 'cannot delete this helpdesk');
        }
    }
}
