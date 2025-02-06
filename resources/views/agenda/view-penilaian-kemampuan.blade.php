@extends('layouts.app')

@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">


    <h2 style="text-align: center; color: #333; margin-bottom: 1.5rem;">Daftar Agenda PKK</h2>


    <div style="overflow-x: auto;">
        <table id="pkkTable" style="width: 100%; border-collapse: collapse; margin-bottom: 1.5rem; text-align: left;">
            <thead style="background-color: #f8f9fa; border-bottom: 2px solid #dee2e6;">
                <tr>
                    <th style="padding: 0.75rem; border: 1px solid #dee2e6;">No</th>
                    <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Hari/Tanggal</th>
                    <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Waktu</th>
                    <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Nama Perusahaan</th>
                    <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Peserta</th>
                    <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Jabatan</th>
                    <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Zoom</th>
                    <th style="padding: 0.75rem; border: 1px solid #dee2e6;">PIC</th>
                    <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Penguji 1</th>
                    <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Penguji 2</th>
                    <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Penguji 3</th>
                    <th style="padding: 0.75rem; border: 1px solid #dee2e6;">Hasil</th>
                    <th style="padding: 0.75rem; border: 1px solid #dee2e6; text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agendas as $index => $agenda)
                    <tr>
                        <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $loop->iteration }}</td>
                        <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $agenda->hari_tanggal }}</td>
                        <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $agenda->waktu }}</td>
                        <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $agenda->nama_perusahaan }}</td>
                        <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $agenda->peserta }}</td>
                        <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $agenda->jabatan }}</td>
                        <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $agenda->zoom }}</td>
                        <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $agenda->pic }}</td>
                        <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $agenda->penguji }}</td>
                        <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $agenda->penguji1 }}</td>
                        <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $agenda->penguji2 }}</td>
                        <td style="padding: 0.75rem; border: 1px solid #dee2e6;">{{ $agenda->hasil }}</td>
                        <td style="padding: 0.75rem; border: 1px solid #dee2e6; text-align: center;">
                            <a href="{{ route('pkk-agenda.edit', $agenda->id) }}" style="background-color: #ffc107; color: black; padding: 0.5rem 1rem; text-decoration: none; border-radius: 4px;">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="button-container">
        <a href="{{ route('penilaian-kemampuan.create') }}"  class="btn btn-success">Add Data</a>
    </div>
    </div>
    

    <script>
    $(document).ready(function() {
        $('#pkkTable').DataTable();
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
    </style>
    
@endsection
