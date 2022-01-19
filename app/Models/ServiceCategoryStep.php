<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategoryStep extends Model
{
    use Uuids, HasFactory;

    protected $table = 'service_category_steps';
    protected $fillable = [
        'service_category_id',
        'name',
        'order'
    ];
    
    public $timestamps = false;

    public function helpdesk()
    {
        return $this->belongsToMany(Helpdesk::class, 'helpdesk_steps', 'service_category_step_id', 'helpdesk_id');
    }
}
