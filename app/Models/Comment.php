<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use Uuids, HasFactory;

    protected $table = 'comments';
    protected $fillable = [
        'helpdesk_step_id',
        'monitoring_id',
        'type',
        'user_id',
        'parent_id',
        'comment'
    ];
}
