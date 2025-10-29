@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <section class="section">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="bi bi-clipboard-check me-2"></i> Detail role
                </h5>
                <a href="{{ route('role.index') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <tbody>
                            <tr>
                                <th class="text-muted" width="30%">ID</th>
                                <td>{{ $role->id }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Nama role</th>
                                <td class="fw-semibold">{{ $role->nama }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Deskripsi</th>
                                <td>{{ $role->deskripsi }}</td>
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
