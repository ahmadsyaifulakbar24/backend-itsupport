<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailName extends Model
{
    use Uuids, HasFactory;

    protected $table = 'email_names';
    protected $fillable = [
        'email_name'
    ];
    public $timestamps = false;
}
