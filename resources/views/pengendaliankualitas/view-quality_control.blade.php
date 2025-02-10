@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">


<div class="form-container">
<div style="overflow-x: auto; max-width: 100%;">
<h2 style="text-align: center; color: #333; margin-bottom: 1.5rem;">Quality Control Management</h2>
    <table id="qualityControlTable" style="width: 100%; border-collapse: collapse; margin-bottom: 1.5rem; text-align: left;">
        <thead style="background-color: #f8f9fa; border-bottom: 2px solid #dee2e6;">
            <tr>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">ID</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Jenis Industri</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Kriteria</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Nama Perusahaan</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Tanggal Forum</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Masalah Keuangan</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Masalah Non Keuangan</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Akar Penyebab</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Rekomendasi Utama</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Rekomendasi Pendukung</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Tanggal Batas Tindak Lanjut</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Panelis</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Pengawas</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Tanggal Pengajuan Dokumen</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Hari Kerja</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Nomor Dokumen</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Tanggal Pengajuan Tindak Lanjut</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Status Tindak Lanjut</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($qualityControls as $control)
                <tr>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $control->id }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $control->industry_type }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $control->criteria }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $control->company_name }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $control->forum_date }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $control->financial_issues }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $control->non_financial_issues }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $control->root_cause }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $control->main_recommendation }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $control->supporting_recommendation }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $control->follow_up_deadline }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $control->panelists }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $control->supervisors }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $control->document_submission_date }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $control->working_days }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $control->document_number }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $control->follow_up_submission_date }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $control->follow_up_status }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6; text-align: center;">
                        <a href="{{ route('quality_control.edit', $control) }}" style="background-color: #ffc107; color: black; padding: 0.5rem 1rem; text-decoration: none; border-radius: 4px;">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="text-align: right; margin-bottom: 1rem;" class="button-container">
    <a href="{{ route('quality_control.create') }}" style="background-color: #28a745; color: white; padding: 0.5rem 1rem; text-decoration: none; border-radius: 4px;">Tambah Data</a>
</div>
</div>
</div>


<script>
$(document).ready(function () {
    $('#qualityControlTable').DataTable({
        scrollX: true, // Tambahkan opsi ini untuk mendukung pengguliran horizontal
    });
});
</script>

<style>
    .form-container {
        max-width: 100%;
        width: 100%;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: white;
        display: flex;
        justify-content: center;
    }
       
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

    .button-container {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
    }

    .btn-success {
        background-color: #28a745;
        border: 2px solid #28a745;
        border-radius: 8px;
        padding: 10px 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        color: white;
        text-align: center;
        text-decoration: none;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
</style>
@endsection
