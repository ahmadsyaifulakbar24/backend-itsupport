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
        'title',
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

    public function file()
    {
        return $this->hasMany(File::class, 'helpdesk_id');
    }

    public function helpdesk_step() 
    {
        return $this->hasMany(HelpdeskStep::class, 'helpdesk_id');
    }

    public function helpdesk_step_many()
    {
        return $this->belongsToMany(ServiceCategoryStep::class, 'helpdesk_steps', 'helpdesk_id', 'service_category_step_id');
    }
}
