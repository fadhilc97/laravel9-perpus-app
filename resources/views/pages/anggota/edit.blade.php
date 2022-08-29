@extends('layout')

@section('content')
<form action="/anggota/{{ $anggota->id }}" method="post">
  @csrf
  @method('put')
  <div class="mb-3 row">
    <label for="no_anggota" class="col-sm-2 col-form-label">No. Anggota</label>
    <div class="col-sm-3">
      <input readonly disabled class="form-control form-control-sm" type="text" id="no_anggota" name="no_anggota" value="{{ old('no_anggota', $anggota->no_anggota) }}">
      @error('no_anggota')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="text" id="nama" name="nama" value="{{ old('nama',$anggota->nama) }}">
      @error('nama')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir',$anggota->tempat_lahir) }}">
      @error('tempat_lahir')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir',$anggota->tanggal_lahir) }}">
      @error('tanggal_lahir')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row gap-2">
    <div class="col-form-label">
      <button class="btn btn-sm btn-primary col-sm-1" type="submit">Simpan</button>
      <a href="/anggota" class="btn btn-sm btn-danger col-sm-1">Batal</a>
    </div>
  </div>
</form>
@endsection