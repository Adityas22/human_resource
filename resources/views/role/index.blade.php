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
                <h5 class="card-title">Daftar role</h5>
                {{-- mengarah controler role  --}}
                <a href="{{ route('role.create') }}" class="btn btn-primary btn-sm"> 
                    <i class="bi bi-plus-circle"></i> Tambah Data
                </a>
            </div>
            <!-- Tombol Tambah Data -->
            
            <div class="card-body">
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->nama }}</td>
                            <td>{{ $role->deskripsi }}</td>
                            <td>
                                {{-- <!-- Tombol Detail -->
                                <a class="btn btn-info btn-sm" href="{{ route('role.show', $role->id) }}">
                                    Detail
                                </a> --}}
                                <a href="{{ route('role.edit', $role->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                {{-- <a href="{{ route('role.delete', $role->id) }}" class="btn btn-danger btn-sm">Hapus</a> --}}
                                <form action="{{ route('role.destroy', $role->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?');">
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