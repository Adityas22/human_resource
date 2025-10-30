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
                <h5 class="card-title">Daftar Tugas</h5>
                {{-- mengarah controler kehadiran  --}}
                <a href="{{ route('kehadiran.create') }}" class="btn btn-primary btn-sm"> 
                    <i class="bi bi-plus-circle"></i> Tambah Data
                </a>
            </div>
            <!-- Tombol Tambah Data -->
            
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
                            <td>{{ $kehadiran->check_out }}</td>
                            <td>{{ $kehadiran->date }}</td>
                            <td>
                                @php
                                    $status = strtolower(trim($kehadiran->status));
                                @endphp
                                @if ($status == 'hadir')
                                    <span class="text-success fw-semibold">hadir</span>
                                @elseif ($status == 'sakit')
                                    <span class="text-warning fw-semibold">sakit</span>
                                @else
                                    {{-- <a class="text-info fw-semibold">{{ ($status) }}</a> --}}
                                @endif
                            </td>
                            <td>
                                <!-- Tombol Detail -->
                                {{-- <a class="btn btn-info btn-sm" href="{{ route('kehadiran.show',  $kehadiran->id) }}">
                                    Detail
                                </a> --}}
                                <a href="{{ route('kehadiran.edit', $kehadiran->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                {{-- <a href="{{ route('kehadiran.delete', $kehadiran->id) }}" class="btn btn-danger btn-sm">Hapus</a> --}}
                                <form action="{{ route('kehadiran.destroy', $kehadiran->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
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