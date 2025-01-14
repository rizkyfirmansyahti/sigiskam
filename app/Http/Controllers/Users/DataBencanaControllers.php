<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\DataGISModels;
use Illuminate\Http\Request;

class DataBencanaControllers extends Controller
{
    function data()
    {
        $data = DataGISModels::all();
        return response()->json($data);
    }
}
