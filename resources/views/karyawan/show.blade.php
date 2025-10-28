@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <section class="section">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="bi bi-clipboard-check me-2"></i> Detail Karyawan
                </h5>
                <a href="{{ route('karyawan.index') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <tbody>
                            <tr>
                                <th class="text-muted" width="30%">ID</th>
                                <td>{{ $karyawan->id }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Nama Karyawan</th>
                                <td class="fw-semibold">{{ $karyawan->nama }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Email</th>
                                <td>{{ $karyawan->email }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">No HP</th>
                                <td>{{ $karyawan->nomor_hp }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Alamat</th>
                                <td>{{ $karyawan->alamat }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Tanggal Lahir</th>
                                <td>
                                    {{-- buat ngatur format --}}
                                    {{ \Carbon\Carbon::parse($karyawan->tgl_lahir)->format('d M Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th class="text-muted">Tanggal Rekrutmen</th>
                                <td>
                                    {{-- buat ngatur format --}}
                                    {{ \Carbon\Carbon::parse($karyawan->tgl_rekrutment)->format('d M Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th class="text-muted">Departemen</th>
                                <td>{{ $karyawan->departemen->nama }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Role</th>
                                <td>{{ $karyawan->role->nama }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Status</th>
                                <td>
                                    @if (strtolower($karyawan->status) == 'aktif')
                                        <span class="badge bg-success px-3 py-2">aktif</span>
                                    @elseif (strtolower($karyawan->status) == 'nonaktif')
                                        <span class="badge bg-warning text-dark px-3 py-2">Non-aktif</span>
                                    @else
                                        <span class="badge bg-secondary px-3 py-2">{{ ucfirst($karyawan->status) }}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="text-muted">Gaji</th>
                                <td>{{ $karyawan->gaji }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- Bootstrap Icons --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection
