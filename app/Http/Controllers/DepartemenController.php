<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departemen;

class DepartemenController extends Controller
{
    public function index()
    {
        $departemens = Departemen::all();
        return view('departemen.index', compact('departemens'));
    }

    public function create()
    {
        return view('departemen.create');
    }

    public function store(Request $request)
    {
        
        $validateData = $request->validate([
            'nama' => 'required|max:255|string',
            'deskripsi'=>'required|max:255|string',
            'status'=>'required',
            'alamat'=>'required|max:255|string',
        ]);
        Departemen::create($validateData);
        return redirect()->route('departemen.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit(Departemen $departemen)
    {
        return view('departemen.edit', compact('departemen'));
    }

    public function update(Request $request, Departemen $departemen)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255|string',
            'deskripsi'=>'required|max:255|string',
            'status'=>'required',
            'alamat'=>'required|max:255|string',
        ]);
        $departemen->update($validateData);
        return redirect()->route('departemen.index')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy(Departemen $departemen)
    {
        $departemen->delete();
        return redirect()->route('departemen.index')->with('success', 'Data Berhasil Dihapus');
    }


    public function show(Departemen $departemen)
    {
        return view('departemen.show', compact('departemen'));
    }

    public function aktif($id )
    {
        $departemen = Departemen::findOrFail($id);
        $departemen->status = 'aktif';
        $departemen->save();

        return redirect()->route('departemen.index')->with('success', 'Status departemen berhasil diubah menjadi selesai.');
    }

    public function nonaktif($id )
    {
         $departemen = Departemen::findOrFail($id);
        $departemen->status = 'nonaktif';
        $departemen->save();

        return redirect()->route('departemen.index')->with('success', 'Status departemen berhasil diubah menjadi selesai.');
    }
}