@extends('layout')

@section('content')
  <a href="/buku/create" class="btn btn-sm btn-primary mb-4">Buat Baru</a>
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
        <th>No. Buku</th>
        <th>Judul</th>
        <th>Penerbit</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($buku as $b)
        <tr>
          <td></td>
          <td>{{ $b->no_buku }}</td>
          <td>{{ $b->judul }}</td>
          <td>{{ $b->penerbit }}</td>
          <td>
            <a href="/buku/{{ $b->id }}" class="badge text-bg-primary text-decoration-none">Detail</a>
            <a href="/buku/{{ $b->id }}/edit" class="badge text-bg-warning text-decoration-none">Ubah</a>
            <form action="/buku/{{ $b->id }}" class="d-inline" method="post">
              @csrf
              @method('delete')
              <button class="badge text-bg-danger text-decoration-none border-0" onclick="return confirm('Apakah Anda yakin ingin melanjutkan ?');">Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="5" class="text-center">Data kosong</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection