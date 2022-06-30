<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpdeskAssigment extends Model
{
    use Uuids, HasFactory;
    
    protected $table = 'helpdesk_assigments';
    protected $fillable = [
        'helpdesk_id',
        'created_by',
        'user_id',
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function helpdesk()
    {
        return $this->belongsTo(Helpdesk::class, 'helpdesk_id');
    }
    public function user ()
    {
        return $this->belongsTo(User::class,  'user_id');
    }

    public function user_created() {
        return $this->belongsTo(User::class, 'created_by');
    }
}
