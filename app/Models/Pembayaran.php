<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    public $description = 'Pembayaran Kos';

    public const PERMISSIONS = [
        'create'        => 'pembayan create',
        'read'          => 'pembayan read',
        'delete'        => 'pembayan delete',
    ];

    protected $fillable = [
        'total_pembayaran',
        'status_pembayan',
        'kode_pembayan',
    ];   
}
