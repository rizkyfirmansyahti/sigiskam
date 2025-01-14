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
            'kecamatan',
            DB::raw('YEAR(tanggal) as tahun'),
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('kecamatan', 'tahun')
            ->orderBy('kecamatan')
            ->orderBy('tahun')
            ->get();

        // Menyusun data dalam format yang diinginkan
        $result = [];

        foreach ($data as $item) {
            // Jika kecamatan belum ada dalam array hasil, tambahkan kecamatan baru
            if (!isset($result[$item->kecamatan])) {
                $result[$item->kecamatan] = [];
            }

            // Tambahkan tahun dan totalnya ke dalam kecamatan yang sesuai
            $result[$item->kecamatan][] = [
                'tahun' => $item->tahun,
                'total' => $item->total
            ];
        }

        // Ubah hasil menjadi format yang sesuai
        $formattedData = [];
        foreach ($result as $kecamatan => $years) {
            $formattedData[] = [
                'kecamatan' => $kecamatan,
                'data' => $years
            ];
        }

        return response()->json($formattedData);
    }
}
