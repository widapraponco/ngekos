<?php

namespace App\Transformers;

use App\Models\Customer;
use League\Fractal\TransformerAbstract;

class CustomerTransformer extends TransformerAbstract
{

    protected array $defaultIncludes = [];
    protected array $availableIncludes = [];
    
    public function transform(Customer $customer)
    {
        $response = [
            //
        ];
        return $response;
    }

    public function getResourceKey(): string
    {
        return 'customer';
    }
}
