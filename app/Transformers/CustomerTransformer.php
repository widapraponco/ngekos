<?php

namespace App\Transformers;

use App\Models\Customer;
use League\Fractal\TransformerAbstract;
use App\Transformers\BaseTransformer;

class CustomerTransformer extends BaseTransformer
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
    public function transform(Customer $customer)
    {
        $response = [
            'id' => self::forId($customer),
            'nama_cs' => $customer->nama_cs,
            'email_cs' => $customer->email_cs,
            'pass_cs' => $customer->pass_cs,
            'foto_cs' => $customer->foto_cs,
            'alamat_cs' => $customer->alamat_cs,
            'notip_cs' => $customer->notip_cs,
        ];
        return $response;
    }

    /** @return string */
    public function getResourceKey(): string
    {
        return 'customer';
    }
}
