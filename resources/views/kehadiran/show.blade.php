@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <section class="section">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="bi bi-clipboard-check me-2"></i> Detail kehadiran
                </h5>
                <a href="{{ route('kehadiran.index') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <tbody>
                            <tr>
                                <th class="text-muted" width="30%">ID</th>
                                <td>{{ $kehadiran->id }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Nama karyawan</th>
                                <td class="fw-semibold">{{ $kehadiran->karyawan->nama }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Check in</th>
                                <td>
                                    {{-- buat ngatur format --}}
                                    {{ \Carbon\Carbon::parse($kehadiran->check_in)->format('d M Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th class="text-muted">Check out</th>
                                <td>
                                    {{-- buat ngatur format --}}
                                    {{ \Carbon\Carbon::parse($kehadiran->check_out)->format('d M Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th class="text-muted">Check out</th>
                                <td>
                                    {{-- buat ngatur format --}}
                                    {{ \Carbon\Carbon::parse($kehadiran->date)->format('d M Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th class="text-muted">Status</th>
                                <td>
                                    @if (strtolower($kehadiran->status) == 'hadir')
                                        <span class="badge bg-success px-3 py-2">hadir</span>
                                    @elseif (strtolower($kehadiran->status) == 'sakit')
                                        <span class="badge bg-warning text-dark px-3 py-2">sakit</span>
                                    @else
                                        <span class="badge bg-secondary px-3 py-2">{{ ucfirst($kehadiran->status) }}</span>
                                    @endif
                                </td>
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
