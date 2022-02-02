<?php

namespace App\Http\Controllers\API\v1\BudgedActivity;

use App\Http\Controllers\Controller;
use App\Models\ViewMonitoringDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BudgedActivityReportController extends Controller
{
    public function milestone_schedule(Request $request)
    {
        $this->validateForm($request);
        return ViewMonitoringDetail::milestone($request->mak_id)->get();
    }

    public function total_milestone_by_status(Request $request) {
        $this->validateForm($request);
        return ViewMonitoringDetail::totalMilestoneByStatus($request->mak_id)->get();
    }

    public function validateForm(Request $request)
    {
        $request->validate([
            'mak_id' => ['required', 'exists:maks,id'],
        ]);
    }
}
