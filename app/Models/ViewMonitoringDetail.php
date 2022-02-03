<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ViewMonitoringDetail extends Model
{
    use Uuids, HasFactory;

    protected $table = 'vw_monitoring_detail';

    public function scopeMilestone($query, $mak_id)
    {
        return $query->select(
            'milestone_id',
            'param',
            DB::raw('MIN(start_date) as min_date, MAX(finish_date) as max_date')
        )->where('mak_id', $mak_id)->orWhereNull('mak_id')->groupBy('param');
    }

    public function scopeTotalMilestoneByStatus($query, $mak_id)
    {
        $query->select(
            'milestone_id', 
            'param',
            'status',
            DB::raw("IF(status IS NULL, 0, COUNT(CASE WHEN status = 'new' THEN 1 END))  as new"),
            DB::raw("IF(status IS NULL, 0, COUNT(CASE WHEN status = 'process' THEN 1 END))  as process"),
            DB::raw("IF(status IS NULL, 0, COUNT(CASE WHEN status = 'finish' THEN 1 END))  as finish"),
        )->where('mak_id', $mak_id) ->orWhereNull('mak_id') ->groupBy('param');
    }

    public function scopeJobTimeline($query, $mak_id)
    {
        $query->select(
            DB::raw("round((SUM(progress) / (count(*) * 100) * 100), 2) as total_process"),
            DB::raw("MIN(start_date) as min_daate, MAX(finish_date) as max_date")
        )->where('mak_id', $mak_id);
    }
}
