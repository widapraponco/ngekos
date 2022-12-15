<?php

namespace App\Transformers;

use App\Models\PemilikKos;
use League\Fractal\TransformerAbstract;
use App\Transformers\BaseTransformer;

class PemilikKosTransformer extends BaseTransformer
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
    public function transform(PemilikKos $pemilikkos)
    {
        $response = [
            'id' => self::forId($pemilikkos),
            'nama_pk' => $pemilikkos->nama_cs,
            'email_pk' => $pemilikkos->email_cs,
            'pass_pk' => $pemilikkos->pass_cs,
            'foto_pk' => $pemilikkos->foto_cs,
            'alamat_pk' => $pemilikkos->alamat_cs,
            'notip_pk' => $pemilikkos->notip_cs,
        ];
        return $response;
    }

    /** @return string */
    public function getResourceKey(): string
    {
        return 'pemilikkos';
    }
}