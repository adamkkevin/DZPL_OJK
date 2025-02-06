@extends('layouts.app')

@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<h2 style="text-align: center; color: #333; margin-bottom: 1.5rem;">Daftar Rapat Pimpinan</h2>

<div style="overflow-x: auto;">
    <table id="rapatTable" style="width: 100%; border-collapse: collapse; margin-bottom: 1.5rem; text-align: left;">
        <thead style="background-color: #f8f9fa; border-bottom: 2px solid #dee2e6;">
            <tr>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6; text-align: center; width:5%;">No</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6; text-align: center; width:20%;">Hari/Tanggal</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6; text-align: center; width:35%">Topik</th>
                <th style="padding: 0.75rem; border: 1px solid #dee2e6; text-align: center; width:40%;" >Hasil</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rapim as $index => $item)
            <tr>
                <td style="padding: 0.75rem; border: 1px solid #dee2e6; text-align: center;">{{ $index + 1 }}</td>
                <td style="padding: 0.75rem; border: 1px solid #dee2e6; text-align: center;">{{ $item->tanggal }}</td>
                <td style="padding: 0.75rem; border: 1px solid #dee2e6; text-align: center;">{{ $item->topik }}</td>
                <td style="padding: 0.75rem; border: 1px solid #dee2e6; text-align: center;">{{ $item->hasil }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="button-container">
    <a href="{{ route('rapat-pimpinan.create') }}" class="btn btn-success">Add Data</a>
</div>

<script>
    $(document).ready(function() {
        $('#rapatTable').DataTable();
    });
</script>

<style>
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
    table {
        width: 100%;
        table-layout: fixed;
    }
    th, td {
        padding: 0.75rem;
        border: 1px solid #dee2e6;
        word-wrap: break-word;
    }
</style>

@endsection
