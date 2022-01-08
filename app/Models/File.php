<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use Uuids, HasFactory;

    protected $table = 'files';
    protected $fillable = [
        'helpdesk_id',
        'helpdesk_step_id',
        'monitoring_id',
        'type',
        'file_name',
        'path'
    ];
}
