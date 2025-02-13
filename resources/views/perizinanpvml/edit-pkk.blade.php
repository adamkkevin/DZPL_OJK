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
<div style="max-width: 800px; margin: auto; padding: 2rem;  border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <h2>Edit Daftar Pengajuan Penilaian Kemampuan & Kepatutan</h2>
    <form method="POST" action="{{ route('pkk.update', $data->id) }}"
        style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        @csrf
        @method('PUT') <!-- Menggunakan PUT untuk update -->

        <!-- Input Jenis Industri -->
        <div style="display: flex; flex-direction: column; gap:5px;">
            <select id="jenis_industri" name="jenis_industri" required>
                <option value="">Pilih Jenis Industri</option>
                @foreach($jenis_industri as $jenis)
                    <option value="{{ $jenis }}" {{ old('jenis_industri', $data->jenis_industri) == $jenis ? 'selected' : '' }}>{{ $jenis }}</option>
                @endforeach
            </select>
            
            <select id="nama_perusahaan" name="nama_perusahaan" required>
                <option value="">Pilih Nama Perusahaan</option>
                @foreach($nama_perusahaan as $nama)
                    <option value="{{ $nama }}" {{ old('nama_perusahaan', $data->nama_perusahaan) == $nama ? 'selected' : '' }}>{{ $nama }}</option>
                @endforeach
            </select>
            <script>
                document.getElementById('jenis_industri').addEventListener('change', function() {
                    let jenisIndustri = this.value;
                    fetch(`/get-companies?jenis_industri=${jenisIndustri}`)
                        .then(response => response.json())
                        .then(data => {
                            let namaPerusahaanDropdown = document.getElementById('nama_perusahaan');
                            namaPerusahaanDropdown.innerHTML = '<option value="">Pilih Nama Perusahaan</option>';
                            data.forEach(nama => {
                                let option = document.createElement('option');
                                option.value = nama;
                                option.textContent = nama;
                                namaPerusahaanDropdown.appendChild(option);
                            });
                        });
                });
                </script>

            <!-- Input Nama Pihak Utama -->
            <label for="nama_pihak_utama" style="font-weight: bold; color: #555;">Nama Pihak Utama</label>
            <input type="text" name="nama_pihak_utama" required value="{{$data->nama_pihak_utama }}"
                style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">

            <!-- Input Jabatan -->
            <label for="jabatan" style="font-weight: bold; color: #555;">Jabatan</label>
            <input type="text" name="jabatan" required value="{{$data->jabatan }}"
                style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">

            <!-- Input Status -->
            <label for="status" style="font-weight: bold; color: #555;">Status</label>
            <input type="text" name="status" required value="{{$data->status }}"
                style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">

            <!-- Input Nomor Surat Permohonan -->
            <label for="nomor_surat_permohonan" style="font-weight: bold; color: #555;">Nomor Surat Permohonan</label>
            <input type="text" name="nomor_surat_permohonan" required value="{{$data->nomor_surat_permohonan }}"
                style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">

            <!-- Input Tanggal Surat Permohonan -->
            <label for="tanggal_surat_permohonan" style="font-weight: bold; color: #555;">Tanggal Surat
                Permohonan</label>
            <input type="date" name="tanggal_surat_permohonan" required
                value="{{$data->tanggal_surat_permohonan }}"
                style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">

            <!-- Input Tanggal Pengajuan Sistem -->
            <label for="tanggal_pengajuan_sistem" style="font-weight: bold; color: #555;">Tanggal Pengajuan
                Sistem</label>
            <input type="date" name="tanggal_pengajuan_sistem" required
                value="{{$data->tanggal_pengajuan_sistem }}"
                style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">
        </div>

        <div style="display: flex; flex-direction: column; gap:5px;">
            <!-- Input Tanggal Dok Lengkap -->
            <label for="tanggal_dok_lengkap" style="font-weight: bold; color: #555;">Tanggal Dok Lengkap</label>
            <input type="date" name="tanggal_dok_lengkap" required value="{{$data->tanggal_dok_lengkap }}"
                style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">

            <!-- Input Perlu Klarifikasi -->
            <label for="perlu_klarifikasi" style="font-weight: bold; color: #555;">Perlu Klarifikasi</label>
            <input type="text" name="perlu_klarifikasi" required value="{{$data->perlu_klarifikasi }}"
                style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">

            <!-- Input Tanggal Klarifikasi -->
            <label for="tanggal_klarifikasi" style="font-weight: bold; color: #555;">Tanggal Klarifikasi</label>
            <input type="date" name="tanggal_klarifikasi" required value="{{$data->tanggal_klarifikasi }}"
                style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">

            <!-- Input Hasil -->
            <label for="hasil" style="font-weight: bold; color: #555;">Hasil</label>
            <input type="text" name="hasil" required value="{{$data->hasil }}"
                style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">

            <!-- Input Nomor Persetujuan -->
            <label for="nomor_persetujuan" style="font-weight: bold; color: #555;">Nomor Persetujuan</label>
            <input type="text" name="nomor_persetujuan" required value="{{$data->nomor_persetujuan }}"
                style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">

            <!-- Input Tanggal Persetujuan -->
            <label for="tanggal_persetujuan" style="font-weight: bold; color: #555;">Tanggal Persetujuan</label>
            <input type="date" name="tanggal_persetujuan" required value="{{$data->tanggal_persetujuan }}"
                style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">

            <!-- Input Jumlah Hari Kerja -->
            <label for="jumlah_hari_kerja" style="font-weight: bold; color: #555;">Jumlah Hari Kerja</label>
            <input type="number" name="jumlah_hari_kerja" required value="{{$data->jumlah_hari_kerja }}"
                style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 10px;">

            <!-- Tombol Update -->
            <button type="submit"
                style="background-color: #A91111; color: white; padding: 1rem; border: none; border-radius: 10px; cursor: pointer; margin-top: 1rem;">Update</button>
        </div>
    </form>
</div>
@endsection