<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Transformers\AdminTransformer;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $permissions = Fasilitas::PERMISSIONS;
        
        $this->middleware('permission:'.$permissions['index'], ['only' => 'index']);
        $this->middleware('permission:'.$permissions['create'], ['only' => 'store']);
        $this->middleware('permission:'.$permissions['show'], ['only' => 'show']);
        $this->middleware('permission:'.$permissions['update'], ['only' => 'update']);
        $this->middleware('permission:'.$permissions['destroy'], ['only' => 'destroy']);

    }

    public function show(string $id)
    {
        return $this->fractal(
            app(FindUserByRouteKeyAction::class)->execute($id, throw404: true),
            new AdminTransformer()
        );       
    }

}
