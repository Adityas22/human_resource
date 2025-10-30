@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Manajemen Edit Data role</h5>
            </div>
            <div class="card-body">
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                <form action="{{ route('role.update', $role->id) }}" method="POST">
                    @csrf
                    <!-- nambahin buat edit -->
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama role</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" id="nama"
                                placeholder="Isikan Nama Tugas" value="{{old('nama', $role->nama)}}">
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
                                placeholder="Isikan deskripsi" value="{{old('deskripsi', $role->deskripsi)}} ">
                            @error('deskripsi')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                    <a href="{{ route('role.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>  
        </div>
    </section>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection