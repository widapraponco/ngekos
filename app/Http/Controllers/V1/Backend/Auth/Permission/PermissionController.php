<?php
/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 12/16/18
 * Time: 11:25 AM
 */

namespace App\Http\Controllers\V1\Backend\Auth\Permission;

use App\Http\Controllers\Controller;
use App\Repositories\Auth\Permission\PermissionRepository;
use App\Transformers\Auth\PermissionTransformer;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class PermissionController
 *
 * @package App\Http\Controllers\V1\Backend\Auth\Permission
 */
class PermissionController extends Controller
{
    protected PermissionRepository $permissionRepository;

    /**
     * PermissionController constructor.
     *
     * @param  \App\Repositories\Auth\Permission\PermissionRepository  $permissionRepository
     */
    public function __construct(PermissionRepository $permissionRepository)
    {
        $permissions = $permissionRepository->makeModel()::PERMISSIONS;

        $this->middleware('permission:'.$permissions['index'], ['only' => 'index']);
        $this->middleware('permission:'.$permissions['show'], ['only' => 'show']);

        $this->permissionRepository = $permissionRepository;
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
        $this->permissionRepository->pushCriteria(new RequestCriteria($request));
        return $this->fractal($this->permissionRepository->paginate(), new PermissionTransformer());
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
        $this->permissionRepository->pushCriteria(new RequestCriteria($request));
        $p = $this->permissionRepository->find($this->decodeHash($id));
        return $this->fractal($p, new PermissionTransformer());
    }

}