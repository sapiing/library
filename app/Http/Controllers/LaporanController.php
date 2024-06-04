<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $peminjaman = Peminjaman::with('buku', 'anggota', 'petugas');

        $peminjaman->when($request->filled('tanggal_awal') && $request->filled('tanggal_akhir'), function ($query) use ($request) {
            $query->whereBetween('tanggal_pinjam', [$request->input('tanggal_awal'), $request->input('tanggal_akhir')]);
        });

        $peminjaman->when($request->filled('status'), function ($query) use ($request) {
            if ($request->input('status') === 'pending') {
                $query->where('dikembalikan', 'false')->where('telat', 'false');
            } elseif ($request->input('status') === 'due') {
                $query->where('dikembalikan', 'false')->where('telat', 'true');
            } elseif ($request->input('status') === 'success') {
                $query->where('dikembalikan', 'true');
            }
        });

        $peminjaman = $peminjaman->get();

        return view('pages.laporan.index', [
            'peminjaman' => $peminjaman,
            'filters' => $request->only(['tanggal_awal', 'tanggal_akhir', 'status']),
            'tanggalAwal' => $request->input('tanggal_awal'),
            'tanggalAkhir' => $request->input('tanggal_akhir'),
            'statusFilter' => $request->input('status')
        ]);
    }
}
