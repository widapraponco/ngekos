<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Spatie\Fractal\Fractal
     * @api                {get} /auth/permissions Get all permissions
     * @apiName            get-all-permissions
     * @apiGroup           Permission
     * @apiVersion         1.0.0
     * @apiPermission      Authenticated User
     * @apiUse             PermissionsResponse
     *
     */
    public function index(Request $request)
    {
        return $this->fractal(
            QueryBuilder::for(config('permission.models.permission'))
                ->allowedFilters('name')
                ->paginate(),
            new PembayaranTransformer()
        );
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     *
     * @return \Spatie\Fractal\Fractal
     * @api                {get} /auth/permissions/{id} Show permission
     * @apiName            show-permission
     * @apiGroup           Permission
     * @apiVersion         1.0.0
     * @apiPermission      Authenticated User
     * @apiUse             PermissionResponse
     *
     */
    public function show(Request $request, string $id)
    {
        return $this->fractal(
            app(FindPermissionByRouteKeyAction::class)->execute($id),
            new PembayaranTransformer()
        );
    }
}
