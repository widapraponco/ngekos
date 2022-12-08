<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Transformers\CustomerTransformer;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{

    public function __construct()
    {
        $permissions = Customer::PERMISSIONS;

        $this->middleware('permission:'.$permissions['index'], ['only' => 'index']);
        $this->middleware('permission:'.$permissions['create'], ['only' => 'store']);
        $this->middleware('permission:'.$permissions['show'], ['only' => 'show']);
        $this->middleware('permission:'.$permissions['update'], ['only' => 'update']);
        $this->middleware('permission:'.$permissions['destroy'], ['only' => 'destroy']);
    }
    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Spatie\Fractal\Fractal
     * @api                {get} /auth/users Get all users
     * @apiName            get-all-users
     * @apiGroup           User
     * @apiVersion         1.0.0
     * @apiPermission      Authenticated User
     * @apiUse             UsersResponse
     *
     */
    public function index()
    {
        return $this->fractal(
            QueryBuilder::for(Customer::class)
                ->allowedFilters(['nama_cs', 'email_cs', 'pass_cs'])
                ->paginate(),
            new CustomerTransformer()
        );
    }
}
