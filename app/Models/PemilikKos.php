<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemilikKos extends Model
{
    protected $table = 'pemilik kos';
    public $description = 'pemilik kos';

    public const PERMISSIONS = [
        'create'        => 'pemilik kos create',
        'read'          => 'pemilik kos read',
        'update'        => 'pemilik kos update',
        'delete'        => 'pemilik kos delete',
    ];

    protected $fillable = [
        'nama_pk',
        'email_pk',
        'pass_pk',
        'foto_pk',
        'alamat_pk',
        'notip_pk',
        'jenis_kelamin',
        'nik'
    ];
}