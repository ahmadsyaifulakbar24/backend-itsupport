<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Param extends Model
{
    use Uuids, HasFactory;

    protected $table = 'params';
    protected $fillable = [
        'parent_id',
        'category',
        'param',
        'alias'
    ];

    public $timestamps = false;
}
