@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <h5 class="card-title">Daftar Departemen</h5>
                {{-- mengarah controler departemen  --}}
                <a href="" class="btn btn-primary btn-sm"> 
                    <i class="bi bi-plus-circle"></i> Tambah Data
                </a>
            </div>
            <!-- Tombol Tambah Data -->
            
            <div class="card-body">
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departemens as $departemen)
                        <tr>
                            <td>{{ $departemen->nama }}</td>
                            <td>{{ $departemen->deskripsi }}</td>
                            <td>
                                @php
                                    $status = strtolower(trim($departemen->status));
                                @endphp
                                @if ($status == 'aktif')
                                    <span class="text-success fw-semibold">Aktif</span>
                                @elseif ($status == 'nonaktif')
                                    <span class="text-warning fw-semibold">Non Aktif</span>
                                @else
                                    {{-- <a class="text-info fw-semibold">{{ ($status) }}</a> --}}
                                @endif
                            </td>
                            <td>{{ $departemen->alamat }}</td>
                            <td>
                                <!-- Tombol Detail -->
                                <a class="btn btn-info btn-sm" href="">
                                    Detail
                                </a>
                                @php
                                    $status = strtolower(trim($departemen->status));
                                @endphp

                                  @if ($status == 'nonaktif')
                                        {{-- Kalau pending, hanya tampil tombol Selesai --}}
                                        <a href="" class="btn btn-success btn-sm">Aktif</a>

                                    @elseif ($status == 'aktif')
                                        {{-- Kalau sukses, hanya tampil tombol Pending --}}
                                        <a href="" class="btn btn-warning btn-sm">Non Aktif</a>
                                    @endif

                                <a href="{{ route('departemen.edit', $departemen->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                {{-- <a href="{{ route('departemen.delete', $departemen->id) }}" class="btn btn-danger btn-sm">Hapus</a> --}}
                                <form action="{{ route('departemen.destroy', $departemen->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection