<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Action;

class HelpdeskStep extends Model
{
    use Uuids, HasFactory;

    protected $table = 'helpdesk_steps';
    protected $fillable = [
        'helpdesk_id',
        'service_category_step_id',
        'status',
        'description',
        'finish_date'
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getFinishDateAttribute($date) {
        return ($date) ? Carbon::parse($date)->format('Y-m-d H:i:s') : null;
    }
    
    public function helpdesk()
    {
        return $this->belongsTo(Helpdesk::class, 'helpdesk_id');
    }

    public function service_category_step()
    {
        return $this->belongsTo(ServiceCategoryStep::class, 'service_category_step_id')->orderBy('order', 'asc');
    }

    public function history()
    {
        return $this->hasMany(History::class, 'helpdesk_step_id');
    }

    public function file()
    {
        return $this->hasMany(File::class, 'helpdesk_step_id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'helpdesk_step_id');
    }
}
