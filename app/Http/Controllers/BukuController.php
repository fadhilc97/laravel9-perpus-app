<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.buku.index', [
            'title' => 'Buku',
            'buku' => Buku::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.buku.create', [
            'title' => 'Buat Buku'
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
            'judul' => 'required',
            'no_buku' => 'required|unique:buku',
            'penerbit' => 'required'
        ]);

        Buku::create($validatedData);
        return redirect('/buku')->with(['success' => 'Buku berhasil dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        return view('pages.buku.detail', [
            'title' => 'Detail Buku',
            'buku' => $buku
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        return view('pages.buku.edit', [
            'title' => 'Ubah Buku',
            'buku' => $buku
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'no_buku' => 'required|unique:buku,no_buku,'.$buku->id,
            'penerbit' => 'required'
        ]);

        $buku->update($validatedData);
        return redirect('/buku')->with(['success' => 'Buku berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect('/buku')->with(['success' => 'Buku berhasil dihapus']);
    }
}
