@extends('layout')

@section('content')
    <h1 class="mt-3 mb-4 text-center">Buat Laporan</h1>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori Laporan</label>
            <select name="kategori" id="kategori" class="form-select" required>
                <option value="">Pilih Kategori</option>
                <option value="Lapor Suap Pungli">Lapor Suap Pungli</option>
                <option value="Lapor Gratifikasi siGAP PROTANI">Lapor Gratifikasi siGAP PROTANI</option>
                <option value="Lapor Penolakan SPG">Lapor Penolakan SPG</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Contoh: 08123456789"
                required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Lengkap</label>
            <textarea name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" name="nik" id="nik" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="uraian_pelayanan" class="form-label">Uraian Pelayanan yang Tidak Sesuai</label>
            <textarea name="uraian_pelayanan" id="uraian_pelayanan" class="form-control" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="sumbang_pikiran" class="form-label">Sumbang Pikiran/Saran/Gagasan/Penyelesaian
                Masalah</label>
            <textarea name="sumbang_pikiran" id="sumbang_pikiran" class="form-control" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="file">Upload Files</label>
            <input type="file" name="file[]" class="form-control" multiple required>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Submit</button>
    </form>
@endsection
