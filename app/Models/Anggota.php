<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
  use HasFactory;

  protected $fillable = ['nama', 'alamat', 'nomor_telepon', 'email'];

  protected $table = 'anggota';

  public function peminjaman()
  {
    return $this->hasMany(Peminjaman::class, 'id_anggota');
  }
}
