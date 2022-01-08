<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpdeskAssigment extends Model
{
    use Uuids, HasFactory;
    
    protected $table = 'helpdesk_assigments';
    protected $fillabele = [
        'helpdesk_id',
        'user_id'
    ];
}
