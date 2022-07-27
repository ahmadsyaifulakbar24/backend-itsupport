<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonitoringAssigment extends Model
{
    use Uuids, HasFactory;

    protected $table = 'monitoring_assigments';
    protected $fillable = [
        'monitoring_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
