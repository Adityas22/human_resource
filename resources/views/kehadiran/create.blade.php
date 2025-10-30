@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Manajemen Tambah Data Kehadiran</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('kehadiran.store') }}" method="POST">
                    @csrf

                    {{-- Pilih Karyawan --}}
                    <div class="row mb-3">
                        <label for="karyawan_id" class="col-sm-2 col-form-label">Karyawan</label>
                        <div class="col-sm-10">
                            <select name="karyawan_id" id="karyawan_id" class="form-select @error('karyawan_id') is-invalid @enderror">
                                <option value="">Pilih Karyawan</option>
                                @foreach ($karyawans as $karyawan)
                                    <option value="{{ $karyawan->id }}">
                                        {{ $karyawan->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('karyawan_id')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>                    
                    </div>

                    {{-- Check In --}}
                    <div class="row mb-3">
                        <label for="check_in" class="col-sm-2 col-form-label">Check In</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                                <input 
                                    type="text" 
                                    class="form-control @error('check_in') is-invalid @enderror"
                                    name="check_in" 
                                    id="check_in" 
                                    placeholder="Pilih tanggal dan jam check-in"
                                    value="{{ old('check_in') }}">
                            </div>
                            @error('check_in')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Check Out --}}
                    <div class="row mb-3">
                        <label for="check_out" class="col-sm-2 col-form-label">Check Out</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                                <input 
                                    type="text" 
                                    class="form-control @error('check_out') is-invalid @enderror"
                                    name="check_out" 
                                    id="check_out" 
                                    placeholder="Pilih tanggal dan jam check-out"
                                    value="{{ old('check_out') }}">
                            </div>
                            @error('check_out')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Date --}}
                    <div class="row mb-3">
                        <label for="date" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                                <input 
                                    type="text" 
                                    class="form-control @error('date') is-invalid @enderror"
                                    name="date" 
                                    id="date" 
                                    placeholder="Pilih tanggal kehadiran"
                                    value="{{ old('date') }}">
                            </div>
                            @error('date')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="row mb-3">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="">Pilih Status</option>
                                <option value="hadir" {{ old('status') == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                <option value="sakit" {{ old('status') == 'sakit' ? 'selected' : '' }}>Sakit</option>
                            </select>
                            @error('status')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                    <a href="{{ route('kehadiran.index') }}" class="btn btn-secondary">Kembali</a>
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

{{-- Inisialisasi Flatpickr DateTime --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Check In & Check Out pakai date + time
        flatpickr("#check_in", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            time_24hr: true,
            allowInput: true,
        });

        flatpickr("#check_out", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            time_24hr: true,
            allowInput: true,
        });

        // Date biasa
        flatpickr("#date", {
            dateFormat: "Y-m-d",
            allowInput: true,
        });
    });
</script>
@endsection
