<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewMakDetail extends Model
{
    use Uuids,HasFactory;

    protected $table = 'vw_mak_detail';

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function monitoring ()
    {
        return $this->hasMany(Monitoring::class, 'mak_id');
    }
}
