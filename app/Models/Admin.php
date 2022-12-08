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
 * @property int $user_id
 * @property string $provider
 * @property string $provider_id
 * @property string|null $token
 * @property string|null $avatar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Auth\User\User $user
 * @method static Builder|SocialAccount newModelQuery()
 * @method static Builder|SocialAccount newQuery()
 * @method static Builder|SocialAccount query()
 * @method static Builder|SocialAccount whereAvatar($value)
 * @method static Builder|SocialAccount whereCreatedAt($value)
 * @method static Builder|SocialAccount whereId($value)
 * @method static Builder|SocialAccount whereProvider($value)
 * @method static Builder|SocialAccount whereProviderId($value)
 * @method static Builder|SocialAccount whereToken($value)
 * @method static Builder|SocialAccount whereUpdatedAt($value)
 * @method static Builder|SocialAccount whereUserId($value)
 * @mixin \Eloquent
 */
{
    protected $fillable = [
        'nama_admin',
        'email',
        'password',
    ];
}
