@extends('layout')

@section('content')
@error('error')  
<div class="col-sm-6 alert alert-danger alert-dismissible fade show" role="alert">
  {{ $message }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@enderror
@if(session('success'))  
<div class="col-sm-6 alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="mt-2 row">
  <div class="col-sm-2">No. Transaksi</div>
  <div class="col-sm-3">
    <div class="col-sm-3">
      {{ old('peminjam_id', $transaksi->no_transaksi) }}
    </div>
  </div>
</div>
<div class="mt-2 row">
  <div class="col-sm-2">Peminjam</div>
  <div class="col-sm-3">
    <div class="col-sm-3">
      {{ old('peminjam_id', $transaksi->peminjam->nama) }}
    </div>
  </div>
</div>
<div class="mt-2 row">
  <div class="col-sm-2">Buku</div>
  <div class="col-sm-3">
    {{ old('buku_id', $transaksi->buku->judul) }}
  </div>
</div>
<div class="mt-2 row">
  <div class="col-sm-2">Tanggal Pinjam</div>
  <div class="col-sm-3">
    {{ old('tanggal_pinjam', date('d/m/Y', strtotime($transaksi->tanggal_pinjam))) }}
  </div>
</div>
<div class="mt-2 row">
  <div class="col-sm-2">Tanggal Kembali</div>
  <div class="col-sm-3">
    {{ $transaksi->tanggal_kembali ? old('tanggal_kembali', date('d/m/Y', strtotime($transaksi->tanggal_kembali))) : '' }}
  </div>
</div>
<div class="mt-2 row gap-2">
  <div class="col-form-label">
    @if(empty($transaksi->tanggal_kembali))
      <button type="button" class="col-sm-1 btn btn-sm btn-success text-decoration-none" data-bs-toggle="modal" data-bs-target="#kembali_buku_wizard">Kembalikan</button>
      @include('wizards.kembali_buku')
      <form action="/transaksi/{{ $transaksi->id }}" class="d-inline" method="post">
        @csrf
        @method('delete')
        <button class="col-sm-1 btn btn-sm btn-danger text-decoration-none border-0" onclick="return confirm('Apakah Anda yakin ingin melanjutkan ?');">Hapus</button>
      </form>
    @endif
    <a href="/transaksi" class="col-sm-1 btn btn-sm btn-primary text-decoration-none">Kembali</a>
  </div>
</div>
@endsection