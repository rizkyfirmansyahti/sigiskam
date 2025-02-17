<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataGISModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardControllers extends Controller
{
    public function data()
    {
        // Mengambil data per kecamatan dan tahun
        $data = DataGISModels::select(
            'kecamatan.kecamatan',
            DB::raw('YEAR(datagis.tanggal) as tahun'),
            DB::raw('COUNT(*) as total')
        )
            ->join('kecamatan', 'datagis.id_kecamatan', '=', 'kecamatan.id')
            ->groupBy('kecamatan.kecamatan', 'tahun')
            ->orderBy('kecamatan.kecamatan')
            ->orderBy('tahun')
            ->get();

        // Menyusun data dalam format yang diinginkan
        $result = [];

        foreach ($data as $item) {
            if (!isset($result[$item->kecamatan])) {
                $result[$item->kecamatan] = [];
            }
            $result[$item->kecamatan][] = [
                'tahun' => $item->tahun,
                'total' => $item->total
            ];
        }

        // Ubah hasil menjadi format JSON yang sesuai
        $formattedData = [];
        foreach ($result as $kecamatan => $years) {
            $formattedData[] = [
                'kecamatan' => $kecamatan,
                'data' => $years
            ];
        }

        return response()->json($formattedData);
    }


    function maps()
    {
        // $data = = DataGISModels::all();
        $data = DataGISModels::select('datagis.*', 'kecamatan.kecamatan', 'kelurahan.kelurahan')
            ->join('kecamatan', 'datagis.id_kecamatan', '=', 'kecamatan.id')
            ->join('kelurahan', 'datagis.id_kelurahan', '=', 'kelurahan.id')
            ->get();
        return response()->json($data);
    }
}
