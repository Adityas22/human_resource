@extends('layouts.dashboard')

@section('content')
    <div class="container mt-4">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold">Dashboard</h4>
            <span class="text-muted">Selamat datang, {{ Auth::user()->name }} 👋</span>
        </div>

        {{-- Untuk HR --}}
        @if ($role == 'HR')
            <div class="row text-center">
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h6 class="text-muted">Jumlah Karyawan</h6>
                            <h3 class="fw-bold">{{ $totalKaryawan ?? 0 }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h6 class="text-muted">Cuti Disetujui</h6>
                            <h3 class="fw-bold">{{ $totalCuti ?? 0 }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h6 class="text-muted">Kehadiran Hari Ini</h6>
                            <h3 class="fw-bold">{{ $totalKehadiran ?? 0 }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h6 class="text-muted">Total Pengguna</h6>
                            <h3 class="fw-bold">{{ $totalUser ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="alert alert-info mt-4">
                <i class="bi bi-info-circle"></i> Anda login sebagai <strong>HR</strong>. Anda memiliki akses penuh terhadap
                data karyawan dan cuti.
            </div>

            {{-- Untuk Karyawan --}}
        @else
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Status Kehadiran Hari Ini</h5>
                    @if ($kehadiranHariIni)
                        <p>Check In: <strong>{{ $kehadiranHariIni->check_in }}</strong></p>
                        <p>Check Out: <strong>{{ $kehadiranHariIni->check_out ?? 'Belum Check Out' }}</strong></p>
                        <p>Status: <span class="badge bg-success">{{ $kehadiranHariIni->status }}</span></p>
                    @else
                        <p class="text-muted">Anda belum melakukan Check In hari ini.</p>
                    @endif
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Riwayat Cuti Terakhir</h5>
                    @if (count($cutiSaya) > 0)
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Jenis Cuti</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cutiSaya as $cuti)
                                    <tr>
                                        <td>{{ $cuti->jenis_cuti }}</td>
                                        <td>{{ $cuti->mulai }}</td>
                                        <td>{{ $cuti->selesai }}</td>
                                        <td>
                                            <span
                                                class="badge 
                                            @if ($cuti->status == 'Disetujui') bg-success 
                                            @elseif($cuti->status == 'Ditolak') bg-danger 
                                            @else bg-warning text-dark @endif">
                                                {{ $cuti->status }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-muted mb-0">Belum ada pengajuan cuti.</p>
                    @endif
                </div>
            </div>

            <div class="alert alert-secondary mt-4">
                <i class="bi bi-person-circle"></i> Anda login sebagai <strong>Karyawan</strong>.
            </div>
        @endif
    </div>
@endsection
