<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kehadiran;
use App\Models\Karyawan;
use Carbon\Carbon;

class KehadiranController extends Controller
{
    //
    public function index()
    {
        if(session('role') == 'HR'){
            $kehadirans = Kehadiran::all();
        }
        else
        {
            // foreignkey dari tabel task adalah karyawan_id
            $kehadirans = Kehadiran::where('karyawan_id', session('karyawan_id'))->get(); 
        }
        // $kehadirans = Kehadiran::all();
        return view('kehadiran.index', compact('kehadirans'));
    }

    public function create()
    {
        $karyawans = Karyawan::all();
        return view('kehadiran.create', compact('karyawans'));
    }

    public function store(Request $request)
    {
        // Jika HR yang input (boleh memilih karyawan dan mengisi check_out)
        if (session('role') == 'HR') {
            $validated = $request->validate([
                'karyawan_id' => 'required|integer|exists:karyawan,id',
                'check_in'    => 'required|date',
                'check_out'   => 'nullable|date',
                'date'        => 'required|date',
                'status'      => 'required|string',
            ]);

            Kehadiran::create([
                'karyawan_id' => $validated['karyawan_id'],
                'check_in'    => $validated['check_in'],
                'check_out'   => $validated['check_out'] ?? null,
                'date'        => $validated['date'],
                'status'      => $validated['status'],
            ]);

            return redirect()->route('kehadiran.index')->with('success', 'Data presensi berhasil ditambahkan.');
        }

        // Jika karyawan biasa: otomatis check-in sekarang, check_out dikosongkan, status default hadir
        $status = $request->input('status', 'hadir'); // kalau ada request status gunakan, kalau tidak default 'hadir'

        Kehadiran::create([
            'karyawan_id' => session('karyawan_id'),
            'check_in'    => Carbon::now()->format('Y-m-d H:i:s'),
            'check_out'   => null,
            'date'        => Carbon::now()->format('Y-m-d'),
            'status'      => $status,
        ]);

        return redirect()->route('kehadiran.index')->with('success', 'Check in berhasil!');
    }

    public function edit(Kehadiran $kehadiran)
    {
        $karyawans = Karyawan::all();
        return view('kehadiran.edit', compact('kehadiran', 'karyawans'));
    }

    public function update(Request $request, Kehadiran $kehadiran)
    {
        $validateData = $request->validate([
            'karyawan_id' => 'required|max:255|string',
            'check_in' => 'required',
            'check_out' => 'required',
            'date' => 'required',
            'status' => 'required', 
        ]);
        $kehadiran->update($validateData);
        return redirect()->route('kehadiran.index')->with('success', 'Data Berhasil Diubah');
    }

    public function show(Kehadiran $kehadiran)
    {
        return view('kehadiran.show', compact('kehadiran'));
    }

    public function destroy(Kehadiran $kehadiran)
    {
        $kehadiran->delete();
        return redirect()->route('kehadiran.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function checkout($id)
    {
        $kehadiran = Kehadiran::findOrFail($id);

        // Pastikan hanya karyawan yang bersangkutan bisa checkout
        if (session('karyawan_id') != $kehadiran->karyawan_id && session('role') != 'HR') {
            return redirect()->route('kehadiran.index')->with('error', 'Anda tidak berhak melakukan aksi ini.');
        }

        // Pastikan belum checkout sebelumnya
        if ($kehadiran->check_out) {
            return redirect()->route('kehadiran.index')->with('warning', 'Anda sudah melakukan check out.');
        }

        // Update waktu checkout
        $kehadiran->update([
            'check_out' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        return redirect()->route('kehadiran.index')->with('success', 'Check out berhasil!');
    }

    
}