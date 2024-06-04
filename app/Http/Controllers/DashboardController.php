<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $totalAnggota = Anggota::count();
      $totalBuku = Buku::count();
      $totalUser = User::count();
      $totalPetugas = Petugas::count();
      $totalPeminjaman = Peminjaman::count();
      $peminjamanBerjalan = Peminjaman::where('dikembalikan', 'false')->get();
      $totalPeminjamanBerjalan = $peminjamanBerjalan->count();
      $peminjamanSelesai = Peminjaman::where('dikembalikan', 'true')->get();
      $totalPeminjamanSelesai = $peminjamanSelesai->count();
        return view('dashboard', compact('totalAnggota', 'totalBuku', 'totalUser', 'totalPetugas', 'totalPeminjaman', 'totalPeminjamanBerjalan', 'totalPeminjamanSelesai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
