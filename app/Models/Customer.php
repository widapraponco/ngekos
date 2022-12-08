<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use App\Models\Traits\Auditable;

class Customer extends Model
{
<<<<<<< HEAD
    // use Auditable;
    
    protected $table = 'customer';
    public $description = 'Customer Kos';

=======
>>>>>>> e60db765ee6660a0f4603f97533a6138ddcb084f
    public const PERMISSIONS = [
        'create'        => 'customer create',
        'read'          => 'customer read',
        'update'        => 'customer update',
        'delete'        => 'customer delete',
    ];
<<<<<<< HEAD

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

    // public function periode()
    // {
    //     return $this->belongsTo(\App\Models\Training\TrainingPeriode::class, 'training_periode_id');
    // }

    // public function file()
    // {
    //     return $this->belongsTo(\App\Models\Training\Teaching\TeachingMaterial::class, 'teaching_material_id');
    // }
=======
>>>>>>> e60db765ee6660a0f4603f97533a6138ddcb084f
}
