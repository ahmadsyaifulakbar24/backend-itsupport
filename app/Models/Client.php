<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use Uuids, HasFactory;

    protected $table = 'clients';
    protected $fillable = [
        'name',
        'category_id'
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function scopeJoinCategory($query)
    {
        return $query->join('params as b', 'b.id', '=', 'clients.category_id')
            ->select('clients.*', 'b.param as category', 'b.alias');
    }

    public function budged_activity()
    {
        return $this->hasMany(BudgedActivity::class, 'client_id');
    }
}
