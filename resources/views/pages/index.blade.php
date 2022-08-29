@extends('layout')

@section('content')
<div class="row">
  <div class="card text-bg-primary mx-3 col">
    <div class="card-header">Anggota</div>
    <div class="card-body">
      <h5 class="card-title">{{ $banyak_anggota }} orang</h5>
    </div>
  </div>
  
  <div class="card text-bg-primary mx-3 col">
    <div class="card-header">Buku</div>
    <div class="card-body">
      <h5 class="card-title">{{ $banyak_buku }} buku</h5>
    </div>
  </div>
  
  <div class="card text-bg-warning mx-3 col">
    <div class="card-header">Dalam Peminjaman</div>
    <div class="card-body">
      <h5 class="card-title">{{ $banyak_peminjaman }} transaksi</h5>
    </div>
  </div>
  
  <div class="card text-bg-success mx-3 col">
    <div class="card-header">Telah Dikembalikan</div>
    <div class="card-body">
      <h5 class="card-title">{{ $banyak_pengembalian }} transaksi</h5>
    </div>
  </div>
</div>
@endsection