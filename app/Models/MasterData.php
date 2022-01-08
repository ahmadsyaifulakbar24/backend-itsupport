<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterData extends Model
{
    use Uuids, HasFactory;

    protected $table = 'master_data';
    protected $fillable = [
        'parent_id',
        'category',
        'value'
    ];
    
    public $timestamps = false;
}
