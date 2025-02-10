<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riksus;

class RiksusController extends Controller
{
    public function edit($id)
    {
        $riksus = Riksus::findOrFail($id);
        return view('pengendaliankualitas.edit-riksus', compact('riksus'));
    }

    public function create()
{
    return view('pengendaliankualitas.riksus');
}

    public function index()
{
    $riksus = Riksus::all();
    return view('pengendaliankualitas.view-riksus', compact('riksus'));
}

public function store(Request $request)
{
    // Validasi form input (optional)
    $validatedData = $request->validate([
        'kode_riskus' => 'required|string',
        'jenis_industri' => 'nullable|string',
        'nama_perusahaan' => 'nullable|string',
        'no_nd_pelimpahan' => 'nullable|string',
        'tanggal_nd_pelimpahan' => 'nullable|date',
        'no_rkpk' => 'nullable|string',
        'tanggal_rkpk' => 'nullable|date',
        'no_surat_tugas' => 'nullable|string',
        'tanggal_surat_tugas' => 'nullable|date',
        'periode_pemeriksaan_surat_tugas' => 'nullable|string',
        'tanggal_qa' => 'nullable|date',
        'tanggal_expose' => 'nullable|date',
        'paparan_ke_pvml' => 'nullable|string',
        'no_nd_ke_dpjk' => 'nullable|string',
        'tanggal_nd_ke_dpjk' => 'nullable|date',
        'no_bast_ke_dpjk' => 'nullable|string',
        'tanggal_bast_ke_dpjk' => 'nullable|date',
        'no_lhpk_ke_dpjk' => 'nullable|string',
        'tanggal_lhpk_ke_dpjk' => 'nullable|date',
        'no_nd_penyampaian_lhpk_ke_pengawas_dpjk' => 'nullable|string',
        'tanggal_nd_penyampaian_lhpk_ke_pengawas_dpjk' => 'nullable|date',
        'tanggal_kkpk' => 'nullable|date',
        'no_siputri' => 'nullable|string',
        'tanggal_siputri' => 'nullable|date',
        'tanggal_persetujuan_kadep' => 'nullable|date',
    ]);

    // Membuat data baru
    $riksus = new Riksus();
    $riksus->kode_riskus = $request->kode_riskus;
    $riksus->jenis_industri = $request->jenis_industri;
    $riksus->nama_perusahaan = $request->nama_perusahaan;
    $riksus->no_nd_pelimpahan = $request->no_nd_pelimpahan;
    $riksus->tanggal_nd_pelimpahan = $request->tanggal_nd_pelimpahan;
    $riksus->no_rkpk = $request->no_rkpk;
    $riksus->tanggal_rkpk = $request->tanggal_rkpk;
    $riksus->no_surat_tugas = $request->no_surat_tugas;
    $riksus->tanggal_surat_tugas = $request->tanggal_surat_tugas;
    $riksus->periode_pemeriksaan_surat_tugas = $request->periode_pemeriksaan_surat_tugas;
    $riksus->tanggal_qa = $request->tanggal_qa;
    $riksus->tanggal_expose = $request->tanggal_expose;
    $riksus->paparan_ke_pvml = $request->paparan_ke_pvml;
    $riksus->no_nd_ke_dpjk = $request->no_nd_ke_dpjk;
    $riksus->tanggal_nd_ke_dpjk = $request->tanggal_nd_ke_dpjk;
    $riksus->no_bast_ke_dpjk = $request->no_bast_ke_dpjk;
    $riksus->tanggal_bast_ke_dpjk = $request->tanggal_bast_ke_dpjk;
    $riksus->no_lhpk_ke_dpjk = $request->no_lhpk_ke_dpjk;
    $riksus->tanggal_lhpk_ke_dpjk = $request->tanggal_lhpk_ke_dpjk;
    $riksus->no_nd_penyampaian_lhpk_ke_pengawas_dpjk = $request->no_nd_penyampaian_lhpk_ke_pengawas_dpjk;
    $riksus->tanggal_nd_penyampaian_lhpk_ke_pengawas_dpjk = $request->tanggal_nd_penyampaian_lhpk_ke_pengawas_dpjk;
    $riksus->tanggal_kkpk = $request->tanggal_kkpk;
    $riksus->no_siputri = $request->no_siputri;
    $riksus->tanggal_siputri = $request->tanggal_siputri;
    $riksus->tanggal_persetujuan_kadep = $request->tanggal_persetujuan_kadep;

    // Menyimpan data ke database
    $riksus->save();

    // Redirect atau memberikan feedback ke pengguna
    return redirect()->route('riksus.index')->with('success', 'Data Riksus berhasil ditambahkan!');
}


    public function show($id)
    {
        return response()->json(Riksus::findOrFail($id));
    }

    public function update(Request $request, $id)
{
    $riksus = Riksus::findOrFail($id);
    $validated = $request->validate([
        'kode_riskus' => 'required|unique:riksus',
        'jenis_industri' => 'nullable',
        'nama_perusahaan' => 'nullable',
        'no_nd_pelimpahan' => 'nullable',
        'tanggal_nd_pelimpahan' => 'nullable|date',
        'no_rkpk' => 'nullable',
        'tanggal_rkpk' => 'nullable|date',
        'no_surat_tugas' => 'nullable',
        'tanggal_surat_tugas' => 'nullable|date',
        'periode_pemeriksaan_surat_tugas' => 'nullable',
        'tanggal_qa' => 'nullable|date',
        'tanggal_expose' => 'nullable|date',
        'paparan_ke_pvml' => 'nullable',
        'no_nd_ke_dpjk' => 'nullable',
        'tanggal_nd_ke_dpjk' => 'nullable|date',
        'no_bast_ke_dpjk' => 'nullable',
        'tanggal_bast_ke_dpjk' => 'nullable|date',
        'no_lhpk_ke_dpjk' => 'nullable',
        'tanggal_lhpk_ke_dpjk' => 'nullable|date',
        'no_nd_penyampaian_lhpk_ke_pengawas_dpjk' => 'nullable',
        'tanggal_nd_penyampaian_lhpk_ke_pengawas_dpjk' => 'nullable|date',
        'tanggal_kkpk' => 'nullable|date',
        'no_siputri' => 'nullable',
        'tanggal_siputri' => 'nullable|date',
        'tanggal_persetujuan_kadep' => 'nullable|date',
    ]);

    $riksus->update($validated);
    return redirect()->route('riksus.index')->with('success', 'Data berhasil diperbarui');
}

    public function destroy($id)
    {
        Riksus::destroy($id);
        return response()->json(['message' => 'Data deleted']);
    }
}
