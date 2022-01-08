<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use Uuids, HasFactory;

    protected $table = 'clients';
    protected $fillable = [
        'name',
        'category_id'
    ];
}
