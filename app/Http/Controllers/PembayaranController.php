<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\V1\Backend\Auth\User\UserController;
use App\Models\Pembayaran;
use App\Transformers\PembayaranTransformer;
// use Domain\Auth\Actions\FindPermissionByRouteKeyAction;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

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
     * @param  string  $id
     *
     * @return \Spatie\Fractal\Fractal
     * @api                {get} /auth/users/{id} Show user
     * @apiName            show-user
     * @apiGroup           User
     * @apiVersion         1.0.0
     * @apiPermission      Authenticated User
     * @apiUse             UserResponse
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
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     * @api                {post} /auth/users Store user
     * @apiName            store-user
     * @apiGroup           User
     * @apiVersion         1.0.0
     * @apiPermission      Authenticated User
     * @apiUse             UserCreatedResponse
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
     * @api                {put} /auth/users/ Update user
     * @apiName            update-user
     * @apiGroup           User
     * @apiVersion         1.0.0
     * @apiPermission      Authenticated User
     * @apiUse             UserResponse
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
     * @param  string  $id
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     * @api                {delete} /auth/users/{id} Destroy user
     * @apiName            destroy-user
     * @apiGroup           User
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
