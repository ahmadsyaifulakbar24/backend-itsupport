<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use Uuids, HasFactory;

    protected $table = 'service_categories';
    protected $fillable = [
        'category',
        'alias',
        'group_id',
        'order'
    ];
    
    public $timestamps = false;

    public function service_category_step()
    {
        return $this->hasMany(ServiceCategoryStep::class, 'service_category_id');
    }

    public function group()
    {
        return $this->belongsTo(Param::class, 'group_id');
    }
}
