<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengaduan PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <h2 class="text-center">Formulir Pengaduan dan Pelaporan</h2>

        <table>
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
                            <a href="{{ asset('storage/' . $file) }}" target="_blank">{{ basename($file) }}</a><br>
                        @endforeach
                    @else
                        Tidak ada file
                    @endif
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
