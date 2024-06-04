<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
  use HasFactory;

  protected $fillable = ['tanggal_pinjam', 'id_anggota', 'id_buku', 'dikembalikan', 'id_petugas', 'tanggal_kembali', 'tanggal_dikembalikan'];

  protected $table = 'peminjaman';

  public function buku()
  {
    return $this->belongsTo(Buku::class, 'id_buku');
  }

  public function anggota()
  {
    return $this->belongsTo(Anggota::class, 'id_anggota');
  }

  public function petugas()
  {
    return $this->belongsTo(Petugas::class, 'id_petugas');
  }

  public function setTanggalPinjamAttribute($value)
  {
      $this->attributes['tanggal_pinjam'] = $value;
      $this->attributes['tanggal_kembali'] = Carbon::parse($value)->addDays(7)->format('Y-m-d');
  }
}
