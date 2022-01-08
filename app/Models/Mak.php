<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mak extends Model
{
    use Uuids, HasFactory;
    
    protected $table = 'maks';
    protected $fillable = [
        'budged_activity_id',
        'coba_mak',
        'budged'
    ];
}
