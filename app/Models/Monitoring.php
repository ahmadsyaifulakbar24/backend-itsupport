<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    use Uuids, HasFactory;

    protected $table = 'monitorings';
    protected $fillable = [
        'mak_id',
        'name',
        'milestone_id',
        'start_date',
        'finish_date',
        'description',
        'status'
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function history()
    {
        return $this->hasMany(History::class, 'monitoring_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'monitoring_assigments', 'monitoring_id', 'user_id');
    }

    public function file()
    {
        return $this->hasMany(File::class, 'monitoring_id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'monitoring_id');
    }

    public function milestone ()
    {
        return $this->belongsTo(Param::class, 'milestone_id');
    }
}
