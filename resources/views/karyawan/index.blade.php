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

                                        @if (strtolower(trim($karyawan->status)) == 'aktif')
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
                                            <a href="{{ route('karyawan.active', $karyawan->id) }}"
                                                class="btn btn-success btn-sm">Aktif</a>
                                        @elseif (strtolower(trim($karyawan->status)) == 'aktif')
                                            <a href="{{ route('karyawan.nonActive', $karyawan->id) }}"
                                                class="btn btn-warning btn-sm">Non-Aktif</a>
                                        @endif

                                        <a href="{{ route('karyawan.edit', $karyawan->id) }}"
                                            class="btn btn-secondary btn-sm">Edit</a>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalHapus{{ $karyawan->id }}">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="modalHapus{{ $karyawan->id }}" tabindex="-1"
                                    aria-labelledby="modalHapusLabel{{ $karyawan->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content border-0 shadow">
                                            <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title" id="modalHapusLabel{{ $karyawan->id }}">
                                                    <i class="bi bi-exclamation-triangle-fill me-2"></i> Konfirmasi Hapus
                                                </h5>
                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal" aria-label="Tutup"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <p>Apakah kamu yakin ingin menghapus karyawan
                                                    <strong>{{ $karyawan->nama }}</strong> ini?
                                                </p>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <form action="{{ route('karyawan.destroy', $karyawan->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
