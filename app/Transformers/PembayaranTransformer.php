<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Pembayaran;
use App\Transformers\BaseTransformer;

class PembayaranTransformer extends BaseTransformer
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
    public function transform(Pembayaran $pembayaran)
    {
        $response = [
            'id'                    => self::forId($pembayaran),
            'total_pembayaran'      => $pembayaran->total_pembayaran,
            'status_pembayaran'     => $pembayaran->status_pembayaran,
            'kode_pembayaran'       => $pembayaran->kode_pembayaran,
            'type'                 => $pembayaran->type,
            'info'                 => $pembayaran->info,
            // 'training_subject_id'  => $pembayaran->training_subject_id,
            // 'training_subject'     => $pembayaran->training
        ];
        return $response;
    }

    /** @return string */
    public function getResourceKey(): string
    {
        return 'pembayaran';
    }
}
