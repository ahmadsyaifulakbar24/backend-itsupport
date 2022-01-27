<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mak extends Model
{
    use Uuids, HasFactory;
    
    protected $table = 'maks';
    protected $fillable = [
        'budged_activity_id',
        'code_mak',
        'budged',
        'status'
    ];

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
