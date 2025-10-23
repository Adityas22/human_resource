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
                {{-- mengarah controler task  --}}
                <a href="{{ route('task.create') }}" class="btn btn-primary btn-sm"> 
                    <i class="bi bi-plus-circle"></i> Tambah Data
                </a>
            </div>
            <!-- Tombol Tambah Data -->
            
            <div class="card-body">
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Penugasan</th>
                            <th>Tenggat Waktu</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->nama }}</td>
                            <td>{{ $task->karyawan->nama }}</td>
                            <td>{{ $task->tenggat_waktu }}</td>
                            <td>
                                @php
                                    $status = strtolower(trim($task->status));
                                @endphp
                                @if ($status == 'selesai')
                                    <span class="text-success fw-semibold">Selesai</span>
                                @elseif ($status == 'pending')
                                    <span class="text-warning fw-semibold">Pending</span>
                                @else
                                    <span class="text-info fw-semibold">{{ ($status) }}</span>
                                @endif
                            </td>
                            <td>
                                <!-- Tombol Detail -->
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal" href="{{ route('task.show',  $task->id) }}">
                                    Detail
                                </button>
                                @php
                                    $status = strtolower(trim($task->status));
                                @endphp

                                  @if ($status == 'pending')
                                        {{-- Kalau pending, hanya tampil tombol Selesai --}}
                                        <a href="" class="btn btn-success btn-sm">Selesai</a>

                                    @elseif ($status == 'selesai')
                                        {{-- Kalau sukses, hanya tampil tombol Pending --}}
                                        <a href="" class="btn btn-warning btn-sm">Pending</a>
                                    @endif

                                <a href="#" class="btn btn-secondary btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
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