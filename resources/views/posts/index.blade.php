  @extends('layout')

  @section('content')
      <h1 class="mt-2 text-center">Data Pelaporan dan Pengaduan</h1>
      <div class="ms-auto mt-3 mb-3">
          <a href="{{ route('posts.create') }}" class="btn btn-primary">Tambah</a>
      </div>

      @if (session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <table class="table">
          <thead>
              <tr>
                  <th>Kategori</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>No. Hp</th>
                  <th>Alamat</th>
                  <th>Nik</th>
                  <th>Uraian Pelayanan</th>
                  <th>Sumbang Pikiran</th>
                  <th>File</th>
                  <th>Actions</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($posts as $post)
                  <tr>
                      <td>{{ $post->kategori }}</td>
                      <td>{{ $post->nama }}</td>
                      <td>{{ $post->email }}</td>
                      <td>{{ $post->no_hp }}</td>
                      <td>{{ $post->alamat }}</td>
                      <td>{{ $post->nik }}</td>
                      <td>{{ $post->uraian_pelayanan }}</td>
                      <td>{{ $post->sumbang_pikiran }}</td>
                      <td>
                          @php
                              $files = json_decode($post->file);
                          @endphp
                          @if ($files)
                              @foreach ($files as $file)
                                  <a href="{{ asset('storage/' . $file) }}" target="_blank">
                                      <img src="{{ asset('storage/' . $file) }}" alt="File" class="img-thumbnail mb-2"
                                          style="width: 100px; height: auto;">
                                  </a>
                              @endforeach
                          @else
                              Tidak ada file
                          @endif
                      </td>
                      <td>
                          <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">View</a>
                          <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                          <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                      </td>
                  </tr>
              @endforeach
          </tbody>
      </table>
  @endsection
