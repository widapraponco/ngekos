<?php

/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 11/24/18
 * Time: 3:31 PM
 */

namespace App\Transformers;

use App\Models\Fasilitas;
use App\Transformers\BaseTransformer;

/**
 * @OA\Schema(
 *     schema="UserTransformer",
 *     type="object",
 *     properties={
 *         @OA\Property(property="id", type="string"),
 *         @OA\Property(property="attributes", type="object", properties={
 *
 *             @OA\Property(property="first_name", type="string"),
 *             @OA\Property(property="last_name", type="string"),
 *             @OA\Property(property="email", type="string"),
 *             @OA\Property(property="created_at", type="string"),
 *             @OA\Property(property="created_at_readable", type="string"),
 *             @OA\Property(property="updated_at", type="string"),
 *             @OA\Property(property="updated_at_readable", type="string")
 *
 *         }),
 *         @OA\Property(property="relationships", type="array", @OA\Items({
 *
 *         })),
 *         @OA\Property(property="meta", type="array", @OA\Items({
 *
 *             @OA\Property(property="include", type="array", @OA\Items({
 *             })),
 *         })),
 *     }
 * )
 */
class FasilitasTransformer extends BaseTransformer
{
    protected array $availableIncludes = [
        'roles',
        'permissions',
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
            // 'id' => self::forId($table),
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
