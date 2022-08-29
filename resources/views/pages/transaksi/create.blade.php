@extends('layout')

@section('content')
<form action="/transaksi" method="post">
  @csrf
  <div class="mb-3 row">
    <label for="no_transaksi" class="col-sm-2 col-form-label">No. Transaksi</label>
    <div class="col-sm-3">
      <input readonly class="form-control form-control-sm form-control-plaintext" type="text" id="no_transaksi" name="no_transaksi" value="{{ old('no_transaksi', $no_transaksi_baru) }}">
      @error('no_transaksi')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="peminjam_id" class="col-sm-2 col-form-label">Peminjam</label>
    <div class="col-sm-3">
      <select class="form-select form-select-sm" name="peminjam_id">
        <option value="" @selected(!old('peminjam_id'))>(Pilih Peminjam)</option>
        @foreach ($anggota as $a)
          <option value="{{ $a->id }}" @selected($a->id == old('peminjam_id'))>{{ $a->nama }}</option>
        @endforeach
      </select>
      @error('peminjam_id')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="buku_id" class="col-sm-2 col-form-label">Buku</label>
    <div class="col-sm-3">
      <select class="form-select form-select-sm" name="buku_id">
        <option value="" @selected(!old('buku_id'))>(Pilih Buku)</option>
        @foreach ($buku as $b)
          <option value="{{ $b->id }}" @selected($b->id == old('buku_id'))>{{ $b->judul }}</option>
        @endforeach
      </select>
      @error('buku_id')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="tanggal_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="date" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ old('tanggal_pinjam', date('Y-m-d')) }}">
      @error('tanggal_pinjam')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  {{-- <div class="mb-3 row">
    <label for="tanggal_kembali" class="col-sm-2 col-form-label">Tanggal Kembali</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="date" id="tanggal_kembali" name="tanggal_kembali" value="{{ old('tanggal_kembali') }}">
      @error('tanggal_kembali')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div> --}}
  <div class="mb-3 row gap-2">
    <div class="col-form-label">
      <button class="btn btn-sm btn-primary col-sm-1" type="submit">Simpan</button>
      <a href="/transaksi" class="btn btn-sm btn-danger col-sm-1">Batal</a>
    </div>
  </div>
</form>
@endsection