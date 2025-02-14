@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">


<div class="form-container" style="overflow-x: auto;">
    <h2 style="text-align: center; color: #333; margin-bottom: 1.5rem;">Data Sosialisasi Riksus</h2>
    <table id="sosRiksus" style="width: 100%; border-collapse: collapse; margin-bottom: 1.5rem; text-align: left;">
        <thead style="background-color: #f8f9fa; border-bottom: 2px solid #dee2e6;">
            <tr>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">No</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Judul Sosialisasi</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Hari/Tanggal</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Tempat</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Keterangan Peserta</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Kesimpulan</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6; text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $index + 1 }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $item->judul_sosialisasi }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $item->hari_tanggal }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $item->tempat }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $item->keterangan_peserta }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $item->kesimpulan }}</td>
                    <td style="padding: 0.75rem; border: 1px solid #dee2e6; text-align: center;">
                        @if (!in_array(Session::get('role'), ['direktur', 'deputi', 'kabag']))
                            <a href="{{ route('sosialisasi-riksus.edit', $item->id) }}"
                            style="background-color: #ffc107; color: white; padding: 0.5rem 1rem; text-decoration: none; border-radius: 4px;">Edit</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="button-container">
        @if (!in_array(Session::get('role'), ['direktur', 'deputi', 'kabag']))
            <a href="{{ route('sosialisasi-riksus.index') }}" class="btn btn-success">Add Data</a>
        @endif
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#sosRiksus').DataTable();
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