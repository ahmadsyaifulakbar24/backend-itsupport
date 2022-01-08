<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    use Uuids, HasFactory;

    protected $table = 'monitorings';
    protected $fillable = [
        'mak_id',
        'name',
        'milestone_id'
    ];
}
