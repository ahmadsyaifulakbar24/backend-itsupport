<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use Uuids, HasFactory;

    protected $table = 'histories';
    protected $fillable = [
        'helpdesk_step_id',
        'monitoring_id',
        'type',
        'action_by',
        'history'
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'action_by');
    }
}
