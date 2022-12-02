<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $table = 'fasilitas';
    public $description = 'Fasilitas';

    public const PERMISSIONS = [
        'create'        => 'fasilitas create',
        'read'          => 'fasilitas read',
        'update'        => 'fasilitas update',
        'delete'        => 'fasilitas delete',
    ];

    protected $fillable = [
        'nama_fasilitas',
        'deskripsi',
        'harga',

    ];

    // public function periode()
    // {
    //     return $this->belongsTo(\App\Models\Training\TrainingPeriode::class, 'training_periode_id');
    // }

    // public function file()
    // {
    //     return $this->belongsTo(\App\Models\Training\Teaching\TeachingMaterial::class, 'teaching_material_id');
    // }
}
