<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PostController extends Controller
{
    // Menampilkan semua post
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // Menampilkan form create post
    public function create()
    {
        return view('posts.create');
    }

    // Menyimpan post baru
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'kategori' => 'required',
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'nik' => 'required|string|max:16',
            'uraian_pelayanan' => 'required|string',
            'sumbang_pikiran' => 'required|string',
            'file.*' => 'file|mimes:pdf,jpg,png,doc,docx|max:2048',
        ]);

        // Proses upload file
        $filePaths = [];
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile) {
                // Simpan file ke dalam folder storage/public/uploads
                $path = $uploadedFile->store('uploads', 'public');
                $filePaths[] = $path; // Simpan path file dalam array
            }
        }

        // Simpan data laporan ke database
        Post::create([
            'kategori' => $request->kategori,
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'nik' => $request->nik,
            'uraian_pelayanan' => $request->uraian_pelayanan,
            'sumbang_pikiran' => $request->sumbang_pikiran,
            'file' => json_encode($filePaths), // Simpan path file dalam format JSON
        ]);

        return redirect()->route('posts.index')->with('success', 'Laporan Berhasil Dibuat.');
    }


    // Menampilkan detail post
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // Menampilkan form edit post
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // Mengupdate post yang ada
    public function update(Request $request, Post $post)
    {
        // dd($request->all());
        $request->validate([
            'kategori' => 'required',
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'nik' => 'required|string|max:16',
            'uraian_pelayanan' => 'required|string',
            'sumbang_pikiran' => 'required|string',
            'file.*' => 'file|mimes:pdf,jpg,png,doc,docx|max:2048',
        ]);

        // Ambil file yang sudah ada
        $filePaths = json_decode($post->file, true) ?? [];

        // Proses file upload jika ada file baru
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploadedFile) {
                // Simpan file ke dalam folder storage/public/uploads
                $path = $uploadedFile->store('uploads', 'public');
                $filePaths[] = $path; // Menambahkan file baru ke array
            }
        }

        // Update data laporan
        $post->update($request->except('file') + ['file' => json_encode($filePaths)]);
        // $post->update($request->all() + ['file' => json_encode($filePaths)]);


        // $post->update($request->all());

        return redirect()->route('posts.index')->with('success', 'Laporan Berhasil Diupdate');
    }

    // Menghapus post
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Laporan Berhasil Dihapus');
    }

    public function generatePdf()
    {
        $posts = Post::all();

        $data = [
            'posts' => $posts,
            'tanggal' => date('m/d/Y'), // Tanggal saat PDF dihasilkan
        ];

        $pdf = PDF::loadView('posts.generate-pdf', $data);
        return $pdf->download('Form-pengaduan-dan-pelaporan.pdf');
    }

    public function downloadPDF($id)
    {
        // Mengambil data post berdasarkan id
        $post = Post::findOrFail($id);

        // Menggunakan dompdf untuk generate PDF dengan view 'posts.generate-pdf'
        $pdf = PDF::loadView('posts.generate-pdf', compact('post'));

        // Download file PDF
        return $pdf->download('data-pengaduan-' . $post->id . '.pdf');
    }
}
