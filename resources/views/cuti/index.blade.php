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
                <h5 class="card-title">Daftar Cuti</h5>
                {{-- mengarah controler cuti  --}}
                <a href="{{ route('cuti.create') }}" class="btn btn-primary btn-sm"> 
                    <i class="bi bi-plus-circle"></i> Tambah Data
                </a>
            </div>
            <!-- Tombol Tambah Data -->
            
            <div class="card-body">
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>Karyawan</th>
                            <th>Jenis Cuti</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Status</th>
                            @if(session('role')=='HR')
                            <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cutis as $cuti)
                        <tr>
                            <td>{{ $cuti->karyawan->nama }}</td>
                            <td>{{ $cuti->jenis_cuti }}</td>
                            <td>
                                {{-- buat ngatur format --}}
                                {{ \Carbon\Carbon::parse($cuti->mulai)->format('d M Y') }}
                            </td>
                            <td>
                                {{-- buat ngatur format --}}
                                {{ \Carbon\Carbon::parse($cuti->selesai)->format('d M Y') }}
                            </td>
                            <td>
                                @php
                                    $status = strtolower(trim($cuti->status));
                                @endphp
                                @if ($status == 'terima')
                                    <span class="text-success fw-semibold">terima</span>
                                @elseif ($status == 'tolak')
                                    <span class="text-danger fw-semibold">tolak</span>
                                @else
                                    <a class="text-warning fw-semibold">{{ ($status) }}</a>
                                @endif
                            </td>
                            @if (session('role')=='HR')
                            <td>
                                
                                <!-- Tombol Detail -->
                                <a class="btn btn-success btn-sm" href="{{ route('cuti.terima',  $cuti->id) }}">
                                    Terima 
                                </a> 
                                <a class="btn btn-danger btn-sm" href="{{ route('cuti.tolak',  $cuti->id) }}">
                                    Tolak
                                </a> 
                                <a href="{{ route('cuti.edit', $cuti->id) }}" class="btn btn-secondary btn-sm">Edit</a>

                                <form action="{{ route('cuti.destroy', $cuti->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                                
                            </td>
                            @endif
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