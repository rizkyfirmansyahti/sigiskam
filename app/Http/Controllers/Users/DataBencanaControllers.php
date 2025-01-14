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

    function search(Request $request)
    {
        // Ambil query dari request
        $query = $request->input('query');

        // Cari data berdasarkan kecamatan atau kelurahan
        $results = DataGISModels::where('kecamatan', 'LIKE', '%' . $query . '%')
            ->orWhere('kelurahan', 'LIKE', '%' . $query . '%')
            ->get();

        return response()->json($results);
    }
}
