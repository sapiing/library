<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
  use HasFactory;

  protected $fillable = ['judul', 'sku', 'pengarang', 'penerbit', 'tahun_terbit', 'gambar'];

  protected $table = 'buku';

  public function peminjaman()
  {
    return $this->hasMany(Peminjaman::class, 'id_buku');
  }
}
