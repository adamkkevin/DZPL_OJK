@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Seleksi form
        const form = document.querySelector('form');

        // Tambahkan event listener ke form
        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Mencegah pengiriman form secara default

            // Tampilkan SweetAlert2
            Swal.fire({
                title: 'Data berhasil disimpan!',
                text: 'Data Anda telah berhasil dikirim ke server.',
                icon: 'success',
                confirmButtonText: 'OK',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim form ke server jika tombol "OK" diklik
                    form.submit();
                }
            });
        });
    });
</script>
<div class="form-container">
<div  style="width: 900px; margin: auto; padding: 2rem;  border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <h2>Edit Daftar Pengajuan Penilaian Kemampuan & Kepatutan</h2>
    <form method="POST" action="{{ route('kepengurusan.update', $penilaian->id) }}"  style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        @csrf
        @method('PUT') <!-- Menggunakan PUT untuk update -->

        <!-- Input Jenis Industri -->
    <div style="display: flex; flex-direction: column; gap:5px;">
        <label for="jenis_industri" style="font-weight: bold; color: #555;">Jenis Industri</label>
        <select name="jenis_industri" required style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">
            <option value="Perusahaan Pembiayaan" {{ $penilaian->jenis_industri == 'Perusahaan Pembiayaan' ? 'selected' : '' }}>Perusahaan Pembiayaan</option>
            <option value="PPBTI" {{ $penilaian->jenis_industri == 'PPBTI' ? 'selected' : '' }}>PPBTI</option>
            <option value="Perusahaan Modal Ventura" {{ $penilaian->jenis_industri == 'Perusahaan Modal Ventura' ? 'selected' : '' }}>Perusahaan Modal Ventura</option>
            <option value="Lembaga Keuangan Mikro" {{ $penilaian->jenis_industri == 'Lembaga Keuangan Mikro' ? 'selected' : '' }}>Lembaga Keuangan Mikro</option>
            <option value="Pergadaian" {{ $penilaian->jenis_industri == 'Pergadaian' ? 'selected' : '' }}>Pergadaian</option>
        </select>
        <!-- Input Nama Perusahaan -->
        <label for="nama_perusahaan" style="font-weight: bold; color: #555;">Nama Perusahaan</label>
        <input type="text" name="nama_perusahaan" required value="{{ $penilaian->nama_perusahaan }}" style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">

        <!-- Input Nama Pihak Utama -->
        <label for="nama_pihak_utama" style="font-weight: bold; color: #555;">Nama Pihak Utama</label>
        <input type="text" name="nama_pihak_utama" required value="{{ $penilaian->nama_pihak_utama }}" style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">

        <!-- Input Jabatan -->
        <label for="jabatan" style="font-weight: bold; color: #555;">Jabatan</label>
        <input type="text" name="jabatan" required value="{{ $penilaian->jabatan }}" style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">

        <!-- Input Status -->
        <label for="status" style="font-weight: bold; color: #555;">Status</label>
        <input type="text" name="status" required value="{{ $penilaian->status }}" style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">

        <!-- Input Nomor Surat Permohonan -->
        <label for="nomor_surat_permohonan" style="font-weight: bold; color: #555;">Nomor Surat Permohonan</label>
        <input type="text" name="nomor_surat_permohonan" required value="{{ $penilaian->nomor_surat_permohonan }}" style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">

        <!-- Input Tanggal Surat Permohonan -->
        <label for="tanggal_surat_permohonan" style="font-weight: bold; color: #555;">Tanggal Surat Permohonan</label>
        <input type="date" name="tanggal_surat_permohonan" required value="{{ $penilaian->tanggal_surat_permohonan }}" style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">

        <!-- Input Tanggal Pengajuan Sistem -->
        <label for="tanggal_pengajuan_sistem" style="font-weight: bold; color: #555;">Tanggal Pengajuan Sistem</label>
        <input type="date" name="tanggal_pengajuan_sistem" required value="{{ $penilaian->tanggal_pengajuan_sistem }}" style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">
    </div>

    <div style="display: flex; flex-direction: column; gap:5px;">
        <!-- Input Tanggal Dok Lengkap -->
        <label for="tanggal_dok_lengkap" style="font-weight: bold; color: #555;">Tanggal Dok Lengkap</label>
        <input type="date" name="tanggal_dok_lengkap" required value="{{ $penilaian->tanggal_dok_lengkap }}" style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">

        <!-- Input Perlu Klarifikasi -->
        <label for="perlu_klarifikasi" style="font-weight: bold; color: #555;">Perlu Klarifikasi</label>
        <input type="text" name="perlu_klarifikasi" required value="{{ $penilaian->perlu_klarifikasi }}" style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">

        <!-- Input Tanggal Klarifikasi -->
        <label for="tanggal_klarifikasi" style="font-weight: bold; color: #555;">Tanggal Klarifikasi</label>
        <input type="date" name="tanggal_klarifikasi" required value="{{ $penilaian->tanggal_klarifikasi }}" style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">

        <!-- Input Hasil -->
        <label for="hasil" style="font-weight: bold; color: #555;">Hasil</label>
        <input type="text" name="hasil" required value="{{ $penilaian->hasil }}" style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">

        <!-- Input Nomor Persetujuan -->
        <label for="nomor_persetujuan" style="font-weight: bold; color: #555;">Nomor Persetujuan</label>
        <input type="text" name="nomor_persetujuan" required value="{{ $penilaian->nomor_persetujuan }}" style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">

        <!-- Input Tanggal Persetujuan -->
        <label for="tanggal_persetujuan" style="font-weight: bold; color: #555;">Tanggal Persetujuan</label>
        <input type="date" name="tanggal_persetujuan" required value="{{ $penilaian->tanggal_persetujuan }}" style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">

        <!-- Input Jumlah Hari Kerja -->
        <label for="jumlah_hari_kerja" style="font-weight: bold; color: #555;">Jumlah Hari Kerja</label>
        <input type="number" name="jumlah_hari_kerja" required value="{{ $penilaian->jumlah_hari_kerja }}" style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">
    
        <!-- Tombol Update -->
        <button type="submit" style="background-color: #A91111; color: white; padding: 1rem; border: none; border-radius: 10px; cursor: pointer; margin-top: 1rem;">Update</button>
        </div>
    </form>
</div>
</div>
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
</style>
@endsection
