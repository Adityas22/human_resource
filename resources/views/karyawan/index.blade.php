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
                <h5 class="card-title">Daftar Karyawan</h5>
                {{-- mengarah controler task  --}}
                <a href="{{ route('karyawan.create') }}" class="btn btn-primary btn-sm"> 
                    <i class="bi bi-plus-circle"></i> Tambah Data
                </a>
            </div>
            <!-- Tombol Tambah Data -->
            
            <div class="card-body">
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            {{-- <th>Email</th>
                            <th>Alamat</th>
                            <th>Tanggal Lahir</th>
                            <th>Tanggal Rekrutmen</th> --}}
                            <th>Departemen</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Gaji</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($karyawans as $karyawan)
                        <tr>
                            <td>{{ $karyawan->nama }}</td>
                            {{-- <td>{{ $karyawan->email }}</td>
                            <td>{{ $karyawan->alamat }}</td>
                            <td>{{ \Carbon\Carbon::parse($karyawan->tgl_lahir)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($karyawan->tgl_rekrutment)->format('d M Y') }}</td> --}}
                            <td>{{ $karyawan->departemen->nama }}</td>
                            <td>{{ $karyawan->role->nama }}</td>
                            <td>
                                {{-- {{ $karyawan->status }} --}}
                                
                                @if ( strtolower(trim($karyawan->status)) == 'aktif')
                                    <span class="badge bg-success px-3 py-2">Aktif</span>
                                @else
                                    <span class="badge bg-warning text-dark px-3 py-2">Nonaktif</span>
                                @endif
                            </td>
                            <td>{{ $karyawan->gaji }}</td>

                            <td>
                                <!-- Tombol Detail -->
                                <a class="btn btn-info btn-sm" href="{{ route('karyawan.show', $karyawan->id) }}">
                                    Detail
                                </a>

                                    @if (strtolower(trim($karyawan->status)) == 'nonaktif')
                                        <a href="{{ route('karyawan.active', $karyawan->id) }}" class="btn btn-success btn-sm">Aktif</a>
                                    @elseif (strtolower(trim($karyawan->status)) == 'aktif')
                                        <a href="{{ route('karyawan.nonActive', $karyawan->id) }}" class="btn btn-warning btn-sm">Non-Aktif</a>
                                    @endif

                                <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?');">
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