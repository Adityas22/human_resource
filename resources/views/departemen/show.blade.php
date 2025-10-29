@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <section class="section">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                     Detail Departemen
                </h5>
                <a href="{{ route('departemen.index') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <tbody>
                            <tr>
                                <th class="text-muted" width="30%">ID</th>
                                <td>{{ $departemen->id }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Nama Departemen</th>
                                <td class="fw-semibold">{{ $departemen->nama }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Deskripsi</th>
                                <td>{{ $departemen->deskripsi }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Alamat</th>
                                <td>{{ $departemen->alamat }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Status</th>
                                <td>
                                    @if (strtolower($departemen->status) == 'aktif')
                                        <span class="badge bg-success px-3 py-2">aktif</span>
                                    @elseif (strtolower($departemen->status) == 'nonaktif')
                                        <span class="badge bg-warning text-dark px-3 py-2">Non-aktif</span>
                                    @else
                                        <span class="badge bg-secondary px-3 py-2">{{ ucfirst($departemen->status) }}</span>
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
