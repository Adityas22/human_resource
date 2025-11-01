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
                                        <a href="{{ route('role.edit', $role->id) }}"
                                            class="btn btn-secondary btn-sm">Edit</a>
                                        <!-- Tombol untuk membuka modal -->
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalHapus{{ $role->id }}">
                                            Hapus
                                        </button>

                                    </td>
                                </tr>
                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="modalHapus{{ $role->id }}" tabindex="-1"
                                    aria-labelledby="modalHapusLabel{{ $role->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content border-0 shadow">
                                            <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title" id="modalHapusLabel{{ $role->id }}">
                                                    <i class="bi bi-exclamation-triangle-fill me-2"></i> Konfirmasi Hapus
                                                </h5>
                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal" aria-label="Tutup"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <p>Apakah kamu yakin ingin menghapus role
                                                    <strong>{{ $role->nama }}</strong> ini?
                                                </p>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <form action="{{ route('role.destroy', $role->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
