@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Manajemen Edit Data Tugas</h5>
            </div>
            <div class="card-body">
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                <form action="{{ route ('task.update', $task->id)}}" method="POST">
                    @csrf
                    <!-- nambahin buat edit -->
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Tugas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" id="nama"
                                placeholder="Isikan Nama Tugas" value="{{old('nama', $task->nama)}}">
                            @error('nama')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="deskripsi" id="deskripsi"
                                placeholder="Isikan Deskripsi" value="{{old('deskripsi', $task->deskripsi)}} ">
                            @error('deskripsi')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tenggat_waktu" class="col-sm-2 col-form-label">Tenggat Waktu</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                                <input type="text" class="form-control @error('tenggat_waktu') is-invalid @enderror"
                                    name="tenggat_waktu" id="tenggat_waktu" placeholder="Pilih tanggal & waktu"
                                    value="{{ old('tenggat_waktu') }}">
                            </div>
                            @error('tenggat_waktu')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="">Pilih Status</option>
                                <option value="Pending" @if (old('status', $task->status)=='Pending') selected
                                    @endif>Pending</option>
                                <option value="Selesai" @if (old('status', $task->status)=='Selesai') selected
                                    @endif>Selesai</option>
                            </select>
                            @error('status')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="penugasan" class="col-sm-2 col-form-label">Karyawan</label>
                        <div class="col-sm-10">
                            <select name="penugasan" id="penugasan"
                                class="form-select @error('penugasan') is-invalid @enderror">
                                <option value="">Pilih Karyawan</option>
                                @foreach ($karyawans as $karyawan)
                                <option value="{{ $karyawan->id }}" @if (old('penugasan')==$karyawan->id) selected
                                    @endif>{{ $karyawan->nama }}</option>
                                @endforeach
                            </select>
                            @error('penugasan')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                    <a href="{{ route('task.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </section>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection