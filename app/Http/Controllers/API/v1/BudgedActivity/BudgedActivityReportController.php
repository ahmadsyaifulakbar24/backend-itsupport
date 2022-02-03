<?php

namespace App\Http\Controllers\API\v1\BudgedActivity;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\BudgedActivity\Report\TotalBudgedActivityByClientResouce;
use App\Models\BudgedActivity;
use App\Models\Monitoring;
use App\Models\ViewMonitoringDetail;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BudgedActivityReportController extends Controller
{
    public function milestone_schedule(Request $request)
    {
        $this->validateForm($request);
        $result = ViewMonitoringDetail::milestone($request->mak_id)->get();
        return ResponseFormatter::success($result, 'get milestone schedule success');
    }

    public function total_milestone_by_status(Request $request) {
        $this->validateForm($request);
        $result = ViewMonitoringDetail::totalMilestoneByStatus($request->mak_id)->get();
        return ResponseFormatter::success($result, 'get total milestone by status success');
    }

    public function total_monitoring(Request $request) {
        $this->validateForm($request);
        $total_monitoring = Monitoring::where('mak_id', $request->mak_id)->count();
        return ResponseFormatter::success($total_monitoring, 'get total monitoring success');
    }

    public function job_timeline(Request $request)
    {
        $this->validateForm($request);
        $result = ViewMonitoringDetail::jobTimeline($request->mak_id)->first();
        return ResponseFormatter::success($result, 'get job_timeline data success');
    }
    
    public function budged_statistics()
    {
        $result = DB::table('vw_budged_statistics')->first();
        return ResponseFormatter::success($result, 'get budged statistics data success');
    }

    public function budged_activity_by_client()
    {
        $budged_activity = BudgedActivity::budgedActivityByClient()->get();
        return ResponseFormatter::success(TotalBudgedActivityByClientResouce::collection($budged_activity), 'success get total budged acctivity by client');
    }

    public function total_budged_activity_by_range() {
        $result = DB::table('vw_total_budged_activity_by_range')->first();
        return ResponseFormatter::success($result, 'get total budged activity by rang data success');
    }

    public function validateForm(Request $request)
    {
        $request->validate([
            'mak_id' => ['required', 'exists:maks,id'],
        ]);
    }    
}
