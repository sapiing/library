<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $buku = Buku::orderBy('created_at', 'DESC')->get();
    $totalBuku = Buku::count();
    $bukuSedangDipinjam = Peminjaman::where('dikembalikan', 'false')->count();
    $bukuHilang = Peminjaman::where('telat', 'true')->count();
    $bukuPopuler = Peminjaman::select('id_buku')
      ->groupBy('id_buku')
      ->orderByDesc(DB::raw('COUNT(*)')) // Mengurutkan berdasarkan jumlah peminjaman
      ->limit(1)
      ->with('buku:id,judul') // Hanya ambil kolom id dan judul dari tabel buku
      ->get()
      ->pluck('buku.judul');

      $bukuPopulerString = $bukuPopuler->implode(', ');

    return view("pages.buku.index", compact('buku', 'totalBuku', 'bukuSedangDipinjam', 'bukuHilang', 'bukuPopulerString'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('pages.buku.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      "judul"         => "required",
      "sku"           => "required",
      "pengarang"     => "required",
      "penerbit"      => "required",
      "tahun_terbit"  => "required",
      "gambar"       => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
    ]);

    if ($request->hasFile('gambar')) {
      $imageName = time() . '.' . $request->gambar->getClientOriginalExtension();
      $request->gambar->storeAs('public/photos', $imageName);
      $validatedData['gambar'] = $imageName;
    }

    Buku::create($validatedData);

    return redirect()->route('buku')->with('success', 'Data berhasil ditambahkan');
  }


  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $buku = Buku::find($id);
    return view('pages.buku.edit', compact('buku'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $buku = Buku::findOrFail($id);
    $buku->update($request->all());
    return redirect()->route('buku')->with('success', 'Berhasil mengedit data');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $buku = Buku::findOrFail($id);
    $buku->delete();
    return redirect()->route('buku')->with('success', 'Data berhasil di hapus');
  }

  public function search(Request $request)
  {
    $query = $request->input('query');
    $buku = Buku::query(); // Adjust the query logic here

    if ($query) {
      $buku->where('judul', 'like', "%$query%") // You can add more columns to search here
        ->orWhere('sku', 'like', "%$query%")
        ->orWhere('penerbit', 'like', "%$query%")
        ->orWhere('tahun_terbit', 'like', "%$query%")
        ->orWhere('pengarang', 'like', "%$query%");
    }

    $totalBuku = Buku::count();

    $buku = $buku->get();
    return view('pages.buku.index', compact('buku', 'totalBuku')); // Adjust the view name
  }
}
