@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Manajemen Tambah Data Payroll</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('payroll.store') }}" method="POST">
                    @csrf

                    {{-- Pilih Karyawan --}}
                    <div class="row mb-3">
                        <label for="karyawan_id" class="col-sm-2 col-form-label">Nama Karyawan</label>
                        <div class="col-sm-10">
                            <select name="karyawan_id" id="karyawan_id" class="form-select @error('karyawan_id') is-invalid @enderror">
                                <option value="">-- Pilih Karyawan --</option>
                                @foreach ($karyawans as $karyawan)
                                    <option value="{{ $karyawan->id }}" data-gaji="{{ $karyawan->gaji }}">
                                        {{ $karyawan->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('karyawan_id')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Gaji Otomatis --}}
                    <div class="row mb-3">
                        <label for="gaji" class="col-sm-2 col-form-label">Gaji Pokok</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="gaji" id="gaji" placeholder="Gaji otomatis terisi" readonly>
                            @error('gaji')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Bonus --}}
                    <div class="row mb-3">
                        <label for="bonus" class="col-sm-2 col-form-label">Bonus</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="bonus" id="bonus" placeholder="Masukkan bonus (jika ada)" value="0">
                            @error('bonus')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Potongan --}}
                    <div class="row mb-3">
                        <label for="potongan" class="col-sm-2 col-form-label">Potongan</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="potongan" id="potongan" placeholder="Masukkan potongan (jika ada)" value="0">
                            @error('potongan')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Gaji Bersih Otomatis --}}
                    <div class="row mb-3">
                        <label for="gaji_bersih" class="col-sm-2 col-form-label">Gaji Bersih</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="gaji_bersih" id="gaji_bersih" placeholder="Otomatis dihitung" readonly>
                            @error('gaji_bersih')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Tanggal Pembayaran --}}
                    <div class="row mb-3">
                        <label for="tgl_pembayaran" class="col-sm-2 col-form-label">Tanggal Pembayaran</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                                <input type="text" class="form-control @error('tgl_pembayaran') is-invalid @enderror"
                                    name="tgl_pembayaran" id="tgl_pembayaran" value="{{ date('Y-m-d') }}">
                            </div>
                            @error('tgl_pembayaran')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                    <a href="{{ route('payroll.index') }}" class="btn btn-secondary">Kembali</a>
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

{{-- Inisialisasi Datepicker & Perhitungan Otomatis --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Tanggal Pembayaran otomatis hari ini
        flatpickr("#tgl_pembayaran", {
            dateFormat: "Y-m-d",
            allowInput: true,
            defaultDate: "{{ date('Y-m-d') }}"
        });

        const karyawanSelect = document.getElementById('karyawan_id');
        const gajiInput = document.getElementById('gaji');
        const bonusInput = document.getElementById('bonus');
        const potonganInput = document.getElementById('potongan');
        const gajiBersihInput = document.getElementById('gaji_bersih');

        // Gaji otomatis muncul setelah pilih karyawan
        karyawanSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const gaji = selectedOption.getAttribute('data-gaji') || 0;
            gajiInput.value = gaji;
            hitungGajiBersih();
        });

        // Hitung gaji bersih otomatis saat bonus/potongan berubah
        [bonusInput, potonganInput].forEach(input => {
            input.addEventListener('input', hitungGajiBersih);
        });

        function hitungGajiBersih() {
            const gaji = parseFloat(gajiInput.value) || 0;
            const bonus = parseFloat(bonusInput.value) || 0;
            const potongan = parseFloat(potonganInput.value) || 0;
            gajiBersihInput.value = gaji + bonus - potongan;
        }
    });
</script>
@endsection
