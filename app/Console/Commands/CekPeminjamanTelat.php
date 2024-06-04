<?php

namespace App\Console\Commands;

use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CekPeminjamanTelat extends Command
{
  protected $signature = 'cek:peminjaman-telat';
  protected $description = 'Cek peminjaman yang sudah lewat tanggal kembali dan update status telat';

  public function handle()
  {
    $peminjamanTelat = Peminjaman::where('dikembalikan', 'false')
      ->whereDate('tanggal_kembali', '<', Carbon::now())
      ->get();

    foreach ($peminjamanTelat as $peminjaman) {
      $peminjaman->telat = 'true';
      $peminjaman->save();
      $this->info("Peminjaman ID {$peminjaman->id} ditandai sebagai telat.");
    }
  }
}
