<?php

namespace App\Http\Controllers\API\v1\Helpdesk;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HelpdeskReportController extends Controller
{
    public function total_user_by_eselon1()
    {
        $result = DB::table('vw_total_user_by_eselon1')->get();
        return ResponseFormatter::success($result, 'get total user by eselon 1 success');
    }

    public function total_helpdesk_by_service_category()
    {
        $result = DB::table('vw_total_helpdesk_by_service_category')->get();
        return ResponseFormatter::success($result, 'get total helpdesk by service status success');
    }
}
