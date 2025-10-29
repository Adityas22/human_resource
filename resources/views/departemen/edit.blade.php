@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Manajemen Edit Data Departemen</h5>
            </div>
            <div class="card-body">
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                <form action="{{ route('departemen.update', $departemen->id) }}" method="POST">
                    @csrf
                    <!-- nambahin buat edit -->
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama departemen</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" id="nama"
                                placeholder="Isikan Nama Tugas" value="{{old('nama', $departemen->nama)}}">
                            @error('nama')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="deskripsi" class="col-sm-2 col-form-label">deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="deskripsi" id="deskripsi"
                                placeholder="Isikan deskripsi" value="{{old('deskripsi', $departemen->deskripsi)}} ">
                            @error('deskripsi')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="alamat" id="alamat"
                                placeholder="Isikan alamat" value="{{old('alamat', $departemen->alamat)}} ">
                            @error('alamat')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="">Pilih Status</option>
                                <option value="nonaktif" @if (old('status', $departemen->status)=='nonaktif') selected
                                    @endif>Non-Aktif</option>
                                <option value="aktif" @if (old('status', $departemen->status)=='aktif') selected
                                    @endif>Aktif</option>
                            </select>
                            @error('status')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                    <a href="{{ route('departemen.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>  
        </div>
    </section>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection