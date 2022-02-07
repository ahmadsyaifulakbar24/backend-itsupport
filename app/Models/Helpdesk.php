<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'integration_of',
        'integration_to',
        'from_date',
        'till_date',
        'participant_capacity',
        'signature',
        'zoom_option',
        'zoom_link',
        'presence',
        'class_type_id',
        'update_type_id',
        'complaint_type_id',
        'koperasi_name',
        'nik_koperasi',
        'domain_name',
        'ip_address',
        'need_hosting',
        'ram',
        'size',
        'os',
        'processor',
        'total_vm',
        'ip_public',
        'file_sharing_type',
        'needs',
        'total_user',
        'email_admin',
        'location',
        'aplication_name',
        'description',
        'status'
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function file()
    {
        return $this->hasMany(File::class, 'helpdesk_id');
    }
    
    public function service_category_step()
    {
        return $this->belongsToMany(ServiceCategoryStep::class, 'helpdesk_steps', 'helpdesk_id', 'service_category_step_id')->withPivot('id', 'status', 'description');
    }

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function helpdesk_assigment()
    {
        return $this->hasMany(HelpdeskAssigment::class, 'helpdesk_id');
    }

    public function service_category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function helpdesk_step()
    {
        return $this->hasMany(HelpdeskStep::class, 'helpdesk_id')
            ->join('service_category_steps as b', 'b.id', '=', 'helpdesk_steps.service_category_step_id')
            ->select('helpdesk_steps.*', 'b.name', 'b.order');
    }

    public function email_type()
    {
        return $this->belongsTo(Param::class, 'email_type_id');
    }

    public function class_type()
    {
        return $this->belongsTo(Param::class, 'class_type_id');
    }

    public function update_type()
    {
        return $this->belongsTo(Param::class, 'update_type_id');
    }

    public function complaint_type()
    {
        return $this->belongsTo(Param::class, 'complaint_type_id');
    }

    public function email_name()
    {
        return $this->hasMany(EmailName::class, 'helpdesk_id');
    }
}
