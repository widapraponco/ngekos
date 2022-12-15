<?php

namespace App\Http\Controllers;

use App\Models\PemilikKos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Transformers\PemilikKosTransformer;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Validation\Rule;

class PemilikKosController extends Controller
{

    public function __construct()
    {
        $permissions = PemilikKos::PERMISSIONS;

        $this->middleware('permission:'.$permissions['index'], ['only' => 'index']);
        $this->middleware('permission:'.$permissions['create'], ['only' => 'create']);
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
            QueryBuilder::for(PemilikKos::class)
                ->allowedFilters(['nama_pk', 'email_pk', 'pass_pk'])
                ->paginate(),
            new PemilikKosTransformer()
        );
    }

    /**
     * @OA\Post(
     *     path="/customer/add-new-customer",
     *     summary="Add new customer",
     *     tags={"Customer"},
     *     security={{"passport" : {}}},
     *     @OA\Parameter(
     *         name="include",
     *         in="query",
     *         required=false,
     *         @OA\Schema(
     *             type="array",
     *             @OA\Items(
     *                 type="string",
     *                 enum={"roles", "permissions"},
     *             )
     *         )
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     description="User key",
     *                     property="user_id",
     *                     type="int",
     *                 ),
     *                 @OA\Property(
     *                     description="Role key",
     *                     property="role_id",
     *                     type="int",
     *                 ),
     *                 example={
     *                     "user_id" : "user-at-usercom",
     *                     "role_id" : 1
     *                 }
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Error")
     *         ),
     *     ),
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Spatie\Fractal\Fractal
     * @throws \Illuminate\Validation\ValidationException
     * @api                {post} /customer/add-new-customer Add new customer
     * @apiName            add-customer
     * @apiGroup           Customer
     * @apiVersion         1.0.0
     * @apiPermission      Authenticated User
     * @apiUse             PemilikKosResponse
     * @apiParam {String} user_id User hashed id
     * @apiParam {String} role_id Role hashed id
     *
     */
    public function create(Request $request)
    {
        $attributes = $this->validate(
            $request,
            [
                'nama_pk' => 'required|string',
                'email_pk' => 'required|string',
                'pass_pk' => 'required|string',
            ]
        );

        $user = app(FindUserByRouteKeyAction::class)
            ->execute($attributes['user_id']);

        $user->assignRole($attributes['role_id']);

        return $this->fractal($user->refresh(), new PemilikKosTransformer());
    }
}