<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BudgedActivity extends Model
{
    use Uuids, HasFactory;
    
    protected $table = 'budged_activities';
    protected $fillable = [
        'activity_name',
        'category_id',
        'client_id',
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function scopeBudgedActivityByClient ($query) {
        return $query->select(
            'client_id', 
            DB::raw("COUNT(*) as total")
        )->groupBY('client_id');
    }
    
    public function category () {
        return $this->belongsTo(Param::class, 'category_id');
    }
    
    public function mak()
    {
        return $this->hasMany(Mak::class, 'budged_activity_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
