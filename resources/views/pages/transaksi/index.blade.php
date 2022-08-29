@extends('layout')

@section('content')
  <a href="/transaksi/create" class="btn btn-sm btn-primary mb-4">Buat Baru</a>
  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show my-4 col-6" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>No.</th>
        <th>No. Transaksi</th>
        <th>Peminjam</th>
        <th>Judul Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($transaksi as $t)    
        <tr>
          <td></td>
          <td>{{ $t->no_transaksi }}</td>
          <td>{{ $t->peminjam->nama }}</td>
          <td>{{ $t->buku->judul }}</td>
          <td>{{ $t->tanggal_pinjam ? date('d/m/Y', strtotime($t->tanggal_pinjam)) : '' }}</td>
          <td>{{ $t->tanggal_kembali ? date('d/m/Y', strtotime($t->tanggal_kembali)) : '' }}</td>
          <td>
            <a href="/transaksi/{{ $t->id }}" class="badge text-bg-primary text-decoration-none">Detail</a>
            {{-- <a href="/transaksi/{{ $t->id }}/edit" class="badge text-bg-warning text-decoration-none">Ubah</a> --}}
            @if (empty($t->tanggal_kembali))    
              <form action="/transaksi/{{ $t->id }}" class="d-inline" method="post">
                @csrf
                @method('delete')
                <button class="badge text-bg-danger text-decoration-none border-0" onclick="return confirm('Apakah Anda yakin ingin melanjutkan ?');">Hapus</button>
              </form>
            @endif
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="7" class="text-center">Data kosong</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection