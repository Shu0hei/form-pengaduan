@extends('layout')

@section('content')
    <h1 class="mt-3 mb-4 text-center">Edit Laporan</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori Laporan</label>
            <select name="kategori" id="kategori" class="form-select" required>
                <option value="">Pilih Kategori</option>
                <option value="Lapor Suap Pungli" {{ $post->kategori == 'Lapor Suap Pungli' ? 'selected' : '' }}>Lapor Suap
                    Pungli</option>
                <option value="Lapor Gratifikasi siGAP PROTANI"
                    {{ $post->kategori == 'Lapor Gratifikasi siGAP PROTANI' ? 'selected' : '' }}>Lapor Gratifikasi siGAP
                    PROTANI</option>
                <option value="Lapor Penolakan SPG" {{ $post->kategori == 'Lapor Penolakan SPG' ? 'selected' : '' }}>Lapor
                    Penolakan SPG</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $post->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $post->email }}" required>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Contoh: 08123456789"
                value="{{ $post->no_hp }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Lengkap</label>
            <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ $post->alamat }}</textarea>
        </div>
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" name="nik" id="nik" class="form-control" value="{{ $post->nik }}" required>
        </div>
        <div class="mb-3">
            <label for="uraian_pelayanan" class="form-label">Uraian Pelayanan yang Tidak Sesuai</label>
            <textarea name="uraian_pelayanan" id="uraian_pelayanan" class="form-control" rows="4" required>{{ $post->uraian_pelayanan }}</textarea>
        </div>
        <div class="mb-3">
            <label for="sumbang_pikiran" class="form-label">Sumbang Pikiran/Saran/Gagasan/Penyelesaian
                Masalah</label>
            <textarea name="sumbang_pikiran" id="sumbang_pikiran" class="form-control" rows="4" required>{{ $post->sumbang_pikiran }}</textarea>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Upload File (Jika ingin mengganti)</label>
            <input type="file" name="file[]" id="file" class="form-control" multiple>
            <small class="text-muted">File saat ini:</small>
            @if ($post->file)
                @php
                    $files = json_decode($post->file);
                @endphp
                @foreach ($files as $file)
                    <div>
                        <a href="{{ asset('storage/' . $file) }}" target="_blank">{{ basename($file) }}</a>
                    </div>
                @endforeach
            @endif
        </div>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
