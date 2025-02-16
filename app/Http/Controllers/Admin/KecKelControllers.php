<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KecamatanModels;
use App\Models\KelurahanModels;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KecKelControllers extends Controller
{
    function indexKecamatan()
    {
        $data = KecamatanModels::with('kelurahan')->get();
        $title = 'Apakah anda yakin?';
        $text = "Data Kecamatan Dan Kelurahan akan dihapus secara permanen!";
        confirmDelete($title, $text);
        return view('admin.partials.kecamatan.index', compact('data'));
    }
    function createKecamatan()
    {
        return view('admin.partials.kecamatan.create', );
    }

    // Store
    function storeKecamatan(Request $request)
    {
        KecamatanModels::create([
            'kecamatan' => $request->input('kecamatan'),
        ]);
        Alert::success('Berhasil!', 'Kecamatan berhasil ditambahkan!');
        return redirect(route('keckel.index'));
    }
    function storeKelurahan(Request $request)
    {
        KelurahanModels::create([
            'id_kecamatan' => $request->input('id_kecamatan'),
            'kelurahan' => $request->input('kelurahan'),
        ]);
        Alert::success('Berhasil!', 'Kelurahan berhasil ditambahkan!');
        return redirect(route('keckel.index'));
    }
    // Show
    function show(Request $request, $id_kecamatan)
    {
        $data = KecamatanModels::findOrFail($id_kecamatan);
        return view('admin.partials.kecamatan.show', compact('data'));
    }

    // Update
    function update(Request $request, $id_kecamatan)
    {
        KecamatanModels::where('id', $id_kecamatan)->update([
            'kecamatan' => $request->input('kecamatan'),
        ]);
        Alert::success('Berhasil!', 'Kecamatan berhasil diubah!');
        return redirect(route('keckel.index'));
    }
    function updateKelurahan(Request $request, $id_kelurahan)
    {
        KelurahanModels::where('id', $id_kelurahan)->update([
            'kelurahan' => $request->input('kelurahan'),
        ]);
        Alert::success('Berhasil!', 'Kelurahan berhasil diubah!');
        return redirect(route('keckel.index'));
    }

    // Delete
    public function delete($id_kecamatan)
    {
        KelurahanModels::where('id_kecamatan', $id_kecamatan)->delete();
        $data = KecamatanModels::findOrFail($id_kecamatan);
        $data->delete();
        Alert::success('Berhasil!', 'Kecamatan Dan Kelurahan berhasil dihapus!');
        return redirect()->route('keckel.index');
    }
    function deleteKelurahan($id_kelurahan)
    {
        $data = KelurahanModels::findOrFail($id_kelurahan);
        $data->delete();
        Alert::success('Berhasil!', 'Kelurahan berhasil dihapus!');
        return redirect()->route('keckel.index');
    }

}
