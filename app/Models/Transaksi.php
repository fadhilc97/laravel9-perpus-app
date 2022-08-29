<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $fillable = ['no_transaksi', 'peminjam_id', 'buku_id', 'tanggal_pinjam', 'tanggal_kembali'];

    public function peminjam() {
        return $this->belongsTo(Anggota::class, 'peminjam_id');
    }

    public function buku() {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
