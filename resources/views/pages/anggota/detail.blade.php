@extends('layout')

@section('content')
<div class="mt-2 row">
  <div class="col-sm-2">No. Anggota</div>
  <div class="col-sm-3">{{ old('no_anggota', $anggota->no_anggota) }}</div>
</div>
<div class="mt-2 row">
  <div class="col-sm-2">Nama</div>
  <div class="col-sm-3">{{ old('nama',$anggota->nama) }}</div>
</div>
<div class="mt-2 row">
  <div class="col-sm-2">Tempat Lahir</div>
  <div class="col-sm-3">{{ old('tempat_lahir',$anggota->tempat_lahir) }}</div>
</div>
<div class="mt-2 row">
  <div class="col-sm-2">Tanggal Lahir</div>
  <div class="col-sm-3">{{ old('tanggal_lahir',date('d/m/Y', strtotime($anggota->tanggal_lahir))) }}</div>
</div>
<div class="mt-2 row gap-2">
  <div class="col-form-label">
    <a href="/anggota/{{ $anggota->id }}/edit" class="col-sm-1 btn btn-sm btn-warning text-decoration-none">Ubah</a>
    <form action="/anggota/{{ $anggota->id }}" class="d-inline" method="post">
      @csrf
      @method('delete')
      <button class="col-sm-1 btn btn-sm btn-danger text-decoration-none border-0" onclick="return confirm('Apakah Anda yakin ingin melanjutkan ?');">Hapus</button>
    </form>
    <a href="/anggota" class="col-sm-1 btn btn-sm btn-primary text-decoration-none">Kembali</a>
  </div>
</div>
@endsection