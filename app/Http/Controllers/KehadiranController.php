<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kehadiran;
use App\Models\Karyawan;

class KehadiranController extends Controller
{
    //
    public function index()
    {
        $kehadirans = Kehadiran::all();
        return view('kehadiran.index', compact('kehadirans'));
    }

    public function create()
    {
        $karyawans = Karyawan::all();
        return view('kehadiran.create', compact('karyawans'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'karyawan_id' => 'required|max:255|string',
            'check_in' => 'required',
            'check_out' => 'required',
            'date' => 'required',
            'status' => 'required',
        ]);
        Kehadiran::create($validateData);
        return redirect()->route('kehadiran.index')->with('success', 'Data Berhasil Ditambahkan');
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
}