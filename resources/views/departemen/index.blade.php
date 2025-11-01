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
                    <a href="{{ route('departemen.create') }}" class="btn btn-primary btn-sm">
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
                                        <a class="btn btn-info btn-sm"
                                            href="{{ route('departemen.show', $departemen->id) }}">
                                            Detail
                                        </a>
                                        @php
                                            $status = strtolower(trim($departemen->status));
                                        @endphp

                                        @if ($status == 'nonaktif')
                                            {{-- Kalau pending, hanya tampil tombol Selesai --}}
                                            <a href="{{ route('departemen.aktif', $departemen->id) }}"
                                                class="btn btn-success btn-sm">Aktif</a>
                                        @elseif ($status == 'aktif')
                                            {{-- Kalau sukses, hanya tampil tombol Pending --}}
                                            <a href="{{ route('departemen.nonaktif', $departemen->id) }}"
                                                class="btn btn-warning btn-sm">Non Aktif</a>
                                        @endif

                                        <a href="{{ route('departemen.edit', $departemen->id) }}"
                                            class="btn btn-secondary btn-sm">Edit</a>
                                        <!-- Tombol untuk membuka modal -->
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalHapus{{ $departemen->id }}">
                                            Hapus
                                        </button>

                                    </td>
                                </tr>
                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="modalHapus{{ $departemen->id }}" tabindex="-1"
                                    aria-labelledby="modalHapusLabel{{ $departemen->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content border-0 shadow">
                                            <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title" id="modalHapusLabel{{ $departemen->id }}">
                                                    <i class="bi bi-exclamation-triangle-fill me-2"></i> Konfirmasi Hapus
                                                </h5>
                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal" aria-label="Tutup"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <p>Apakah kamu yakin ingin menghapus departemen
                                                    <strong>{{ $departemen->nama_departemen }}</strong> ini?</p>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <form action="{{ route('departemen.destroy', $departemen->id) }}"
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
