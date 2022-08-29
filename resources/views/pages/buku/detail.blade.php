@extends('layout')

@section('content')
<div class="mt-2 row">
  <div class="col-sm-2">No. Buku</div>
  <div class="col-sm-3">{{ old('no_buku', $buku->no_buku) }}</div>
</div>
<div class="mt-2 row">
  <div class="col-sm-2">Judul</div>
  <div class="col-sm-3">{{ old('judul', $buku->judul) }}</div>
</div>
<div class="mt-2 row">
  <div class="col-sm-2">Penerbit</div>
  <div class="col-sm-3">{{ old('penerbit', $buku->penerbit) }}</div>
</div>
<div class="mt-3 row gap-2">
  <div class="col-form-label">
    <a href="/buku/{{ $buku->id }}/edit" class="col-sm-1 btn btn-sm btn-warning text-decoration-none">Ubah</a>
    <form action="/buku/{{ $buku->id }}" class="d-inline" method="post">
      @csrf
      @method('delete')
      <button class="col-sm-1 btn btn-sm btn-danger text-decoration-none border-0" onclick="return confirm('Apakah Anda yakin ingin melanjutkan ?');">Hapus</button>
    </form>
    <a href="/buku" class="col-sm-1 btn btn-sm btn-primary text-decoration-none">Kembali</a>
  </div>
</div>
@endsection