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
                <h5 class="card-title">Daftar Payroll</h5>
                @if (session('role') == 'HR')
                    
                
                {{-- mengarah controler payroll  --}}
                <a href="{{ route('payroll.create') }}" class="btn btn-primary btn-sm"> 
                    <i class="bi bi-plus-circle"></i> Tambah Data
                </a>
                @endif
            </div>
            <!-- Tombol Tambah Data -->
            
            <div class="card-body">
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>Karyawan</th>
                            <th>Gaji</th>
                            <th>Bonus</th>
                            <th>Potongan</th>
                            <th>Gaji Bersih</th>
                            <th>Tgl_Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payrolls as $payroll)
                        <tr>
                            <td>{{ $payroll->karyawan->nama }}</td>
                            <td>{{ $payroll->gaji }}</td>
                            <td>{{ $payroll->bonus }}</td>
                            <td>{{ $payroll->potongan }}</td>
                            <td>{{ $payroll->gaji_bersih }}</td>
                            <td>{{ \Carbon\Carbon::parse($payroll->tgl_pembayaran)->format('d M Y') }}</td>
                            <td>
                                <!-- Tombol Detail -->
                                <a class="btn btn-info btn-sm" href="{{ route('payroll.show',  $payroll->id) }}">
                                    Cetak
                                </a>
                                @if (session('role') == 'HR')
                                <a href="{{ route('payroll.edit', $payroll->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                {{-- <a href="{{ route('payroll.delete', $payroll->id) }}" class="btn btn-danger btn-sm">Hapus</a> --}}
                                <form action="{{ route('payroll.destroy', $payroll->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                                @endif
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