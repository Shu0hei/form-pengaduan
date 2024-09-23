@extends('layout')

@section('content')
    <div class="d-flex justify-content-center align-items-center mt-3">
        <div style="width: 60%;">
            <h1 class="text-center mb-3">Data : {{ $post->id }}</h1>

            <table class="table table-bordered">
                <tr>
                    <th>Nama</th>
                    <td>{{ $post->nama }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $post->email }}</td>
                </tr>
                <tr>
                    <th>No. Hp</th>
                    <td>{{ $post->no_hp }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $post->alamat }}</td>
                </tr>
                <tr>
                    <th>Nik</th>
                    <td>{{ $post->nik }}</td>
                </tr>
                <tr>
                    <th>Uraian Pelayanan</th>
                    <td>{{ $post->uraian_pelayanan }}</td>
                </tr>
                <tr>
                    <th>Sumbang Pikiran</th>
                    <td>{{ $post->sumbang_pikiran }}</td>
                </tr>
                <tr>
                    <th>File</th>
                    <td>
                        @php
                            $files = json_decode($post->file);
                        @endphp
                        @if ($files)
                            @foreach ($files as $file)
                                <a href="{{ asset('storage/' . $file) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $file) }}" alt="File" class="img-thumbnail mb-2"
                                        style="width: 50px; height: auto;">
                                </a>
                            @endforeach
                        @else
                            Tidak ada file
                        @endif
                    </td>
                </tr>

            </table>

            <div class="text-center mt-3">
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
                <a href="{{ route('posts.downloadPDF', $post->id) }}" class="btn btn-primary">Download PDF</a>
            </div>
        </div>
    </div>
@endsection
