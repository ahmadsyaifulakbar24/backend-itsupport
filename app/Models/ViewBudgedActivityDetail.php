<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewBudgedActivityDetail extends Model
{
    use Uuids, HasFactory;

    protected $table = 'vw_budged_activity_detail';

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function category () {
        return $this->belongsTo(Param::class, 'category_id');
    }
    
    public function mak()
    {
        return $this->hasMany(Mak::class, 'budged_activity_id');
    }
}
