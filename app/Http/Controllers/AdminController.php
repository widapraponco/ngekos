<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Transformers\AdminTransformer;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $permissions = Fasilitas::PERMISSIONS;
        
        $this->middleware('permission:'.$permissions['index'], ['only' => 'index']);
        $this->middleware('permission:'.$permissions['create'], ['only' => 'store']);

    }

}
