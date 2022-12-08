<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    public $description = 'Pembayaran Kos';

    public const PERMISSIONS = [
        'create'        => 'pembayaran create',
        'read'          => 'pembayaran read',
        'update'        => 'pembayan update',
        'delete'        => 'pembayan delete',
    ];

    protected $fillable = [
        'total_pembayaran',
        'status_pembayaran',
        'kode_pembayaran',
    ];   
}
