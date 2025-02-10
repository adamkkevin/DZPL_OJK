@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<h2 style="text-align: center; color: #333; margin-bottom: 1.5rem;">Daftar Riksus</h2>

<div style="overflow-x: auto; max-width: 100%;">
    <table id="riksusTable" style="width: 100%; border-collapse: collapse; margin-bottom: 1.5rem; text-align: left;">
        <thead style="background-color: #f8f9fa; border-bottom: 2px solid #dee2e6;">
            <tr>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">#</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Kode Riksus</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Jenis Industri</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Nama Perusahaan</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">No ND Pelimpahan</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Tanggal ND Pelimpahan</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">No RKPK</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Tanggal RKPK</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">No Surat Tugas</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Tanggal Surat Tugas</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Periode Pemeriksaan</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Tanggal QA</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Tanggal Expose</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Paparan Ke PVML</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">No ND Ke DPJK</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Tanggal ND Ke DPJK</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">No BAST Ke DPJK</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Tanggal BAST Ke DPJK</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">No LHPK Ke DPJK</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Tanggal LHPK Ke DPJK</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">No ND Penyampaian LHPK ke DPJK</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Tanggal ND Penyampaian LHPK ke DPJK</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Tanggal KKPK</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">No SIPUTRI</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Tanggal SIPUTRI</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Tanggal Persetujuan Kadep</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riksus as $riksusItem)
                <tr>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $loop->iteration }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->kode_riskus }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->jenis_industri }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->nama_perusahaan }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->no_nd_pelimpahan }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->tanggal_nd_pelimpahan ? \Carbon\Carbon::parse($riksusItem->tanggal_nd_pelimpahan)->format('d-m-Y') : '-' }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->no_rkpk }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->tanggal_rkpk ? \Carbon\Carbon::parse($riksusItem->tanggal_rkpk)->format('d-m-Y') : '-' }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->no_surat_tugas }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->tanggal_surat_tugas ? \Carbon\Carbon::parse($riksusItem->tanggal_surat_tugas)->format('d-m-Y') : '-' }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->periode_pemeriksaan_surat_tugas }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->tanggal_qa ? \Carbon\Carbon::parse($riksusItem->tanggal_qa)->format('d-m-Y') : '-' }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->tanggal_expose ? \Carbon\Carbon::parse($riksusItem->tanggal_expose)->format('d-m-Y') : '-' }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->paparan_ke_pvml }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->no_nd_ke_dpjk }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->tanggal_nd_ke_dpjk ? \Carbon\Carbon::parse($riksusItem->tanggal_nd_ke_dpjk)->format('d-m-Y') : '-' }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->no_bast_ke_dpjk }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->tanggal_bast_ke_dpjk ? \Carbon\Carbon::parse($riksusItem->tanggal_bast_ke_dpjk)->format('d-m-Y') : '-' }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->no_lhpk_ke_dpjk }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->tanggal_lhpk_ke_dpjk ? \Carbon\Carbon::parse($riksusItem->tanggal_lhpk_ke_dpjk)->format('d-m-Y') : '-' }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->no_nd_penyampaian_lhpk_ke_pengawas_dpjk }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->tanggal_nd_penyampaian_lhpk_ke_pengawas_dpjk ? \Carbon\Carbon::parse($riksusItem->tanggal_nd_penyampaian_lhpk_ke_pengawas_dpjk)->format('d-m-Y') : '-' }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->tanggal_kpkp ? \Carbon\Carbon::parse($riksusItem->tanggal_kpkp)->format('d-m-Y') : '-' }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->no_siputri }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->tanggal_siputri ? \Carbon\Carbon::parse($riksusItem->tanggal_siputri)->format('d-m-Y') : '-' }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $riksusItem->tanggal_persetujuan_kadep ? \Carbon\Carbon::parse($riksusItem->tanggal_persetujuan_kadep)->format('d-m-Y') : '-' }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6; text-align: center;">
                        <a href="{{ route('riksus.edit', $riksusItem->id) }}" style="background-color: #ffc107; color: black; padding: 0.5rem 1rem; text-decoration: none; border-radius: 4px;">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div style="text-align: right; margin-top: 1rem;" class="button-container">
    <a href="{{ route('riksus.create') }}" style="background-color: #28a745; color: white; padding: 0.5rem 1rem; text-decoration: none; border-radius: 4px;">Tambah Data</a>
</div>

<script>
$(document).ready(function () {
    $('#riksusTable').DataTable({
        scrollX: true, // Tambahkan opsi ini untuk mendukung pengguliran horizontal
    });
});
</script>
<style>
        div.dataTables_wrapper {
        width: 100%;
        overflow-x: auto;  */
    }
    div.dataTables_scrollHead{
        margin-bottom: -25px;
    }

    table {
        max-width: 100%; 
    }
</style>
@endsection
