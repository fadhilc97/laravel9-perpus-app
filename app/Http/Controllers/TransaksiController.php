<?php

namespace App\Http\Controllers;

use App\Helpers\SerialNumber;
use App\Models\Transaksi;
use App\Models\Anggota;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.transaksi.index', [
            'title' => 'Transaksi',
            'transaksi' => Transaksi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $table_status = DB::select("SHOW TABLE STATUS LIKE 'anggota'");
        $next_id = $table_status[0]->Auto_increment;   
        $no_transaksi_baru = SerialNumber::get_serial_number($next_id, 5);

        return view('pages.transaksi.create', [
            'title' => 'Buat Transaksi',
            'no_transaksi_baru' => $no_transaksi_baru,
            'anggota' => Anggota::all('id', 'nama'),
            'buku' => Buku::all('id', 'judul')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_transaksi' => 'required',
            'peminjam_id' => 'required',
            'buku_id' => 'required',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'date|after_or_equal:tanggal_pinjam'
        ]);

        Transaksi::create($validatedData);
        return redirect('/transaksi')->with(['success' => 'Transaksi berhasi dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        return view('pages.transaksi.detail', [
            'title' => 'Detail Transaksi',
            'transaksi' => $transaksi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        return view('pages.transaksi.edit', [
            'title' => 'Ubah Transaksi',
            'transaksi' => $transaksi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $validatedData = $request->validate([
            'peminjam_id' => 'required',
            'buku_id' => 'required',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'date|after:tanggal_pinjam'
        ]);

        $transaksi->update($validatedData);
        return redirect('/transaksi')->with(['success' => 'Transaksi berhasi diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect('/transaksi')->with(['success' => 'Transaksi berhasi dihapus']);
    }

    public function return_buku(Request $request, Transaksi $transaksi) {
        $validator = validator($request->all(), [
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam'
        ]);
        if($validator->fails()) {
            return redirect("/transaksi/$transaksi->id")->withErrors(['error' => $validator->errors()]);
        }
        $transaksi->update([
            'tanggal_kembali' => $request->tanggal_kembali
        ]);
        return redirect("/transaksi/$transaksi->id")->with(['success' => 'Transaksi pengembalian berhasil dilakukan']);
    }
}
