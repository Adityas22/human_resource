@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Tambah Data Kehadiran</h5>
            </div>
            <div class="card-body">

                {{-- Jika login sebagai HR --}}
                @if (session('role') == 'HR')
                <form action="{{ route('kehadiran.store') }}" method="POST">
                    @csrf

                    {{-- Pilih Karyawan --}}
                    <div class="row mb-3">
                        <label for="karyawan_id" class="col-sm-2 col-form-label">Karyawan</label>
                        <div class="col-sm-10">
                            <select name="karyawan_id" id="karyawan_id" class="form-select @error('karyawan_id') is-invalid @enderror">
                                <option value="">Pilih Karyawan</option>
                                @foreach ($karyawans as $karyawan)
                                    <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
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
                            <input type="text" class="form-control @error('check_in') is-invalid @enderror"
                                   name="check_in" id="check_in"
                                   placeholder="Pilih tanggal dan jam check-in"
                                   value="{{ old('check_in') }}">
                            @error('check_in')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Check Out --}}
                    <div class="row mb-3">
                        <label for="check_out" class="col-sm-2 col-form-label">Check Out</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('check_out') is-invalid @enderror"
                                   name="check_out" id="check_out"
                                   placeholder="Pilih tanggal dan jam check-out"
                                   value="{{ old('check_out') }}">
                            @error('check_out')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Date --}}
                    <div class="row mb-3">
                        <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('date') is-invalid @enderror"
                                   name="date" id="date"
                                   placeholder="Pilih tanggal kehadiran"
                                   value="{{ old('date') }}">
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

                    <button type="submit" class="btn btn-primary">Presensi</button>
                    <a href="{{ route('kehadiran.index') }}" class="btn btn-secondary">Kembali</a>
                </form>

                {{-- Jika login selain HR --}}
                @else

                <form action="{{ route('kehadiran.store') }}" method="POST">
                @csrf

                {{-- Nama Karyawan (readonly) --}}
                {{-- <div class="row mb-3">
                    <label for="karyawan_nama" class="col-sm-2 col-form-label">Karyawan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="karyawan_nama"
                            value="{{ auth()->user()->nama }}" readonly> --}}
                        {{-- kirim id karyawan sebenarnya --}}
                        {{-- <input type="hidden" name="karyawan_id" value="{{ auth()->user()->id }} ">
                    </div>
                </div> --}}

                {{-- Check In --}}
                {{-- <div class="row mb-3">
                    <label for="check_in" class="col-sm-2 col-form-label">Check In</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('check_in') is-invalid @enderror"
                            name="check_in" id="check_in"
                            placeholder="Pilih tanggal dan jam check-in"
                            value="{{ old('check_in') }}">
                        @error('check_in')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div> --}}

                {{-- Check Out --}}
                {{-- <div class="row mb-3">
                    <label for="check_out" class="col-sm-2 col-form-label">Check Out</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('check_out') is-invalid @enderror"
                            name="check_out" id="check_out"
                            placeholder="Pilih tanggal dan jam check-out"
                            value="{{ old('check_out') }}">
                        @error('check_out')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div> --}}

                {{-- Date --}}
                {{-- <div class="row mb-3">
                    <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('date') is-invalid @enderror"
                            name="date" id="date"
                            placeholder="Pilih tanggal kehadiran"
                            value="{{ old('date') }}">
                        @error('date')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div> --}}

                {{-- Status --}}
                {{-- <div class="row mb-3">
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
                </div> --}}

                <div class="mb-3">
                    <div class="p-5 bg-light">Silahkan Presensi di bawah ini</div>
                </div>

                <button type="submit" class="btn btn-primary">Presensi</button>
                <a href="{{ route('kehadiran.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
                @endif
            </div>
        </div>
    </section>
</div>

{{-- Flatpickr hanya aktif untuk HR --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    if (document.getElementById("check_in")) {
        flatpickr("#check_in", { enableTime: true, dateFormat: "Y-m-d H:i", time_24hr: true });
        flatpickr("#check_out", { enableTime: true, dateFormat: "Y-m-d H:i", time_24hr: true });
        flatpickr("#date", { dateFormat: "Y-m-d" });
    }
});
</script>
@endsection
