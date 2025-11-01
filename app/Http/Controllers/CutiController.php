<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cuti;
use App\Models\Karyawan;

class CutiController extends Controller
{
    //
    public function index()
    {
        if(session('role') == 'HR'){
            $cutis = Cuti::all();
        }else{
            $cutis = Cuti::where('karyawan_id', session('karyawan_id'))->get();
        }
        // $cutis = Cuti::all();
        return view('cuti.index', compact('cutis'));
    }
    public function create()
    {
        // $karyawans = Karyawan::all();
        // return view('cuti.create', compact('karyawans'));
        if (session('role') == 'HR') {
        $karyawans = Karyawan::all();
        return view('cuti.create', compact('karyawans'));
        } else {
            // untuk karyawan biasa, tidak perlu variabel $karyawans
            return view('cuti.create');
        }
    }

    public function store(Request $request)
    {
        if (session('role') == 'HR') {
            $validateData = $request->validate([
                'karyawan_id' => 'required',
                'jenis_cuti' => 'required',
                'mulai' => 'required|date',
                'selesai' => 'required|date|after_or_equal:mulai',
                'status' => 'required',
            ]);
        } else {
            $validateData = $request->validate([
                'jenis_cuti' => 'required',
                'mulai' => 'required|date',
                'selesai' => 'required|date|after_or_equal:mulai',
                'status' => 'required',
            ]);

            // tambahkan ID karyawan dari session secara manual
            $validateData['karyawan_id'] = session('karyawan_id');
        }

        Cuti::create($validateData);

        return redirect()->route('cuti.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $karyawans = Karyawan::all();
        $cuti = Cuti::find($id);
        return view('cuti.edit', compact('cuti','karyawans'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'karyawan_id' => 'required',
            'jenis_cuti' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'status' => 'required',
        ]);
        
        Cuti::where('id', $id)->update($validateData);
        return redirect()->route('cuti.index')->with('success', 'Data Berhasil Diupdate');
    }

    public function destroy($id)
    {
        Cuti::destroy($id);
        return redirect()->route('cuti.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function terima($id)
    {
        Cuti::where('id', $id)->update(['status' => 'terima']);
        return redirect()->route('cuti.index')->with('success', 'Data Berhasil Diupdate');
    }

    public function tolak($id)
    {
        Cuti::where('id', $id)->update(['status' => 'tolak']);
        return redirect()->route('cuti.index')->with('success', 'Data Berhasil Diupdate');
    }

}