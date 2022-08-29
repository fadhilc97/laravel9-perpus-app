@extends('layout')

@section('content')
<form action="/buku" method="post">
  @csrf
  <div class="mb-3 row">
    <label for="no_anggota" class="col-sm-2 col-form-label">No. Buku</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="text" id="no_buku" name="no_buku" value="{{ old('no_buku') }}">
      @error('no_buku')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="text" id="judul" name="judul" value="{{ old('judul') }}">
      @error('judul')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="text" id="penerbit" name="penerbit" value="{{ old('penerbit') }}">
      @error('penerbit')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row gap-2">
    <div class="col-form-label">
      <button class="btn btn-sm btn-primary col-sm-1" type="submit">Simpan</button>
      <a href="/buku" class="btn btn-sm btn-danger col-sm-1">Batal</a>
    </div>
  </div>
</form>
@endsection