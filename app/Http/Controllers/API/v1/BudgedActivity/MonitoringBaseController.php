<?php

namespace App\Http\Controllers\API\v1\BudgedActivity;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\MonitoringBase;
use Illuminate\Http\Request;

class MonitoringBaseController extends Controller
{
    public function budged(Request $request)
    {
        $request->validate([
            'total_budged' => ['required', 'integer']
        ]);

        $MonitoringBase = MonitoringBase::where('slug', 'total_budged')->first();
        $MonitoringBase->update([
            'total_budged' => $request->total_budged
        ]);
        return ResponseFormatter::success($MonitoringBase, 'update total budged data success');
    }

}
