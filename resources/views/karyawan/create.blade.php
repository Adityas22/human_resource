@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Manajemen Tambah Data Karyawan</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('karyawan.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Karyawan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Isikan Nama Karyawan">
                            @error('nama')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Isikan Email">
                            @error('email')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="nomor_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" placeholder="Isikan Nomor HP">
                            @error('nomor_hp')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Isikan Alamat">
                            @error('alamat')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Date Picker: Tanggal Lahir --}}
                    <div class="row mb-3">
                        <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                                <input type="text" class="form-control @error('tgl_lahir') is-invalid @enderror"
                                    name="tgl_lahir" id="tgl_lahir" placeholder="Pilih tanggal lahir">
                            </div>
                            @error('tgl_lahir')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Date Picker: Tanggal Rekrutment --}}
                    <div class="row mb-3">
                        <label for="tgl_rekrutment" class="col-sm-2 col-form-label">Tanggal Rekrutment</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                                <input type="text" class="form-control @error('tgl_rekrutment') is-invalid @enderror"
                                    name="tgl_rekrutment" id="tgl_rekrutment" placeholder="Pilih tanggal rekrutment">
                            </div>
                            @error('tgl_rekrutment')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="departemen_id" class="col-sm-2 col-form-label">Departemen</label>
                        <div class="col-sm-10">
                            <select name="departemen_id" id="departemen_id" class="form-select @error('departemen_id') is-invalid @enderror">
                                <option value="">Pilih Departemen</option>
                                @foreach ($departemens as $departemen)
                                <option value="{{ $departemen->id }}">{{ $departemen->nama }}</option>
                                @endforeach
                            </select>
                            @error('departemen_id')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="roles_id" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <select name="roles_id" id="roles_id" class="form-select @error('roles_id') is-invalid @enderror">
                                <option value="">Pilih Role</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->nama }}</option>
                                @endforeach
                            </select>
                            @error('roles_id')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="">Pilih Status</option>
                                <option value="non-aktif">Non Aktif</option>
                                <option value="aktif">Aktif</option>
                            </select>
                            @error('status')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- gaji --}}
                    <div class="row mb-3">
                        <label for="gaji" class="col-sm-2 col-form-label">Gaji</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="gaji" id="gaji" placeholder="Isikan gaji">
                            @error('gaji')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </section>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

{{-- Flatpickr JS & CSS --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

{{-- Inisialisasi Datepicker --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr("#tgl_lahir", {
            dateFormat: "Y-m-d",
            allowInput: true,
        });

        flatpickr("#tgl_rekrutment", {
            dateFormat: "Y-m-d",
            allowInput: true,
        });
    });
</script>
@endsection
