<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgedActivity extends Model
{
    use Uuids, HasFactory;
    
    protected $table = 'budged_activities';
    protected $fillable = [
        'activity_name',
        'category_id',
        'client_id',
        'status'
    ];
}
