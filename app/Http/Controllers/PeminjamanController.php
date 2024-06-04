<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Petugas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $peminjaman = Peminjaman::where('dikembalikan', 'false') // Filter peminjaman belum dikembalikan
      ->orderBy('created_at', 'DESC')
      ->get();

    $transaksiBerhasil = Peminjaman::where('dikembalikan', 'true')->count();
    $transaksiPending = Peminjaman::where('dikembalikan', 'false')->where('telat', 'false')->count();
    $transaksiDue = Peminjaman::where('dikembalikan', 'false')->where('telat', 'true')->count();
    $totalTransaksi = Peminjaman::count();

    $totalBerjalan = $transaksiPending + $transaksiDue;
    $totalPeminjaman = $peminjaman->count();



    return view("pages.peminjaman.index", compact('peminjaman', 'totalPeminjaman', 'transaksiBerhasil', 'totalBerjalan', 'totalTransaksi'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $buku = Buku::all();
    $anggota = Anggota::all();
    $petugas = Petugas::all();
    return view('pages.peminjaman.create', compact('buku', 'anggota', 'petugas'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validateData = $request->validate([
      "tanggal_pinjam" => "required",
      "id_buku" => "required",
      "id_anggota" => "required",
      "id_petugas" => "required",
    ]);

    $peminjaman = new Peminjaman([
      "tanggal_pinjam" => $validateData['tanggal_pinjam'],
      "id_buku" => $validateData['id_buku'],
      "id_anggota" => $validateData['id_anggota'],
      "id_petugas" => $validateData['id_petugas']
    ]);

    $peminjaman->save();

    return redirect()->route('peminjaman')->with('success', 'Data berhasil ditambahkan');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $peminjaman = Peminjaman::with('buku', 'anggota', 'petugas')->findOrFail($id);
    return view('pages.peminjaman.show', compact('peminjaman'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $peminjaman = Peminjaman::findOrFail($id);
    $peminjaman->update($request->all());
    return redirect()->route('peminjaman')->with('success', 'Berhasil mengedit data');
  }

  public function search(Request $request)
  {
    $query = $request->input('query');
    $peminjaman = Peminjaman::where('dikembalikan', 'false'); // Filter data yang sudah dikembalikan

    if ($query) {
      $peminjaman->where(function ($q) use ($query) {
        $q->where('tanggal_pinjam', 'like', "%$query%")
          ->orWhere('tanggal_kembali', 'like', "%$query%") // Tambahkan pencarian berdasarkan tanggal_kembali
          ->orWhereHas('anggota', function ($q) use ($query) { // Pencarian berdasarkan nama anggota
            $q->where('nama', 'like', "%$query%");
          })
          ->orWhereHas('buku', function ($q) use ($query) { // Pencarian berdasarkan judul buku
            $q->where('judul', 'like', "%$query%");
          });
      });
    }

    $totalPeminjaman = $peminjaman->count();
    $peminjaman = $peminjaman->orderBy('created_at', 'DESC')->get();

    return view('pages.peminjaman.index', compact('peminjaman', 'totalPeminjaman'));
  }


  public function pengembalianIndex()
  {
      $pengembalian = Peminjaman::where('dikembalikan', 'true')
          ->orderBy('created_at', 'DESC')
          ->get();
      $totalPengembalian = $pengembalian->count();

      // Menghitung top peminjam (anggota yang paling banyak melakukan pengembalian sukses)
      // $topPeminjam = Peminjaman::select('id_anggota', DB::raw('COUNT(*) as total_pengembalian'))
      //     ->where('dikembalikan', 'true')
      //     ->groupBy('id_anggota')
      //     ->orderByDesc('total_pengembalian')
      //     ->limit(1) // Ambil 5 peminjam teratas
      //     ->with('id_anggota') // Eager load nama anggota
      //     ->get();

      return view("pages.pengembalian.index", compact('pengembalian', 'totalPengembalian'));
  }


  public function updateStatus(Request $request, $id)
  {
    $peminjaman = Peminjaman::findOrFail($id);
    $peminjaman->update([
      'dikembalikan' => true,
      'tanggal_dikembalikan' => Carbon::now(),
    ]);

    return redirect()->route('peminjaman')->with('success', 'peminjaman berhasil diproses.'); // Redirect to pengembalian.index
  }

  public function searchPengembalian(Request $request)
  {
    $query = $request->input('query');
    $pengembalian = Peminjaman::where('dikembalikan', 'true'); // Filter data yang sudah dikembalikan

    if ($query) {
      $pengembalian->where(function ($q) use ($query) {
        $q->where('tanggal_pinjam', 'like', "%$query%")
          ->orWhere('tanggal_kembali', 'like', "%$query%") // Tambahkan pencarian berdasarkan tanggal_kembali
          ->orWhereHas('anggota', function ($q) use ($query) { // Pencarian berdasarkan nama anggota
            $q->where('nama', 'like', "%$query%");
          })
          ->orWhereHas('buku', function ($q) use ($query) { // Pencarian berdasarkan judul buku
            $q->where('judul', 'like', "%$query%");
          });
      });
    }

    $totalPengembalian = $pengembalian->count();
    $pengembalian = $pengembalian->orderBy('created_at', 'DESC')->get();

    return view('pages.pengembalian.index', compact('pengembalian', 'totalPengembalian'));
  }

  public function showPengembalian(string $id)
  {
    $pengembalian = Peminjaman::with('buku', 'anggota', 'petugas')
      ->where('dikembalikan', true) // Pastikan data sudah dikembalikan
      ->findOrFail($id);
    return view('pages.pengembalian.show', compact('pengembalian'));
  }
}
