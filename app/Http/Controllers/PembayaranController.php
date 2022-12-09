<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Transformers\PembayaranTransformer;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Validation\Rule;

class PembayaranController extends Controller
{
    public function __construct()
    {
        $pembayaran = Pembayaran::PERMISSIONS;
        $this->middleware('permission:'.$pembayaran['index'], ['only' => 'index']);
        $this->middleware('permission:'.$pembayaran['create'], ['only' => 'store']);
        $this->middleware('permission:'.$pembayaran['show'], ['only' => 'show']);
        $this->middleware('permission:'.$pembayaran['update'], ['only' => 'update']);
        $this->middleware('permission:'.$pembayaran['destroy'], ['only' => 'destroy']);
    }

    

    /**
     * 
     * 
     * @param  string  $id
     *
     * @return \Spatie\Fractal\Fractal
     * @api                {get} /pembayaran/{id} Show user
     * @apiName            show-pembayaran
     * @apiGroup           Pembayaran
     * @apiVersion         1.0.0
     * @apiPermission      Authenticated User
     * @apiUse             PembayaranResponse
     *
     */
    public function show(string $id)
    {
        return $this->fractal(
            app(FindUserByRouteKeyAction::class)->execute($id, throw404: true),
            new PembayaranTransformer()
        );
    }

    /**
     * @OA\Post(
     *     path="/pembayaran/add-pembayaran",
     *     summary="Add Pembayaran",
     *     tags={"Pembayaran"},
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
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     * @api                {post} /pembayaran/add-pembayaran Add pembayaran
     * @apiName            add-pembayaran
     * @apiGroup           Pembayaran
     * @apiVersion         1.0.0
     * @apiPermission      Authenticated User
     * @apiUse             PembayaranCreatedResponse
     * @apiParam {String} first_name (required)
     * @apiParam {String} last_name (required)
     * @apiParam {String} email (required)
     * @apiParam {String} password (required)
     *
     */
    public function store(Request $request)
    {
        $attributes = $this->validate(
            $request,
            [
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
            ]
        );

        return $this->fractal(
            app(CreateUserAction::class)->execute($attributes),
            new PembayaranTransformer()
        )
            ->respond(201);
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     *
     * @return \Spatie\Fractal\Fractal
     * @throws \Illuminate\Validation\ValidationException
     * @api                {put} /pembayaran/ Update pembayaran
     * @apiName            update-pembayaran
     * @apiGroup           Pembayaran
     * @apiVersion         1.0.0
     * @apiPermission      Authenticated User
     * @apiUse             PembayaranResponse
     * @apiParam {String} first_name
     * @apiParam {String} last_name
     * @apiParam {String} email
     * @apiParam {String} password
     *
     */
    public function update(Request $request, string $id)
    {
        $attributes = $this->validate(
            $request,
            [
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
            ]
        );

        $attributes['password'] = app('hash')->make($attributes['password']);

        $user = app(FindUserByRouteKeyAction::class)
            ->execute($id);

        $user->update($attributes);

        return $this->fractal($user->refresh(), new PembayaranTransformer());
    }

    /**
     * * @OA\Delete(
     *     path="/pembayaran/destroy{id}",
     *     summary="Destroy Pembayaran",
     *     tags={"Pembayaran"},
     *     security={{"passport" : {}}},
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
     *                     description="Role keyd",
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
     *         response=204,
     *         description="The resource was revoked successfully.",
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
     * @param  string  $id
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     * @api                {delete} /pembayaran/destroy-pembayaran{id} Destroy pembayaran
     * @apiName            destroy-pembayaran
     * @apiGroup           Pembayaran
     * @apiVersion         1.0.0
     * @apiPermission      Authenticated User
     * @apiUse             NoContentResponse
     *
     */
    public function destroy(string $id)
    {
        $user = app(FindUserByRouteKeyAction::class)
            ->execute($id);

        if (app('auth')->id() == $user->getKey()) {
            return response(['message' => 'You cannot delete your self.'], 403);
        }

        $user->delete();

        return response('', 204);
    }
}
