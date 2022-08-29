<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index() {
        return view('pages.index', [
            'title' => 'Dashboard',
            'banyak_anggota' => Anggota::all()->count(),
            'banyak_buku' => Buku::all()->count(),
            'banyak_peminjaman' => Transaksi::whereNull('tanggal_kembali')->count(),
            'banyak_pengembalian' => Transaksi::whereNotNull('tanggal_kembali')->count(),
        ]);
    }
}
