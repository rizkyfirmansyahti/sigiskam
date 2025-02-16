<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataGISModels;
use App\Models\KecamatanModels;
use App\Models\KelurahanModels;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DataGISControllers extends Controller
{
    function index()
    {
        // $allData = DataGISModels::all();
        $allData = DataGISModels::select('datagis.*', 'kecamatan.kecamatan', 'kelurahan.kelurahan')
            ->join('kecamatan', 'datagis.id_kecamatan', '=', 'kecamatan.id')
            ->join('kelurahan', 'datagis.id_kelurahan', '=', 'kelurahan.id')
            ->get();
        return view('admin.partials.datagis.index', compact('allData'));
    }
    function create()
    {
        $data = KecamatanModels::with('kelurahan')->get();
        return view('admin.partials.datagis.create', compact('data'));
    }
    public function getKelurahan(Request $request)
    {
        $kelurahan = KelurahanModels::where('id_kecamatan', $request->kecamatan_id)->get();
        return response()->json($kelurahan);
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
            'id_kecamatan' => $request->input('kecamatan'),
            'id_kelurahan' => $request->input('kelurahan'),
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
    function show($id)
    {
        $data = DataGISModels::findOrFail($id);
        $kecamatanList = KecamatanModels::all();
        $kelurahanList = KelurahanModels::where('id_kecamatan', $data->id_kecamatan)->get();
        return view('admin.partials.datagis.show', compact('data', 'kecamatanList', 'kelurahanList'));
    }

    public function update(Request $request, $id)
    {
        $keterangan = $request->input('keterangan');
        $keteranganList = '<ul style="list-style-type: none; padding-left: 0">';
        foreach (explode("\n", $keterangan) as $line) {
            if (!empty(trim($line))) {
                $keteranganList .= '<li>' . nl2br(e(trim($line))) . '</li>';
            }
        }
        $keteranganList .= '</ul>';
        DataGISModels::where('id', $id)->update([
            'tanggal' => $request->input('tanggal'),
            'waktu' => $request->input('waktu'),
            'id_kecamatan' => $request->input('kecamatan'),
            'id_kelurahan' => $request->input('kelurahan'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'kepala_keluarga' => $request->input('kepala_keluarga'),
            'jiwa' => $request->input('jiwa'),
            'materi' => $request->input('materi'),
            'keterangan' => $keteranganList,
        ]);
        Alert::success('Berhasil!', 'Data GIS berhasil diperbarui!');
        return redirect()->route('datagis.index');
    }
    function delete($id_bencana)
    {
        $users = DataGISModels::where('id', $id_bencana);
        $users->delete();
        Alert::success('Berhasil!', 'Data GIS berhasil dihapus!');
        return redirect(route('datagis.index'));
    }
}
