<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Admin;
use App\Transformers\BaseTransformer;

class AdminTransformer extends BaseTransformer
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Admin $admin)
    {
        $response = [
            'id'                    => self::forId($admin),
            'nama_admin'            => $admin->nama_admin,
            'email'                 => $admin->email,
            'password'              => $admin->password,
        ];
        return $response;
    }

    /** @return string */
    public function getResourceKey(): string
    {
        return 'admin';
    }
}
