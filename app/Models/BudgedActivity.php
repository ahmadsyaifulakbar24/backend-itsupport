<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgedActivity extends Model
{
    use Uuids, HasFactory;
    
    protected $table = 'budged_activities';
    protected $fillable = [
        'activity_name',
        'category_id',
        'client_id',
        'status'
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function mak()
    {
        return $this->hasMany(Mak::class, 'budged_activity_id');
    }
}
