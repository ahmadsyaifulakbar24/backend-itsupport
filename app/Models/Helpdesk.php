<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Helpdesk extends Model
{
    use Uuids, HasFactory;

    protected $table = 'helpdesks';
    protected $fillable = [
        'user_id',
        'ticket_number',
        'service_category_id',
        'titile',
        'email_type_id',
        'from_date',
        'till_date',
        'execution_time',
        'duration',
        'participant_capacity',
        'signature_id',
        'class_type_id',
        'update_type_id',
        'complaint_type_id',
        'description',
        'status'
    ];
}
