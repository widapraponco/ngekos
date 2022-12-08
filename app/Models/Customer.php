<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    public $description = 'Customer Kos';

    public const PERMISSIONS = [
        'create'        => 'customer create',
        'read'          => 'customer read',
        'update'        => 'customer update',
        'delete'        => 'customer delete',
    ];

    protected $fillable = [
        'nama_cs',
        'email_cs',
        'pass_cs',
        'foto_cs',
        'alamat_cs',
        'notip_cs',
        'gender',
        'nik'
    ];
}
