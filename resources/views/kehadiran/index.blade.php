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
                    <h5 class="card-title">Daftar Kehadiran</h5>

                    {{-- @if (session('role') == 'HR') --}}
                    <a href="{{ route('kehadiran.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle"></i> Tambah Data
                    </a>
                    {{-- @endif --}}
                </div>

                <div class="card-body">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>Karyawan</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kehadirans as $kehadiran)
                                <tr>
                                    <td>{{ $kehadiran->karyawan->nama }}</td>
                                    <td>{{ $kehadiran->check_in }}</td>
                                    <td>{{ $kehadiran->check_out ?? '-' }}</td>
                                    <td>{{ $kehadiran->date }}</td>
                                    <td>
                                        @php
                                            $status = strtolower(trim($kehadiran->status));
                                        @endphp
                                        @if ($status == 'hadir')
                                            <span class="text-success fw-semibold">Hadir</span>
                                        @elseif ($status == 'sakit')
                                            <span class="text-warning fw-semibold">Sakit</span>
                                        @else
                                            <span class="text-secondary fw-semibold">{{ ucfirst($status) }}</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if (session('role') == 'HR')
                                            {{-- Aksi khusus HR --}}
                                            <a href="{{ route('kehadiran.edit', $kehadiran->id) }}"
                                                class="btn btn-secondary btn-sm">Edit</a>
                                            <!-- Tombol untuk membuka modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modalHapus{{ $kehadiran->id }}">
                                                Hapus
                                            </button>
                                        @else
                                            {{-- Jika karyawan belum checkout, tampilkan tombol Checkout --}}
                                            @if (!$kehadiran->check_out)
                                                <form action="{{ route('kehadiran.checkout', $kehadiran->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning btn-sm">Check Out</button>
                                                </form>
                                            @else
                                                <span class="text-muted">Sudah Check Out</span>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="modalHapus{{ $kehadiran->id }}" tabindex="-1"
                                    aria-labelledby="modalHapusLabel{{ $kehadiran->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content border-0 shadow">
                                            <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title" id="modalHapusLabel{{ $kehadiran->id }}">
                                                    <i class="bi bi-exclamation-triangle-fill me-2"></i> Konfirmasi Hapus
                                                </h5>
                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal" aria-label="Tutup"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <p>Apakah kamu yakin ingin menghapus data kehadiran untuk
                                                    <strong>{{ $kehadiran->karyawan->nama ?? 'Karyawan' }}</strong>
                                                    pada tanggal
                                                    <strong>{{ \Carbon\Carbon::parse($kehadiran->tanggal)->format('d M Y') }}</strong>?
                                                </p>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <form action="{{ route('kehadiran.destroy', $kehadiran->id) }}"
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
