<?php

/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 11/24/18
 * Time: 3:31 PM
 */

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Fasilitas;
use App\Transformers\BaseTransformer;

class FasilitasTransformer extends BaseTransformer
{
    protected array $availableIncludes = [
    ];

    /**
     * A Fractal transformer.
     *
     * @param  \App\Models\Auth\User\Fasilitas  $table
     *
     * @return array
     */
    public function transform(Fasilitas $table)
    {
        $response = [
            'id' => self::forId($table),
            'nama_fasilitas' => $table->nama_fasilitas,
            'deskripsi' => $table->deskripsi,
            'harga' => $table->harga,
        ];

        $response = $this->filterData(
            $response,
            [

            ]
        );

        // return $this->addTimesHumanReadable($table, $response);
    }

    // public function includeRoles(Fasilitas $table)
    // {
    //     return $this->collection($table->roles, new RoleTransformer());
    // }

    // public function includePermissions(Fasilitas $table)
    // {
    //     return $this->collection($table->permissions, new PermissionTransformer());
    // }

    /** @return string */
    public function getResourceKey(): string
    {
        return 'Fasilitas';
    }
}
