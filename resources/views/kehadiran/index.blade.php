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
                                    <a href="{{ route('kehadiran.edit', $kehadiran->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                    <form action="{{ route('kehadiran.destroy', $kehadiran->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                @else
                                    {{-- Jika karyawan belum checkout, tampilkan tombol Checkout --}}
                                    @if (!$kehadiran->check_out)
                                        <form action="{{ route('kehadiran.checkout', $kehadiran->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-warning btn-sm">Check Out</button>
                                        </form>
                                    @else
                                        <span class="text-muted">Sudah Check Out</span>
                                    @endif
                                @endif
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
