<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use Uuids, HasFactory;

    protected $table = 'files';
    protected $fillable = [
        'helpdesk_id',
        'helpdesk_step_id',
        'monitoring_id',
        'type',
        'file_name',
        'path'
    ];

    protected $appends = [
        'path_url'
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }
    
    public function helpdesk()
    {
        return $this->belongsTo(Helpdesk::class, 'helpdesk_id');
    }

    public function getPathUrlAttribute()
    {
        return url('') . Storage::url($this->attributes['path']);
    }
}
