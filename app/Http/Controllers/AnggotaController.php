<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\SerialNumber;
use App\Models\Anggota;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Anggota::all();
        return view('pages.anggota.index', [
            'title' => 'Anggota',
            'anggota' => $anggota
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
        $no_anggota_baru = SerialNumber::get_serial_number($next_id, 5);

        return view('pages.anggota.create', [
            'title' => 'Buat Anggota Baru',
            'no_anggota_baru' => $no_anggota_baru
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
            'nama' => 'required',
            'no_anggota' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
        ]);

        Anggota::create($validatedData);
        return redirect('/anggota')->with(['success' => 'Anggota berhasil dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggotum)
    {
        return view('pages.anggota.detail', [
            'title' => 'Detail Anggota',
            'anggota' => $anggotum
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggota $anggotum)
    {
        return view('pages.anggota.edit', [
            'title' => 'Ubah Anggota',
            'anggota' => $anggotum
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anggota $anggotum)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
        ]);

        $anggotum->update($validatedData);
        return redirect('/anggota')->with(['success' => 'Anggota berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggota $anggotum)
    {
        $anggotum->delete();
        return redirect('/anggota')->with(['success' => 'Anggota berhasil dihapus']);
    }
}
