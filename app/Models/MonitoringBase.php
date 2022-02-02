<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonitoringBase extends Model
{
    use Uuids, HasFactory;

    protected $table = 'monitoring_bases';
    protected $fillable = [
        'slug',
        'total_budged'
    ];

    public $timestamps = false;
}
