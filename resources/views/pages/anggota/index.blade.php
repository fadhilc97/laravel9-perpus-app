@extends('layout')

@section('content')
  <a href="/anggota/create" class="btn btn-sm btn-primary mb-4">Buat Baru</a>
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
        <th>No. Anggota</th>
        <th>Nama</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($anggota as $a)    
        <tr>
          <td></td>
          <td>{{ $a->no_anggota }}</td>
          <td>{{ $a->nama }}</td>
          <td>{{ $a->tempat_lahir }}</td>
          <td>{{ date('d/m/Y', strtotime($a->tanggal_lahir)) }}</td>
          <td>
            <a href="/anggota/{{ $a->id }}" class="badge text-bg-primary text-decoration-none">Detail</a>
            <a href="/anggota/{{ $a->id }}/edit" class="badge text-bg-warning text-decoration-none">Ubah</a>
            <form action="/anggota/{{ $a->id }}" class="d-inline" method="post">
              @csrf
              @method('delete')
              <button class="badge text-bg-danger text-decoration-none border-0" onclick="return confirm('Apakah Anda yakin ingin melanjutkan ?');">Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="6" class="text-center">Data kosong</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection