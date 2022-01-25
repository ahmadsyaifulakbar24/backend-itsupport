<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpdeskStep extends Model
{
    use Uuids, HasFactory;

    protected $table = 'helpdesk_steps';
    protected $fillable = [
        'helpdesk_id',
        'service_category_step_id',
        'status',
        'description'
    ];

    public function service_category_step()
    {
        return $this->belongsTo(ServiceCategoryStep::class, 'service_category_step_id')->orderBy('order', 'asc');
    }
}
