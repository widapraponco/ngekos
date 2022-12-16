<?php

/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 11/24/18
 * Time: 3:31 PM
 */

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Kos;
use App\Transformers\BaseTransformer;

class KosTransformer extends TransformerAbstract
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
     * @param  \App\Models\Auth\User\Kos  $table
     *
     * @return array
     */
    public function transform()
    {
        $response = [
            
        ];
        
        // return $this->addTimesHumanReadable($table, $response);

    }
     // public function includeRoles(Kos $table)
    // {
    //     return $this->collection($table->roles, new RoleTransformer());
    // }

    // public function includePermissions(Kos $table)
    // {
    //     return $this->collection($table->permissions, new PermissionTransformer());
    // }

    /** @return string */
    public function getResourceKey(): string
    {
        return 'Kos';
    }
}
