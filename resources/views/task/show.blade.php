@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <section class="section">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="bi bi-clipboard-check me-2"></i> Detail Tugas
                </h5>
                <a href="{{ route('task.index') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <tbody>
                            <tr>
                                <th class="text-muted" width="30%">ID</th>
                                <td>{{ $task->id }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Nama Tugas</th>
                                <td class="fw-semibold">{{ $task->nama }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Deskripsi</th>
                                <td>{{ $task->deskripsi }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Tenggat Waktu</th>
                                <td>
                                    {{-- buat ngatur format --}}
                                    {{ \Carbon\Carbon::parse($task->tenggat_waktu)->format('d M Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th class="text-muted">Status</th>
                                <td>
                                    @if (strtolower($task->status) == 'selesai')
                                        <span class="badge bg-success px-3 py-2">Selesai</span>
                                    @elseif (strtolower($task->status) == 'pending')
                                        <span class="badge bg-warning text-dark px-3 py-2">Pending</span>
                                    @else
                                        <span class="badge bg-secondary px-3 py-2">{{ ucfirst($task->status) }}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="text-muted">Karyawan</th>
                                <td>
                                    {{ $task->karyawan->nama }}
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
