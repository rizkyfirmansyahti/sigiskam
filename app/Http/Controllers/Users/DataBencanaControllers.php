<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\DataGISModels;
use Illuminate\Http\Request;

class DataBencanaControllers extends Controller
{
    function data()
    {
        // $data = DataGISModels::all();
        $data = DataGISModels::select('datagis.*', 'kecamatan.kecamatan', 'kelurahan.kelurahan')
            ->join('kecamatan', 'datagis.id_kecamatan', '=', 'kecamatan.id')
            ->join('kelurahan', 'datagis.id_kelurahan', '=', 'kelurahan.id')
            ->get();
        return response()->json($data);
    }

    // function search(Request $request)
    // {
    //     // Ambil query dari request
    //     $query = $request->input('query');

    //     // Cari data berdasarkan kecamatan atau kelurahan
    //     $results = DataGISModels::where('kecamatan', 'LIKE', '%' . $query . '%')
    //         ->orWhere('kelurahan', 'LIKE', '%' . $query . '%')
    //         ->get();

    //     return response()->json($results);
    // }
}
