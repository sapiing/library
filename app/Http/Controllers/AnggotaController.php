<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $anggota = Anggota::orderBy('created_at', 'DESC')->get();
    $totalAnggota = Anggota::count();

    $anggotaSedangMeminjam = Peminjaman::where('dikembalikan', 'false')->distinct('id_anggota')->count();
    return view("pages.anggota.index", compact('anggota', 'totalAnggota', 'anggotaSedangMeminjam'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('pages.anggota.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validateData = $request->validate([
      "nama" => "required",
      "email" => "required",
      "alamat" => "required",
      "nomor_telepon" => "required",
    ]);

    $anggota = new Anggota([
      "nama" => $validateData['nama'],
      'email' => $validateData['email'],
      'alamat' => $validateData['alamat'],
      'nomor_telepon' => $validateData['nomor_telepon'],
    ]);

    $anggota->save();

    return redirect()->route('anggota')->with('success', 'Data berhasil ditambahkan');
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
    $anggota = Anggota::find($id);
    return view('pages.anggota.edit', compact('anggota'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $anggota = Anggota::findOrFail($id);
    $anggota->update($request->all());
    return redirect()->route('anggota')->with('success', 'Berhasil mengedit data');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $anggota = Anggota::findOrFail($id);
    $anggota->delete();
    return redirect()->route('anggota')->with('success', 'Data berhasil di hapus');
  }

  public function search(Request $request)
  {
    $query = $request->input('query');
    $anggota = Anggota::query(); // Adjust the query logic here

    if ($query) {
      $anggota->where('nama', 'like', "%$query%") // You can add more columns to search here
        ->orWhere('nomor_telepon', 'like', "%$query%")
        ->orWhere('email', 'like', "%$query%");
    }

    $totalAnggota = Anggota::count();

    $anggota = $anggota->get();
    return view('pages.anggota.index', compact('anggota', 'totalAnggota')); // Adjust the view name
  }
}
