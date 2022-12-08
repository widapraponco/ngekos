<?php

declare(strict_types=1);


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Admin extends Model


/**
 * App\Models\Auth\User\SocialAccount
 *
 * @property int $id
 * @property int $nama_admin
 * @property string $email
 * @property string $password
 * @mixin \Eloquent
 */
{
    protected $table = 'admin';
    public $description = 'data admin';

    public const PERMISSIONS = [
        'create'        => 'admin create',
        'read'          => 'admin read',
        'update'        => 'admin update',
        'delete'        => 'admin delete',
    ];

    protected $fillable = [
        'nama_admin',
        'email',
        'password',
    ];
}
