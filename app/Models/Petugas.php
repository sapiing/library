<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
  use HasFactory;

  protected $fillable = ['nama', 'alamat', 'nomor_telepon', 'email', 'jenis_kelamin'];

  protected $table = 'petugas';

  public function peminjaman()
  {
    return $this->hasMany(Peminjaman::class, 'id_petugas');
  }
}
