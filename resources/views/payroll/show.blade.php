@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">Detail Data Payroll</h5>
                <div>
                    <a href="{{ route('payroll.index') }}" class="btn btn-secondary btn-sm">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button onclick="window.print()" class="btn btn-success btn-sm">
                        <i class="bi bi-printer"></i> Cetak
                    </button>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 200px;">Nama Karyawan</th>
                        <td>{{ $payroll->karyawan->nama }}</td>
                    </tr>
                    <tr>
                        <th>Gaji Pokok</th>
                        <td>Rp {{ number_format($payroll->gaji, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Bonus</th>
                        <td>Rp {{ number_format($payroll->bonus, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Potongan</th>
                        <td>Rp {{ number_format($payroll->potongan, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Gaji Bersih</th>
                        <td><strong>Rp {{ number_format($payroll->gaji_bersih, 0, ',', '.') }}</strong></td>
                    </tr>
                    <tr>
                        <th>Tanggal Pembayaran</th>
                        <td>{{ \Carbon\Carbon::parse($payroll->tgl_pembayaran)->format('d M Y') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
</div>

{{-- CSS Khusus Saat Print --}}
<style>
@media print {
    .btn, .card-header {
        display: none !important;
    }
    body {
        background: white;
    }
    .card {
        border: none;
        box-shadow: none;
    }
}
</style>

@endsection
