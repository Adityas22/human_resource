<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Role;
use App\Models\Departemen;

class KaryawanController extends Controller
{
    //
    public function index()
    {
        $karyawans = Karyawan::all();
        return view('karyawan.index', compact('karyawans'));
    }

    public function create()
    {
        $roles = Role::all();
        $departemens = Departemen::all();
        return view('karyawan.create', compact('roles', 'departemens'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255|string',
            'email' => 'required|email',
            'nomor_hp' => 'required|string',
            'alamat' => 'required|max:255|string',
            'tgl_lahir' => 'required|date',
            'tgl_rekrutment' => 'required|date',
            'roles_id' => 'required',
            'departemen_id' => 'required',
            'status' => 'required',
            'gaji' => 'required|numeric',
        ]);
        Karyawan::create($validateData);
        return redirect()->route('karyawan.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function show(Karyawan $karyawan)
    {
        return view('karyawan.show', compact('karyawan'));
    }

    public function edit(Karyawan $karyawan)
    {
        $roles = Role::all();
        $departemens = Departemen::all();
        return view('karyawan.edit', compact('karyawan', 'roles', 'departemens'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255|string',
            'email' => 'required|email',
            'nomor_hp' => 'required|string',
            'alamat' => 'required|max:255|string',
            'tgl_lahir' => 'required|date',
            'tgl_rekrutment' => 'required|date',
            'roles_id' => 'required',
            'departemen_id' => 'required',
            'status' => 'required',
            'gaji' => 'required|numeric',
        ]);
        $karyawan->update($validateData);
        return redirect()->route('karyawan.index')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('karyawan.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function active($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->status = 'aktif';
        $karyawan->save();

        return redirect()->route('karyawan.index')->with('success', 'Status karyawan berhasil diubah menjadi selesai.');
    }

    public function nonActive($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->status = 'nonaktif';
        $karyawan->save();

        return redirect()->route('karyawan.index')->with('success', 'Status karyawan berhasil diubah menjadi pending.');
    }
    
}