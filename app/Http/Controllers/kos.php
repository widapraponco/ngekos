<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;
use App\Transformers\KosTransformer;

class KosController extends Controller
{
    //
    public function __construct()
    {
        $permissions = Kos::PERMISSIONS;

        $this->middleware('permission:'.$permissions['index'], ['only' => 'index']);
        $this->middleware('permission:'.$permissions['create'], ['only' => 'store']);
        $this->middleware('permission:'.$permissions['show'], ['only' => 'show']);
        $this->middleware('permission:'.$permissions['update'], ['only' => 'update']);
        $this->middleware('permission:'.$permissions['destroy'], ['only' => 'destroy']);
    }
}
