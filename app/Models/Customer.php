<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public const PERMISSIONS = [
        'create'        => 'customer create',
        'read'          => 'customer read',
        'update'        => 'customer update',
        'delete'        => 'customer delete',
    ];
}
