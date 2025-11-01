<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Cuti;
use App\Models\Kehadiran;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Cek role pengguna dari session
        $role = session('role'); // pastikan sudah diset saat login

        if ($role == 'HR') {
            // Data untuk HR
            $totalKaryawan = Karyawan::count();
            $totalCuti = Cuti::where('status', 'Disetujui')->count();
            $totalKehadiran = Kehadiran::whereDate('date', today())->count();
            $totalUser = User::count();

            return view('dashboard.index', compact(
                'totalKaryawan', 'totalCuti', 'totalKehadiran', 'totalUser', 'role'
            ));
        } else {
            // Data untuk karyawan biasa
            $karyawanId = session('karyawan_id');
            $kehadiranHariIni = Kehadiran::where('karyawan_id', $karyawanId)
                ->whereDate('date', today())
                ->first();
            $cutiSaya = Cuti::where('karyawan_id', $karyawanId)
                ->latest()
                ->take(5)
                ->get();

            return view('dashboard.index', compact(
                'kehadiranHariIni', 'cutiSaya', 'role'
            ));
        }
    }
}