<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataGISModels;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DataGISControllers extends Controller
{
    function index()
    {
        $allData = DataGISModels::all();
        return view('admin.partials.datagis.index', compact('allData'));
    }
    function create()
    {
        return view('admin.partials.datagis.create');
    }
    public function store(Request $request)
    {
        $keterangan = $request->input('keterangan');
        $keteranganList = '<ul style="list-style-type: none; padding-left: 0">';
        foreach (explode("\n", $keterangan) as $line) {
            if (!empty(trim($line))) {
                $keteranganList .= '<li>' . nl2br(e(trim($line))) . '</li>';
            }
        }
        $keteranganList .= '</ul>';
        DataGISModels::create([
            'tanggal' => $request->input('tanggal'),
            'waktu' => $request->input('waktu'),
            'kecamatan' => $request->input('kecamatan'),
            'kelurahan' => $request->input('kelurahan'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'kepala_keluarga' => $request->input('kepala_keluarga'),
            'jiwa' => $request->input('jiwa'),
            'materi' => $request->input('materi'),
            'keterangan' => $keteranganList,
        ]);
        Alert::success('Berhasil!', 'Data GIS berhasil ditambahkan!');
        return redirect()->route('datagis.index');
    }


    // function show()
    // {

    // }
    // function edit()
    // {

    // }
    function delete($id_bencana)
    {
        $users = DataGISModels::where('id', $id_bencana);
        $users->delete();
        Alert::success('Berhasil!', 'Data GIS berhasil dihapus!');
        return redirect(route('datagis.index'));
    }
}
