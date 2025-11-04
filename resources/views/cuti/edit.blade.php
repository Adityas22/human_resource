@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Manajemen Edit Data Cuti Karyawan</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('cuti.update', $cuti->id) }}" method="POST">
                        @csrf

                        @method('PUT')

                        {{-- Pilih Karyawan --}}
                        <div class="row mb-3">
                            <label for="karyawan_id" class="col-sm-2 col-form-label">Nama Karyawan</label>
                            <div class="col-sm-10">
                                <select name="karyawan_id" id="karyawan_id"
                                    class="form-select @error('karyawan_id') is-invalid @enderror">
                                    <option value="">Pilih Karyawan</option>
                                    @foreach ($karyawans as $karyawan)
                                        <option value="{{ $karyawan->id }}"
                                            {{ $cuti->karyawan_id == $karyawan->id ? 'selected' : '' }}>
                                            {{ $karyawan->nama }}</option>
                                    @endforeach
                                </select>
                                @error('karyawan_id')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Jenis Cuti --}}
                        <div class="row mb-3">
                            <label for="jenis_cuti" class="col-sm-2 col-form-label">Jenis Cuti</label>
                            <div class="col-sm-10">
                                <select name="jenis_cuti" id="jenis_cuti"
                                    class="form-select @error('jenis_cuti') is-invalid @enderror">
                                    <option value="">Pilih Jenis Cuti</option>
                                    <option value="sakit" {{ $cuti->jenis_cuti == 'sakit' ? 'selected' : '' }}>Sakit
                                    </option>
                                    <option value="liburan" {{ $cuti->jenis_cuti == 'liburan' ? 'selected' : '' }}>Liburan
                                    </option>
                                    <option value="cuti" {{ $cuti->jenis_cuti == 'cuti' ? 'selected' : '' }}>Cuti</option>
                                </select>
                                @error('jenis_cuti')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Tanggal Mulai --}}
                        <div class="row mb-3">
                            <label for="mulai" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                                    <input type="date" class="form-control @error('mulai') is-invalid @enderror"
                                        name="mulai" id="mulai" value="{{ old('mulai', $cuti->mulai) }}">
                                </div>
                                @error('mulai')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Tanggal Selesai --}}
                        <div class="row mb-3">
                            <label for="selesai" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                                    <input type="date" class="form-control @error('selesai') is-invalid @enderror"
                                        name="selesai" id="selesai" value="{{ old('selesai', $cuti->selesai) }}">
                                </div>
                                @error('selesai')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Status (hidden input) --}}
                        <input type="hidden" name="status" value="Pending">

                        {{-- Tombol --}}
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('cuti.index') }}" class="btn btn-secondary me-2">Kembali</a>
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
