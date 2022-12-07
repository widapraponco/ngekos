<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kos extends Model
{
    protected $table = 'kos';
    public $description = 'kos';

    public const PERMISSIONS = [
        'create'        => 'kos create',
        'read'          => 'kos read',
        'update'        => 'kos update',
    ];
}
